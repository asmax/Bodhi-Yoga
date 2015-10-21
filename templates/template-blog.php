<?php
/* 
 * Template Name: Bodhi Blog
 * 
 * This template shows the blog items on single page.
 */
get_header(); ?>

<div class="content-wrap container">
    
    <!-- page centered title -->
    <div class="centered-logo-header text-center">
        <span class="centered-logo-header--logo"></span>
        <?php the_title( '<h1 class="page-title">', '</h2>' ); ?>
    </div>
    
        <?php 
    $args = array(
        //'cat'              => 1,
        //'category__and'    => array( 1, 2),
        //'category__in'     => array(1, 2),
        //'category__not_in' => array( 1, 2 ),

        //Type & Status Parameters
        'post_type'   => 'post',
        'post_status' => 'publish',
        //Order & Orderby Parameters
        'order'               => 'DESC',
        'orderby'             => 'date',
        //Pagination Parameters
        'posts_per_page'         => get_option( 'posts_per_page' ),
        //'posts_per_archive_page' => 10,
        'paged'                  => get_query_var('paged'),
    );
    $blog_query = new WP_Query( $args ); ?>
    <div class="row blog-wrap">
    <?php if ( $blog_query->have_posts() ) : ?>
        <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
        
        <div class="blog-item col-md-12">
            
            <div class="wow slideInUp blog-item--single">
            <?php the_title( '<h1 class="blog-post-title text-center"><a href="'.get_the_permalink().'">', '</a></h1>' ); ?>
              
            <!-- post date -->
            <div class="blog-post-date text-center">February 12, 2015</div>
                
            <?php if (has_post_thumbnail() ) : ?>
                <div class="blog-thumbnail-wrap text-center">
                    <?php the_post_thumbnail( 'square-350', array( 
                        'class' => 'img-responsive text-center'
                        )
                    ); ?>
                </div>
            <?php endif; ?>
            
            <?php the_content( 'Read More..' ); ?>
            <?php
                wp_link_pages( array(
                        'before' => '<div class="page-links">',
                        'after'  => '</div>',
                    ) 
                );
            ?>
            </div>
            <!-- blog-item-single -->
        </div>
        <!-- blog-item -->
        
        <?php endwhile; ?>
        <?php the_posts_navigation(); ?>
        
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    </div>
    <!-- gallery-wrap -->
</div>
<!-- content-wrap -->
    


<?php get_footer(); ?>
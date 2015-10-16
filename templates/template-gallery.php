<?php
/* 
 * Template Name: Gallery Grid
 * 
 * This template shows the gallery items in the form of grid.
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
        'post_type'   => 'gallery',
        'post_status' => 'publish',
        //Order & Orderby Parameters
        'order'               => 'DESC',
        'orderby'             => 'date',
        //Pagination Parameters
        'posts_per_page'         => 12,
        //'posts_per_archive_page' => 10,
        'paged'                  => get_query_var('paged'),
    );
    $gallery_query = new WP_Query( $args ); ?>
    <div class="row gallery-wrap">
    <?php if ( $gallery_query->have_posts() ) : ?>
        <?php while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); ?>
        
        <div class="gallery-item col-md-3">
            
            <div class="wow fadeIn gallery-item--single">
            <?php if (has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'square-300', array( 
                    'class' => 'img-responsive'
                    )
                ); ?>
            <?php else : ?>
                <?php echo '<img src="'.get_template_directory_uri() . '/assets/images/placeholder-300.png" class="img-responsive" />'; ?>
            <?php endif; ?>
            </div>
            <!-- gallery-item-single -->
            
        </div>
        <!-- gallery-item -->
        
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    </div>
    <!-- gallery-wrap -->
</div>
<!-- content-wrap -->
    


<?php get_footer(); ?>
<?php
/* 
 * Template Name: 100% / Header Image
 * 
 * This template shows 100% width content
 * and also displays featured image as header image.
 */

get_header(); ?>

<!-- page header image -->
<?php if ( has_post_thumbnail() ) { ?>
<div class="page-header-image">
    <?php the_post_thumbnail( 'header-image', array( 'class' => 'img-responsive' ) ); ?>
</div>
<?php } ?>

<div class="content-wrap container">
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
        
        <!-- page centered title -->
        <div class="centered-logo-header text-center">
            <span class="centered-logo-header--logo"></span>
            <?php the_title( '<h1 class="page-title">', '</h2>' ); ?>
        </div>
        
        <div class="page-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                    'before' => '<div class="page-links">',
                    'after'  => '</div>',
                ) 
            );
        ?>
        </div>
        <!-- page content -->
        
        <?php endwhile; ?>

    <?php endif; ?>
</div>
<!-- content-wrap -->
    


<?php get_footer(); ?>
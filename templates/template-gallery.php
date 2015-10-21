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

        //Type & Status Parameters

        'post_type' => 'gallery',

        'post_status' => 'publish',

        //Order & Orderby Parameters

        'order' => 'DESC',

        'orderby' => 'date',

        //Pagination Parameters

        'posts_per_page'         => 12,

        //'posts_per_archive_page' => 10,

        'paged' => get_query_var('paged'),

    );

    $gallery_query = new WP_Query( $args ); ?>

    <div class="row gallery-wrap">

    <?php if ( $gallery_query->have_posts() ) : ?>

        <?php while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); ?>

        

        <div class="gallery-item col-md-3">

            

            <div class="wow fadeIn gallery-item--single">

            <?php if ( has_post_thumbnail() ) : ?>
<?php
if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    if ( ! empty( $large_image_url[0] ) ) {
        echo '<a class="fancybox" data-fancybox-group="gallery" rel="gallery" href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        echo get_the_post_thumbnail( $post->ID, 'square-300' ); 
        echo '</a>';
    }
}
?>
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
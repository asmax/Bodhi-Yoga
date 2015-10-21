<?php
/* 
 * Template Name: Workshop Page
 * 
 * This template shows the testimonials of the clients.
 */

get_header(); ?>


<div class="content-wrap container">
    
    <!-- page centered title -->
    <div class="centered-logo-header text-center">
        <span class="centered-logo-header--logo"></span>
        <?php the_title( '<h1 class="page-title">', '</h2>' ); ?>
    </div>
    
    <div class="row workshop--wrap mt-60 mb-100">
        <div class="workshop--thumbnail col-md-3">
	        <?php while ( have_posts() ) : the_post();
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'square-300', array( 'class' => 'img-responsive' ) );
				}
		    endwhile; ?>
        </div>
        <div class="workshop--content col-md-9">
			<?php
		    $args = array(
		        //Type & Status Parameters
		        'post_type' => 'workshop',
		        'post_status' => 'publish',
		        //Order & Orderby Parameters
		        'order' => 'DESC',
		        'orderby' => 'date',
		        //Pagination Parameters
		        'posts_per_page'         => -1,
		        //'posts_per_archive_page' => 10,
		        'paged' => get_query_var('paged'),
		    );
		    $workshop_query = new WP_Query( $args ); ?>
		    <?php if ( $workshop_query->have_posts() ) : ?>
		        <?php while ( $workshop_query->have_posts() ) : $workshop_query->the_post(); ?>
		        
		        <article id="post-<?php the_ID(); ?>" <?php post_class('mb-60 workshop-single-item'); ?>>
			        <?php the_title( '<h3 class="font-normal  font-myriad size-22 mt-0">', '</h3>' ); ?>
		        	<?php the_content(); ?>
		        </article>
		        
		        <?php endwhile; ?>
		    <?php endif; ?>
		    <?php wp_reset_query(); ?>
        </div>
            
    </div>

</div>
<!-- content-wrap -->
    


<?php get_footer(); ?>
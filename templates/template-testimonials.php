<?php
/* 
 * Template Name: Testimonials Page
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
    
    <?php
    $args = array(
        //Type & Status Parameters
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        //Order & Orderby Parameters
        'order' => 'DESC',
        'orderby' => 'date',
        //Pagination Parameters
        'posts_per_page'         => -1,
        //'posts_per_archive_page' => 10,
        'paged' => get_query_var('paged'),
    );
    $testimonial_query = new WP_Query( $args ); ?>
    <div class="testimonial-wrap">
    <?php if ( $testimonial_query->have_posts() ) : ?>
        <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
	    $bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
        $bodhi_testimonial_author = $bodhi_value->getOption( 'bodhi_testimonial_author_meta' );    
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('row testimonial--item'); ?>>
	        <div class="testimonial--thumbnail col-md-4">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'square-300', array( 'class' => 'img-responsive' ) );
					}	
				?>
	        </div>
	        <div class="testimonial--content col-md-8">
		        <?php
			      the_content( 'Read More..' ); 
				  echo '<p class="testimonial-author color-green font-bradley size-20">'.$bodhi_testimonial_author.'</p>';
			    ?>
	        </div>
        </article>
        
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    </div>
    <!-- gallery-wrap -->
</div>
<!-- content-wrap -->
    


<?php get_footer(); ?>
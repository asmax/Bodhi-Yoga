<?php
/* 
 * Front page home page template.
 * 
 * This template shows the testimonials of the clients.
 */
$bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
// $imageID = $bodhi_value->getOption( 'bodhi_testimonial_bg' );
// // The value may be a URL to the image (for the default parameter)
// // or an attachment ID to the selected image.
// $imageSrc = $imageID; // For the default value
// if ( is_numeric( $imageID ) ) {
//     $imageAttachment = wp_get_attachment_image_src( $imageID, 'full' );
//     $imageSrc = $imageAttachment[0];
// }
get_header(); ?>


<div class="content-wrap container">

    <h1 class="home-main-heading color-green size-40 font-bradley text-center mt-60 mb-60">Healing Yoga Teacher Training with Marcus  Julian Felicetti</h1>

	<div class="trainings-slider row">
	<?php
    $args = array(
        //Type & Status Parameters
        'post_type' => 'training',
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
    <?php if ( $testimonial_query->have_posts() ) : ?>
        <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
	    $bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
        $bodhi_testimonial_author = $bodhi_value->getOption( 'bodhi_teacher_meta' );    
        ?>
        
        <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?>>
	        <div class="teachings--thumbnail">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'square-300', array( 'class' => 'img-responsive' ) );
					}	
				?>
	        </div>
	        <?php the_title( '<h3 class="mt-20 mb-20 size-20 color-green ltr-spc-1 font-myriad text-center">', '</h3>' ); ?>
        </div>
        
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
	</div>
	<div class="join-button text-center">
		<a href="#" class="button btn btn-primary size-20">Join Now <i class="fa fa-angle-right"></i></a>
	</div>

	
	<section class="home-widgets-wrap">
	    <!-- page centered title -->
	    <div class="centered-logo-header text-center mt-60 mb-40">
	        <span class="centered-logo-header--logo"></span>
	        <h1 class="page-title">Bodhi Yoga</h2>
	    </div>

		<div class="row home-widgets mb-60">
			<div class="col-md-6 widget">
				<?php if ( is_active_sidebar( 'home-video-left' ) ): ?>
					<?php dynamic_sidebar( 'home-video-left' ) ?>
				<?php endif ?>
			</div>
			<div class="col-md-6 widget">
				<?php if ( is_active_sidebar( 'home-video-right' ) ): ?>
					<?php dynamic_sidebar( 'home-video-right' ) ?>
				<?php endif ?>
			</div>
		</div>

	</section>

</div>
<!-- content-wrap -->

	<section class="author-welcome">
		<div class="container">
			<?php while ( have_posts() ) : the_post();
	        $bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
	        $bodhi_owner_meta = $bodhi_value->getOption( 'bodhi_owner_meta' );
	        $bodhi_founder_meta = $bodhi_value->getOption( 'bodhi_founder_meta' );
			?>
			<div class="row author-welcome-wrap">
				<div class="author-avatar col-md-3">
					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail( 'square-250', array(
							'class' => 'img-responsive'
						) ) ?>
					<?php endif ?>
					<div class="color-green size-22 mt-20"><?php echo $bodhi_owner_meta ?></div>
					<div class="color-green founder"><?php echo $bodhi_founder_meta ?></div>
				</div>
				<div class="author-message col-md-9">
					<div class="message-title-wrap row">
						<div class="message-title col-md-offset-1 col-md-7">
							<?php the_title( '<h1 class="mt-0 size-36 color-green font-caviar-regular upper text-center">', '</h1>' ); ?>
						</div>
						<div class="message-title-logo col-md-3">
							<span class="bodhi--logo"></span>
						</div>
					</div>
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

			<?php endwhile; ?>

		</div>
	</section>



<?php 
$imageSrc = get_template_directory_uri() . '/assets/images/testimonial-bg.png';
?>
<section class="parallax-container" style="background-image: url('<?php echo $imageSrc; ?>');background-repeat: no-repeat;background-size: cover;">
    <div class="testimonial-slides container">
    <?php 
    $args = array(
        //Type & Status Parameters
        'post_type'   => 'testimonial',
        'post_status' => 'publish',
        //Order & Orderby Parameters
        'order'               => 'DESC',
        'orderby'             => 'date',
        //Pagination Parameters
        'posts_per_page'         => -1,
        //'posts_per_archive_page' => 10,
        'paged'                  => get_query_var('paged'),
    );
    $testimonial_query = new WP_Query( $args ); ?>
    <?php if ( $testimonial_query->have_posts() ) : ?>
        <?php while(  $testimonial_query->have_posts() ) : $testimonial_query->the_post();
        $bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
        $bodhi_testimonial_author = $bodhi_value->getOption( 'bodhi_testimonial_author_meta' );
        ?>
        <div class="testimonial-slides--item row">
            <div class="col-xs-4 col-md-3 col-md-offset-1">
                <div class="testimonial-slides--thumbnail">
                    <?php if (has_post_thumbnail() ) :
                        the_post_thumbnail( 'square-250', array( 'class' => 'img-responsive img-circle' ) );
                    endif; ?>
                </div>
                
            </div>
            <div class="testimonial-slides--content col-xs-8 col-md-7">
                <div class="testimonial-slides--inner">
                    <?php // the_content( 'Read More..' ); ?>
                    <?php
                    	$content = get_the_content();
                    	$excerpt = wp_trim_words( $content, 30, '...' );
                    	echo '<p>'.$excerpt.'</p>';
                    ?>
                    <?php if ( !empty( $bodhi_testimonial_author )) : ?>
                        <span class="color-white size-18"><?php echo $bodhi_testimonial_author; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>  
    <!-- testimonial-slides -->
</section>
<!-- testimonials -->

<section class="bottom-widgets-wrap">
	<div class="container inner">
		<div class="row widgets-inner mt-60">
			<?php if ( is_active_sidebar( 'home-bottom-page-1' )): ?>
			<div class="col-md-4 col-sm-4">
				<?php dynamic_sidebar( 'home-bottom-page-1' ) ?>			
			</div>
			<?php endif ?>
			<?php if ( is_active_sidebar( 'home-bottom-page-2' )): ?>
			<div class="col-md-4 col-sm-4">
				<?php dynamic_sidebar( 'home-bottom-page-2' ) ?>			
			</div>
			<?php endif ?>
			<?php if ( is_active_sidebar( 'home-bottom-page-3' )): ?>
			<div class="col-md-4 col-sm-4">
				<?php dynamic_sidebar( 'home-bottom-page-3' ) ?>			
			</div>
			<?php endif ?>
		</div>
	</div>
</section>


<?php get_footer(); ?>
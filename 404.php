<?php
/**
 * The template for displaying 404 pages (not found).
 * @package bodhi_yoga
 */

get_header(); ?>
<div class="container">
	
	<div class="error-404-wrap row">
    
	    <!-- page centered title -->
	    <div class="centered-logo-header text-center">
	        <span class="centered-logo-header--logo"></span>
	        <h1 class="page-title"><?php esc_html_e( 'Page Not Found :-(', 'bodhi-yoga' ); ?></h1>
	    </div>
    
		<div class="error-page-content col-sm-8 col-sm-offset-2 text-center mt-50 mb-50">
			<p class="well"><?php esc_html_e( 'This page does not exist, this is because of Broken link or page is moved.', 'bodhi-yoga' ); ?></p>
			<div class="col-md-10 col-md-offset-1">
				<h4>Try Searching for something else.</h4>
				<?php get_search_form(); ?>						
			</div>

		</div><!-- error-page-content -->

	</div>
	<!-- error-404-wrap -->

</div>
<?php get_footer(); ?>

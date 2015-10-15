<?php
/**
 * Custom functions that act independently of the theme templates.
 * @package bodhi_yoga
 */

/**
 * Adds custom classes to the array of body classes.
 */
function bodhi_yoga_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
        } elseif ( is_page_template( 'template-gallery.php' ) ) {
            $clases[] = 'gallery-page-template';
        }

	return $classes;
}
add_filter( 'body_class', 'bodhi_yoga_body_classes' );
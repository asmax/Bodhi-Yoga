<?php
/**
 * Define image sizes
 */
function bodhi_yoga_woocommerce_image_dimensions() {
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}

  	$catalog = array(
		'width' 	=> '370',	// px
		'height'	=> '520',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '465',	// px
		'height'	=> '670',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '300',	// px
		'height'	=> '300',	// px
		'crop'		=> 0 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog );
	update_option( 'shop_single_image_size', $single );
	update_option( 'shop_thumbnail_image_size', $thumbnail );
}

add_action( 'after_switch_theme', 'bodhi_yoga_woocommerce_image_dimensions', 1 );



/* shop title filter */
add_filter( 'woocommerce_show_page_title', 'bodhi_yoga_remove_shop_title' );
function bodhi_yoga_remove_shop_title() {
    return false;
}

/* shop description filter */
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );

/* remove below title content */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/* add custon title for shop page */
add_action( 'woocommerce_before_shop_loop', 'bodhi_yoga_shop_title' );
function bodhi_yoga_shop_title() { ?>
    <!-- page centered title -->
    <div class="shop-page-title centered-logo-header text-center">
        <span class="centered-logo-header--logo"></span>
        <?php 
            $shop_page_id = wc_get_page_id( 'shop' );
            $page_title   = get_the_title( $shop_page_id );
        echo '<h1 class="page-title">'.$page_title.'</h2>'; ?>
    </div>
<?php }


// single product template hooks
add_action('add_single_summery', 'woocommerce_template_single_excerpt', 10 );
add_action('add_single_price', 'woocommerce_template_single_price', 10 );
add_action('add_single_add_cart', 'woocommerce_template_single_add_to_cart', 10 );

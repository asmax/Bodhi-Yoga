<?php
/**
 * The template for displaying product content in the single-product.php template
 */
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 
	 // add shop title to the page
	 do_action('woocommerce_before_shop_loop');
	 
	 
	 
    if ( is_product() )  { ?>
	    <div class="row top-product-bar">
		    <div class="back-to-shop col-sm-6">
			    <a class="color-orange font-caviar size-18" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><i class="fa fa-angle-left"></i> Back to Products</a>
		    </div>
		    <div class="view-cart col-sm-6">
			    <a class="pull-right color-orange font-caviar size-18 cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart"></i> <?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
	
		    </div>
	    </div>
    <?php }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="product-summary summary entry-summary">
<?php the_title('<h3 class="product-title mt-0 mb-20 upper">', '</h3>'); ?>
		<?php			
			do_action( 'add_single_summery');
			
		?>
<div class="product-show-more course-info" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="course-info--inner">
		<div class="course--heading collapsed" role="tab" id="heading-1" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
		<h4 class="size-22 font-bradley course-title">Details:</h4>
		</div>
	<div id="collapse-1" class="product-show-more-content course-info--content collapse" role="tabpanel" aria-labelledby="heading-1" aria-expanded="true">
	<div><?php the_content(); ?></p>
	</div>
	</div>
	</div>
</div>
		<?php
			
			
		?>
		<?php
			do_action( 'add_single_price');
			do_action( 'add_single_add_cart');
		?>

	</div><!-- .summary -->

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
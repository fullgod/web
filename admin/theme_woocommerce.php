<?php 

/**
 * Add Shop Link to Menu
 */
if(!( function_exists('ebor_cart_icon') )){
	function ebor_cart_icon() {
		global $woocommerce;	
		echo '<li class="ebor-cart"><a href="'. $woocommerce->cart->get_cart_url() .'"><i class="icon icon_cart"></i><span class="ebor-count woocommerce">0</span></a></li>';
	}
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
if(!( function_exists('ebor_woocommerce_header_add_to_cart_fragment_total') )){
	function ebor_woocommerce_header_add_to_cart_fragment_total( $fragments ) {
		global $woocommerce;
		ob_start();
		echo '<span class="ebor-count woocommerce">'. $woocommerce->cart->get_cart_contents_count() .'</span>';	
		$fragments['span.ebor-count.woocommerce'] = ob_get_clean();
		return $fragments;
	}
	add_filter('add_to_cart_fragments', 'ebor_woocommerce_header_add_to_cart_fragment_total');
}

/**
 * Remove WooCommerce Stylesheets
 */
if(!( function_exists('ebor_dequeue_styles') )){
	function ebor_dequeue_styles( $enqueue_styles ) {
		if( function_exists('ebor_is_woocommerce') ){
			if( ebor_is_woocommerce() ){
				unset( $enqueue_styles['woocommerce-general'] );
			} else {
				unset( $enqueue_styles['woocommerce-general'] );
				unset( $enqueue_styles['woocommerce-layout'] );	
				unset( $enqueue_styles['woocommerce-smallscreen'] );
			}
		}
		return $enqueue_styles;
	}
	add_filter( 'woocommerce_enqueue_styles', 'ebor_dequeue_styles' );
}

/**
 * Change the shop loop columns
 */
if (!( function_exists('ebor_loop_columns') )) {
	function ebor_loop_columns() {
		return 2;
	}
	add_filter('loop_shop_columns', 'ebor_loop_columns');
}

//Remove prettyPhoto lightbox
add_action( 'wp_enqueue_scripts', 'ebor_remove_woo_lightbox', 99 );
function ebor_remove_woo_lightbox() {
    wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
    wp_dequeue_script( 'prettyPhoto' );
    wp_dequeue_script( 'prettyPhoto-init' );
}

/**
 * Remove Actions
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Add actions
 */
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 25);
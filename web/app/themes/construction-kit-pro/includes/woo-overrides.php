<?php
/**
 * Load files.
 *
 * @package Construction_Kit
 */

//=============================================================
// Change number of product per page
//=============================================================

if (!function_exists('construction_kit_new_loop_shop_per_page')) {

	function construction_kit_new_loop_shop_per_page( $cols ) {
	  
	  $product_per_page = construction_kit_get_option( 'product_per_page' );

	  $cols = absint( $product_per_page );

	  return $cols;
	}

}

add_filter( 'loop_shop_per_page', 'construction_kit_new_loop_shop_per_page', 20 );


//=============================================================
// Change number of product per row
//=============================================================

if (!function_exists('construction_kit_product_columns')) {

	function construction_kit_product_columns() {

		$product_number = construction_kit_get_option( 'product_number' );

		return absint( $product_number ); // number of products per row

	}
	
}

add_filter('loop_shop_columns', 'construction_kit_product_columns');

//=============================================================
// Change number of related product
//=============================================================

if (!function_exists('construction_kit_related_products_args')) {

	function construction_kit_related_products_args( $args ) {

		$product_number = construction_kit_get_option( 'product_number' );

		$args['columns']   		= absint( $product_number );
		
		$args['posts_per_page'] = absint( $product_number ); // number of related products
		
		return $args;
	}

}

add_filter( 'woocommerce_output_related_products_args', 'construction_kit_related_products_args', 10 );


//=============================================================
// Change number of upsell products
//=============================================================

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_action( 'woocommerce_after_single_product_summary', 'construction_kit_output_upsells', 15 );

if ( ! function_exists( 'construction_kit_output_upsells' ) ) {

	function construction_kit_output_upsells() {

		$product_number = construction_kit_get_option( 'product_number' );

	    woocommerce_upsell_display( absint( $product_number ), absint( $product_number ) ); // Display 3 products in rows of 3
	    
	}

}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );


add_action( 'woocommerce_shop_loop_item_title', 'construction_kit_woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'construction_kit_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function construction_kit_woocommerce_template_loop_product_title() {
		echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
		echo '</a>';
	}
}

//=============================================================
// Remove sidebar in woocommerce page
//=============================================================
//remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 


//=============================================================
// Update number of items in cart and total after Ajax
//=============================================================
add_filter( 'woocommerce_add_to_cart_fragments', 'construction_kit_header_add_to_cart_fragment' );

function construction_kit_header_add_to_cart_fragment( $fragments ) {
	
	global $woocommerce;
	
	ob_start(); ?>

	<span class="cart-value construction-kit-cart-fragment"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>

	<?php

	$fragments['span.construction-kit-cart-fragment'] = ob_get_clean();

	return $fragments;
	
}

//=============================================================
// Remove Sorting option
//=============================================================

$hide_product_sorting = construction_kit_get_option( 'hide_product_sorting' );

if( true === $hide_product_sorting ){

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

}

//=============================================================
// Disable Related Products
//=============================================================

$disable_related_products = construction_kit_get_option( 'disable_related_products' );

if( true === $disable_related_products ){

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}
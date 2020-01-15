<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Construction_Kit
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function construction_kit_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	//Add column class in body for woocommerce
	if( class_exists( 'WooCommerce' ) ){

		$product_number = construction_kit_get_option( 'product_number' );

		if(  2 === $product_number || 3 === $product_number || 4 === $product_number ){

			$classes[] = 'columns-'.absint( $product_number );

		}else{

			$classes[] = 'columns-3';

		}
	}

	//Add sticky header class in body if sticky header enabled
	$enable_sticky_header = construction_kit_get_option( 'enable_sticky_header' );

	if( true == $enable_sticky_header ){

		$classes[] = 'sticky-header-enabled';
	}

	//Add sticky footer class in body if sticky footer enabled
	$enable_sticky_footer = construction_kit_get_option( 'enable_sticky_footer' );

	if( true == $enable_sticky_footer ){

		$classes[] = 'sticky-footer-enabled';
	}

	return $classes;
}

add_filter( 'body_class', 'construction_kit_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function construction_kit_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'construction_kit_pingback_header' );

/**
 * Display custom logo
 */
if ( ! function_exists( 'construction_kit_the_custom_logo' ) ) :

	/**
	 * Displays custom logo.
	 *
	 * @since 1.0.0
	 */
	function construction_kit_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;

/**
 * Add go to top
 */
if ( ! function_exists( 'construction_kit_footer_goto_top' ) ) :

	/**
	 * Add Go to top.
	 *
	 * @since 1.0.0
	 */
	function construction_kit_footer_goto_top() {

		$goto_top = construction_kit_get_option( 'goto_top' );

		$goto_top_type = construction_kit_get_option( 'goto_top_type' );

		if( 1 != $goto_top ){

			echo '<a href="#page" class="scrollup '.$goto_top_type.'" id="btn-scrollup"></a>';

		}
	}
endif;

add_action( 'wp_footer', 'construction_kit_footer_goto_top' );

if ( ! function_exists( 'construction_kit_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function construction_kit_implement_excerpt_length( $length ) {

		$excerpt_length = construction_kit_get_option( 'excerpt_length' );
		
		if ( absint( $excerpt_length ) > 0 ) {

			$length = absint( $excerpt_length );

		}

		return $length;

	}
endif;

if ( ! function_exists( 'construction_kit_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function construction_kit_content_more_link( $more_link, $more_link_text ) {

		$read_more_text = construction_kit_get_option( 'readmore_text' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}
		return $more_link;

	}

endif;

if ( ! function_exists( 'construction_kit_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function construction_kit_implement_read_more( $more ) {

		$output = $more;

		$read_more_text = construction_kit_get_option( 'readmore_text' );

		if ( ! empty( $read_more_text ) ) {

			$output = '&hellip;<p><a href="' . esc_url( get_permalink() ) . '" class="button btn-continue">' . esc_html( $read_more_text ) . '</a></p>';

		}

		return $output;

	}
endif;

if ( ! function_exists( 'construction_kit_hook_read_more_filters' ) ) :

	/**
	 * Hook read more and excerpt length filters.
	 *
	 * @since 1.0.0
	 */
	function construction_kit_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() || is_search() ) {

			add_filter( 'excerpt_length', 'construction_kit_implement_excerpt_length', 999 );
			add_filter( 'the_content_more_link', 'construction_kit_content_more_link', 10, 2 );
			add_filter( 'excerpt_more', 'construction_kit_implement_read_more' );

		}
	}
endif;
add_action( 'wp', 'construction_kit_hook_read_more_filters' );

//=============================================================
// Recommended plugins
//=============================================================
if ( ! function_exists( 'construction_kit_plugins_recommendation' ) ) :

function construction_kit_plugins_recommendation() {
	
	$plugins = array(
		array(
			'name'     => esc_html__( 'One Click Demo Import', 'construction-kit' ),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Elementor Page Builder', 'construction-kit' ),
			'slug'     => 'elementor',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Post Grid Elementor Addon', 'construction-kit' ),
			'slug'     => 'post-grid-elementor-addon',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Awesome Elementor Addon For Instagram Feed', 'construction-kit' ),
			'slug'     => 'add-instagram-feed-for-elementor',
			'required' => false,
		),
	);

	tgmpa( $plugins );
}
endif;

add_action( 'tgmpa_register', 'construction_kit_plugins_recommendation' );

//=============================================================
// EDD license and updates
//=============================================================
function construction_kit_theme_updater() {

	require( get_template_directory() . '/includes/updater/theme-updater.php' );

}

add_action( 'after_setup_theme', 'construction_kit_theme_updater' );
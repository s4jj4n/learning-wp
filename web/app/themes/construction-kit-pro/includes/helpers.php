<?php
/**
 * Helper functions.
 *
 * @package Construction_Kit
 */

if ( ! function_exists( 'construction_kit_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function construction_kit_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		$font_fields = array( 'body_font', 'menu_font', 'heading_font' );

		$theme_options = array();
		
		foreach ( $font_fields as $k ) {
			
			$theme_options[] = construction_kit_get_option( $k );
		}
		
		$theme_options = array_unique( $theme_options );

		foreach ( $theme_options as $f) {

			$f_family = explode(':', $f);

			$f_family = str_replace('+', ' ', $f_family);

			$font_family = ( !empty( $f_family[1]) ) ? $f_family[1] : '';

			$fonts[] = $f_family[0].':'.$font_family;

		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

if ( ! function_exists( 'construction_kit_apply_theme_shortcode' ) ) :

	/**
	 * Apply theme shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string Content.
	 * @return string Modified content.
	 */
	function construction_kit_apply_theme_shortcode( $string ) {

		if ( empty( $string ) ) {
			return $string;
		}

		$search = array( '[the-year]', '[the-site-title]' );

		$replace = array(
			date_i18n( esc_html_x( 'Y', 'year date format', 'construction-kit' ) ),
			esc_html( get_bloginfo( 'name', 'display' ) ),
		);

		$string = str_replace( $search, $replace, $string );

		return $string;

	}

endif;
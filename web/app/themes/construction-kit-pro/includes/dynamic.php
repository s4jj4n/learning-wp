<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Construction_Kit
 */

if ( ! function_exists( 'construction_kit_dynamic_options' ) ) :

    function construction_kit_dynamic_options(){

        global $construction_kit_google_fonts;

        $body_font     	=  construction_kit_get_option( 'body_font' );
        $menu_font   	=  construction_kit_get_option( 'menu_font' );
        $heading_font	=  construction_kit_get_option( 'heading_font' );

        //colors
        $primary_color	=  construction_kit_get_option( 'primary_color' );

        ?>               
            
        <style type="text/css">
            body,
            p, ul li, ul li a, ol li, ol li a, 
            #footer-widgets ul li a, 
            .tagcloud a{
                font-family: '<?php echo esc_attr( $construction_kit_google_fonts[$body_font] ); ?>';
            }

            h1, h1 a,
            h2, h2 a,
            h3, h3 a,
            h4, h4 a,
            h5, h5 a,
            h6, h6 a{
                font-family: '<?php echo esc_attr( $construction_kit_google_fonts[$heading_font] ); ?>';
            }

            .main-navigation ul li a,
            .main-navigation ul li.menu-item-has-children ul.sub-menu li a{
                font-family: '<?php echo esc_attr( $construction_kit_google_fonts[$menu_font] ); ?>';
            }

            button,
            .comment-reply-link,
            a.button, input[type="button"],
            input[type="reset"],
            input[type="submit"],
            .wp-block-columns.is-background-enabled,
            .wp-block-columns.is-background-enabled:after,
            .wp-block-columns.is-background-enabled:before,
            .construction-kit-social-icons li a,
            .construction-kit-social-icons ul li a:hover,
            .woocommerce .widget_shopping_cart .cart_list li a.remove, 
            .woocommerce.widget_shopping_cart .cart_list li a.remove,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce span.onsale,
            .error-404.not-found  form.search-form input[type="submit"],
            .search-no-results  form.search-form input[type="submit"],
            .error-404.not-found  form.search-form input[type="submit"]:hover,
            .mean-container a.meanmenu-reveal span,
            .mean-container .mean-nav ul li a,
            .mean-container .mean-nav ul li a:hover{
                background: <?php echo esc_attr( $primary_color ); ?>;
            }

            a, a:visited, a:hover, a:focus, a:active,
            .main-navigation ul li.menu-item-has-children ul.sub-menu li a:hover,
            .main-navigation ul li.current-menu-item a,
            .main-navigation ul li a:hover,
            .main-navigation ul li.menu-item-has-children ul.sub-menu li.current-menu-item a,
            #infinite-handle span, 
            #infinite-handle span:hover,
            .nav-links .nav-previous a:hover,
            .nav-links .nav-next a:hover,
            .comment-navigation .nav-next a:hover:after,
            .comment-navigation .nav-previous a:hover:before,
            .nav-links .nav-previous a:hover:before,
            .nav-links .nav-next a:hover:after,
            .entry-footer > span::before,
            #commentform  input[type="submit"]:hover,
            #primary .post  .entry-title:hover a,
            #primary .page .entry-title:hover a,
            #primary .product .entry-title:hover a,
            #primary .post .entry-content p .button:hover,
            .post-navigation .nav-previous:hover a,
            .post-navigation .nav-next:hover a,
            .post-navigation .nav-previous:hover:before,
            .post-navigation .nav-next:hover:after,
            .post-navigation .nav-previous:before,
            .post-navigation .nav-next:after,
            .woocommerce-message::before,
            .woocommerce-info::before,
            #add_payment_method #payment ul.payment_methods li, 
            .woocommerce-cart #payment ul.payment_methods li, 
            .woocommerce-checkout #payment ul.payment_methods li,
            .woocommerce nav.woocommerce-pagination ul li a:focus, 
            .woocommerce nav.woocommerce-pagination ul li a:hover, 
            .woocommerce nav.woocommerce-pagination ul li span.current,
            .pagination .nav-links .page-numbers.current,
            .product .price,
            .woocommerce ul.products li.product .price,
            li.product .product-thumb-wrap > a:before,
            .mean-container a.meanmenu-reveal {
                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            .scrollup:hover,
            .nav-links .page-numbers.current,
            .nav-links a.page-numbers:hover,
            .woocommerce nav.woocommerce-pagination ul li .page-numbers,
            .pagination .nav-links .page-numbers,
            .woocommerce div.product .woocommerce-tabs ul.tabs li,
            .woocommerce button.button.alt.disabled,
            .woocommerce .woocommerce-message a.button.wc-forward,
            #add_payment_method .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,
            .woocommerce .cart .button, 
            .woocommerce .cart input.button,
            .woocommerce a.button,
            .woocommerce #payment #place_order, 
            .woocommerce-page #payment #place_order,
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt,
            .woocommerce button.button.alt.disabled,
            .woocommerce #review_form #respond .form-submit input,
            .woocommerce div.product .woocommerce-tabs ul.tabs li {
                background: <?php echo esc_attr( $primary_color ); ?>;
                border-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            blockquote {
                border-left-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            #commentform input[type="submit"],
            .woocommerce nav.woocommerce-pagination ul li .page-numbers, 
            .pagination .nav-links .page-numbers,
            .nav-links .page-numbers.current, 
            .nav-links a.page-numbers:hover {
                border: 1px solid <?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs::before{
                border-bottom: 1px solid <?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce-message, .woocommerce-info {
                border-top-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce form .form-row.woocommerce-validated .select2-container, 
            .woocommerce form .form-row.woocommerce-validated input.input-text, 
            .woocommerce form .form-row.woocommerce-validated select {
                border-color: <?php echo esc_attr( $primary_color ); ?>;
            } 

            .site-title a {
                color: #333;
            }

            <?php

            $background_color = get_background_color();

            if( 'ffffff' != $background_color && !empty( $background_color ) ){ ?>

                .sticky-footer-enabled #page{
                    background-color: #<?php echo esc_attr( $background_color ); ?>;
                }
                <?php
            } ?>

        </style>

        <?php
    }

endif;

add_action( 'wp_head', 'construction_kit_dynamic_options' );
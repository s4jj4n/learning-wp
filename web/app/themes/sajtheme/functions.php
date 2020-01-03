<?php

//Adding Theme Support #
//https://developer.wordpress.org/themes/functionality/post-formats/
function themename_post_formats_setup()
{
    add_theme_support('post-formats', array('aside', 'gallery'));
}
add_action('after_setup_theme', 'themename_post_formats_setup');

//To add an administration menu
//https://developer.wordpress.org/themes/functionality/administration-menus/
add_action('admin_menu', function () {
    add_options_page(
        'My Options',
        'My menu haha',
        'manage_options',
        'my-unique-identifier',
        function () {
            if (!current_user_can('manage_options')) {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }
            echo 'Here is where I output the HTML for my screen.';
            echo '</div><pre>';
        }
    );
    add_menu_page(
        'page title',
        'menu title',
        'manage_options',
        'my-unique-identifier2',
        function () {
            if (!current_user_can('manage_options')) {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }
            echo 'Here is where I output the HTML for my screen. 2';
            echo '</div><pre>';
        }
    );
});

function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
        'default-text-color' => '000',
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );

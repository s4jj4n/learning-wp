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


function theme_widgets_init() {
    require get_template_directory() . '/inc/widgets.php';
    register_widget( 'Foo_Widget' );

    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}

add_action( 'widgets_init', 'theme_widgets_init' );


function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function theme_customize_register( $wp_customize ) {

    /* ***************************
    // Add Social Media Section //
    *************************** */
    $wp_customize->add_section(
        'social-media',
        array(
            'title' => __( 'Social Media tets', 'add_setting' ),
            'priority' => 30,
            'description' => __( 'Enter the URL to your account for each service for the icon to appear in the header.', 'add_setting' )
        )
    );

    // Add Twitter Setting
    $wp_customize->add_setting( 'twitter', array( 'default' => '' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
        'label' => __( 'Twitter', 'add_setting' ),
        'section' => 'social-media',
        'settings' => 'twitter',
        'type' => 'text'
    ) ) );

    // Add Facebook Setting
    $wp_customize->add_setting( 'facebook' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
        'label' => __( 'Facebook', 'add_setting' ),
        'section' => 'social-media',
        'settings' => 'facebook',
        'type' => 'text'
    ) ) );

    // Add Instagram Setting
    $wp_customize->add_setting( 'instagram' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
        'label' => __( 'Instagram', 'add_setting' ),
        'section' => 'social-media',
        'settings' => 'instagram',
        'type' => 'text'
    ) ) );

    // Add LinkedIn Setting
    $wp_customize->add_setting( 'linkedin' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
        'label' => __( 'Linkedin', 'add_setting' ),
        'section' => 'social-media',
        'settings' => 'linkedin',
        'type' => 'text'
    ) ) );

    // Add Social share individual post Setting
    $wp_customize->add_setting( 'singlepost' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'singlepost', array(
        'label' => __( 'Click on the check box to activate the Social Share icon for individual post', 'add_setting' ),
        'section' => 'social-media',
        'settings' => 'singlepost',
        'type' => 'checkbox'
    ) ) );


}
add_action( 'customize_register', 'theme_customize_register' );

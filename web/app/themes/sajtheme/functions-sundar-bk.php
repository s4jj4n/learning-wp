<?php
/**
 * sundar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sundar
 */

if ( ! function_exists( 'sundar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sundar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sundar, use a find and replace
		 * to change 'sundar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sundar', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'sundar' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'sundar_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'sundar_setup' );


/* ***************************
// Add footer menu   //
*************************** */
function register_footer_menu() {
	register_nav_menu('footer-menu',__( 'Footer Menu Left' ));
   }
   add_action( 'init', 'register_footer_menu' );

/* ***************************
// Add footer menu   //
*************************** */
function register_footer_menu_right() {
	register_nav_menu('footer-menu-right',__( 'Footer Menu Right' ));
   }
   add_action( 'init', 'register_footer_menu_right' );


/* ***************************
// Add Custom font awesome  //
*************************** */
add_action( 'wp_enqueue_scripts', 'custom_load_font_awesome');

function custom_load_font_awesome(){
	wp_enqueue_style( 'font-awesome-free', '//use.fontawesome.com/releases/v5.11.2/css/all.css');
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sundar_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sundar_content_width', 640 );
}
add_action( 'after_setup_theme', 'sundar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sundar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widgets', 'sundar' ),
		'id'            => 'footer-widgets-1',
		'description'   => esc_html__( 'Add widgets here.', 'sundar' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sundar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sundar_scripts() {
	wp_enqueue_style( 'sundar-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sundar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sundar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'sundar-nav-scroll', get_template_directory_uri() . '/js/nav-scroll.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sundar_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




/** Function to add custom query 
 * 	for post per page for pagination **/
function my_post_queries( $query ) {
    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if (!is_admin() && $query->is_main_query()){
        // alter the query for the home and category pages
        // if(is_home()){
        //     $query->set('posts_per_page', 3);
        // }
        if(is_category()){
            $query->set('posts_per_page', 6);
        }
    }
}

//Modified archive page removing category from title
add_action( 'pre_get_posts', 'my_post_queries' );
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});


// Add placeholder for Name and Email
function modify_comment_form_fields($fields){
	$fields['author'] = '<p class="comment-form-author">' 
				. '<input id="author" placeholder="Name *" name="author" type="text" value="' 
				.esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'
				.( $req ? '<span class="required">*</span>' : '' )  
				.'</p>';
	$fields['email'] = '<p class="comment-form-email">' 
				. '<input id="email" placeholder="Email *" name="email" type="text" value="' 
				. esc_attr(  $commenter['comment_author_email'] ) 
				.'" size="30"' . $aria_req . ' />'  
				.( $req ? '<span class="required">*</span>' : '' ) 
				.'</p>';
	unset( $fields['url'] ); 
	// $fields['url'] = '<p class="comment-form-url">' 
	// 		.'<input id="url" name="url" placeholder="http://your-site-name.com" type="text" value="' 
	// 		. esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' 
	// 		.'</p>';
    return $fields;
}
add_filter('comment_form_default_fields','modify_comment_form_fields');

// Modify comments header text in comments
add_filter( 'genesis_title_comments', 'child_title_comments');
function child_title_comments() {
    return __(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'genesis');
}
 
// Unset URL from comment form
function crunchify_move_comment_form_below( $fields ) { 
	$fields['comment'] = '<p class="comment-form-comment">' 
	.'<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"'
	. esc_attr( $commenter['comment_author_comment'] ) . '" size="30">Add a comment</textarea>' 
	.'</p>';
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    $fields['comment'] = $comment_field; 
    return $fields; 
} 
add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' ); 

function activate_sundar_instagram() {
    require get_template_directory() . '/inc/widgets/instagram/widget.php';
}
add_action( 'widgets_init', 'activate_sundar_instagram' );

if (!function_exists('dd')) {
    function dd($var)
    {
        dump($var);
        die();
    }
}
if (!function_exists('dump')) {
    function dump($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


add_action('admin_init', function () {
    require get_template_directory() . '/inc/admin/Wpincubs_Dependency_Manager.php';
});

//function general_admin_notice(){
//    global $pagenow;
////    if ( $pagenow == 'options-general.php' ) {
//        echo '<div class="notice notice-warning is-dismissible">
//             <p>This notice appears on the settings page.</p>
//         </div>';
////    }
//}
//add_action('admin_notices', 'general_admin_notice');

add_action('admin_menu', function () {

    add_menu_page(
        'page title',
        'menu title',
        'manage_options',
        'my-unique-identifier2',
//        function () {
//            if (!current_user_can('manage_options')) {
//                wp_die(__('You do not have sufficient permissions to access this page.'));
//            }
//            echo 'Here is where I output the HTML for my screen. 2';
//            echo '</div><pre>';
//        }
        'mt_settings_page'
    );

    function mt_settings_page() {
//must check that the user has the required capability
        if (!current_user_can('manage_options'))
        {
            wp_die( __('You do not have sufficient permissions to access this page.') );
        }

// Variables for the field and option names
        $opt_name = 'mt_favorite_color';
        $hidden_field_name = 'mt_submit_hidden';
        $data_field_name = 'mt_favorite_color';

// Read in existing option value from database
        $opt_val = get_option( $opt_name );

// See if the user has posted us some information
// If they did, this hidden field will be set to 'Y'
        if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
            // Read their posted value
            $opt_val = $_POST[$data_field_name];

            // Save the posted value in the database
            update_option($opt_name, $opt_val);
        }
            // Put a "Settings updated" message on the screen
            ?>
            <div class="updated"></div>

            <div class="wrap">
                <?php
                // Header
                echo "<h2>" . __( 'Menu Test Settings', 'menu-test' ) . "</h2>";

                // Settings form
                ?>
                <form action="" method="post" name="form1">
                    <table>
                        <tr>
                            <th scope="row">
                                <label for="start_of_week">Week Starts On</label>
                            </th>
                            <td>
                                <select id="start_of_week" name="start_of_week">
                                    <option value="0">Sunday</option>
                                    <option selected="selected" value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">E-mail me whenever</th>
                            <td>
                                <fieldset>
                                    <legend class="screen-reader-text"><span>E-mail me whenever</span></legend>
                                    <label for="comments_notify">
                                        <input type="checkbox" checked="checked" value="1" id="comments_notify" name="comments_notify"> Anyone posts a comment
                                    </label>
                                    <br>
                                    <label for="moderation_notify">
                                        <input type="checkbox" checked="checked" value="1" id="moderation_notify" name="moderation_notify"> A comment is held for moderation
                                    </label>
                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </form>


                <hr />
            </div>
        <?php }


//    add_menu_page(
//        __('Test Toplevel','menu-test'),
//        __('Test Top-level','menu-test'),
//        'manage_options',
//        'mt-top-level-handle',
//        'mt_toplevel_page' );
//    function mt_toplevel_page() {
//        echo "</pre>
//    <h2>" . __( 'Test Top-Level', 'menu-test' ) . "</h2>
//    <pre>
//    ";
//    }
});



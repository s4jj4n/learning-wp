<?php
/**
 * Demo configuration
 *
 * @package Construction_Kit
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'primary' => 'main-menu',
		'social'  => 'social-menu',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Demo 1', 'construction-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-1/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-1/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-1/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'includes/demo/demo-content/demo-1/demo-1.png',
			'preview_url'                => 'https://demo.wpcharms.com/construction-kit/demo-1/',
		),

		array(
			'import_file_name'             => esc_html__( 'Demo 2', 'construction-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-2/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-2/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-2/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'includes/demo/demo-content/demo-2/demo-2.png',
			'preview_url'                => 'https://demo.wpcharms.com/construction-kit/demo-2/',
		),

		array(
			'import_file_name'             => esc_html__( 'Demo 3', 'construction-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-3/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-3/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-3/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'includes/demo/demo-content/demo-3/demo-3.png',
			'preview_url'                => 'https://demo.wpcharms.com/construction-kit/demo-3/',
		),

		array(
			'import_file_name'             => esc_html__( 'Demo 4', 'construction-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-4/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-4/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-4/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'includes/demo/demo-content/demo-4/demo-4.png',
			'preview_url'                => 'https://demo.wpcharms.com/construction-kit/demo-4/',
		),

		array(
			'import_file_name'             => esc_html__( 'Demo 5', 'construction-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-5/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-5/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-5/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'includes/demo/demo-content/demo-5/demo-5.png',
			'preview_url'                => 'https://demo.wpcharms.com/construction-kit/demo-5/',
		),

		array(
			'import_file_name'             => esc_html__( 'Demo 6', 'construction-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-6/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-6/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/demo/demo-content/demo-6/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'includes/demo/demo-content/demo-6/demo-6.png',
			'preview_url'                => 'https://demo.wpcharms.com/construction-kit/demo-6/',
		),
		
	),
);

Construction_Kit_Demo::init( apply_filters( 'Construction_Kit_Demo_filter', $config ) );

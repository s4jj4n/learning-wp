<?php
/**
 * Shop Options.
 *
 * @package Construction_Kit
 */

// Shop Section.
$wp_customize->add_section( 'section_shop',
	array(
		'title'      => esc_html__( 'Shop (WooCommerce)', 'construction-kit' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting product_per_page.
$wp_customize->add_setting( 'theme_options[product_per_page]',
	array(
		'default'           => $default['product_per_page'],
		'sanitize_callback' => 'construction_kit_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[product_per_page]',
	array(
		'label'    		=> esc_html__( 'Products Per Page', 'construction-kit' ),
		'description'   => esc_html__( 'Total number of products shown per page', 'construction-kit' ),
		'section'  		=> 'section_shop',
		'type'     		=> 'number',
		'priority' 		=> 100,
		'input_attrs'   => array( 'min' => 3, 'max' => 30 ),
	)
);

// Setting product_number_per_row.
$wp_customize->add_setting( 'theme_options[product_number]',
	array(
		'default'           => $default['product_number'],
		'sanitize_callback' => 'construction_kit_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[product_number]',
	array(
		'label'    		=> esc_html__( 'Products Per Row', 'construction-kit' ),
		'description'   => esc_html__( 'Number of products shown per row', 'construction-kit' ),
		'section'  		=> 'section_shop',
		'type'     		=> 'select',
		'priority' 		=> 100,
		'choices'  		=> array(
							'2'  	=> esc_html__( '2', 'construction-kit' ),
							'3' 	=> esc_html__( '3', 'construction-kit' ),
							'4'    	=> esc_html__( '4', 'construction-kit' ),
						),
	)
);

// Setting hide_product_sorting.
$wp_customize->add_setting( 'theme_options[hide_product_sorting]',
	array(
		'default'           => $default['hide_product_sorting'],
		'sanitize_callback' => 'construction_kit_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[hide_product_sorting]',
	array(
		'label'    			=> esc_html__( 'Disable Product Sorting Option', 'construction-kit' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting enable_gallery_zoom.
$wp_customize->add_setting( 'theme_options[enable_gallery_zoom]',
	array(
		'default'           => $default['enable_gallery_zoom'],
		'sanitize_callback' => 'construction_kit_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_gallery_zoom]',
	array(
		'label'    			=> esc_html__( 'Enable Image Zoom at Product Detail Page', 'construction-kit' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting disable_related_products.
$wp_customize->add_setting( 'theme_options[disable_related_products]',
	array(
		'default'           => $default['disable_related_products'],
		'sanitize_callback' => 'construction_kit_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[disable_related_products]',
	array(
		'label'    			=> esc_html__( 'Disable Related Products at Product Detail Page', 'construction-kit' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting related_product_text.
$wp_customize->add_setting( 'theme_options[related_product_text]',
	array(
		'default'           => $default['related_product_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[related_product_text]',
	array(
		'label'    => esc_html__( 'Related Products Text', 'construction-kit' ),
		'section'  => 'section_shop',
		'type'     => 'text',
		'priority' => 100,
	)
);
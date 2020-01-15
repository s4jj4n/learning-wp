<?php
/**
 * Color and Fonts Options.
 *
 * @package Construction_Kit
 */

global $construction_kit_google_fonts;

// Font setting starts.
$wp_customize->add_section( 'section_color_fonts',
	array(
		'title'      => esc_html__( 'Color and Fonts', 'construction-kit' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting site primary color.
$wp_customize->add_setting( 'theme_options[primary_color]',
	array(
		'default'           => $default['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'theme_options[primary_color]',
		array(
			'label'       => esc_html__( 'Primary Color', 'construction-kit' ),
			'description' => esc_html__( 'Applied to main color of site.', 'construction-kit' ),
			'section'     => 'section_color_fonts',	
		)
	)
);

// Setting body_font.
$wp_customize->add_setting( 'theme_options[body_font]',
	array(
		'default'           => $default['body_font'],
		'sanitize_callback' => 'construction_kit_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[body_font]',
	array(
		'label'       => esc_html__( 'Body & Content Font', 'construction-kit' ),
		'section'     => 'section_color_fonts',
		'type'        => 'select',
		'choices'     => $construction_kit_google_fonts,
	)
);

// Setting heading_font.
$wp_customize->add_setting( 'theme_options[heading_font]',
	array(
		'default'           => $default['heading_font'],
		'sanitize_callback' => 'construction_kit_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[heading_font]',
	array(
		'label'       => esc_html__( 'Headings Font', 'construction-kit' ),
		'description' => esc_html__( 'Applied to H1 - H6', 'construction-kit' ),
		'section'     => 'section_color_fonts',
		'type'        => 'select',
		'choices'     => $construction_kit_google_fonts,
	)
);

// Setting menu_font.
$wp_customize->add_setting( 'theme_options[menu_font]',
	array(
		'default'           => $default['menu_font'],
		'sanitize_callback' => 'construction_kit_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[menu_font]',
	array(
		'label'       => esc_html__( 'Menu Font', 'construction-kit' ),
		'section'     => 'section_color_fonts',
		'type'        => 'select',
		'choices'     => $construction_kit_google_fonts,
	)
);

// reset_fonts
$wp_customize->add_setting( 'theme_options[reset_fonts]', 
	array(
		'default'           => $default['reset_fonts'],	
		'transport'         => 'postMessage',		
		'sanitize_callback' => 'construction_kit_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[reset_fonts]',
	array(
		'label'    => esc_html__( 'Reset Fonts', 'construction-kit' ),
		'description' =>  esc_html__( 'This will replace all fonts with default font of the theme. Please reload page to see changes.', 'construction-kit' ),
		'section'  => 'section_color_fonts',
		'type'     => 'checkbox',
	)
);
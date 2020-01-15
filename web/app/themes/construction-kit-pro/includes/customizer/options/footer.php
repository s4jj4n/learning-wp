<?php
/**
 * Footer Options.
 *
 * @package Construction_Kit
 */

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
		'title'      => esc_html__( 'Footer', 'construction-kit' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting enable_sticky_footer.
$wp_customize->add_setting( 'theme_options[enable_sticky_footer]',
	array(
		'default'           => $default['enable_sticky_header'],
		'sanitize_callback' => 'construction_kit_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_sticky_footer]',
	array(
		'label'    			=> esc_html__( 'Enable Sticky Footer', 'construction-kit' ),
		'section'  			=> 'section_footer',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
		'default'           => $default['copyright_text'],
		'sanitize_callback' => 'construction_kit_sanitize_textarea',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
		'label'    => esc_html__( 'Copyright Text', 'construction-kit' ),
		'section'  => 'section_footer',
		'type'     => 'textarea',
		'priority' => 100,
	)
);

// Setting powerby_text.
$wp_customize->add_setting( 'theme_options[powerby_text]',
	array(
		'default'           => $default['powerby_text'],
		'sanitize_callback' => 'construction_kit_sanitize_textarea',
	)
);
$wp_customize->add_control( 'theme_options[powerby_text]',
	array(
		'label'    => esc_html__( 'Power By Text', 'construction-kit' ),
		'section'  => 'section_footer',
		'type'     => 'textarea',
		'priority' => 100,
	)
);
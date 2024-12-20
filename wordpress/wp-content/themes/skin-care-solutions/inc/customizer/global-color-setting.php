<?php
/**
* Global Color Settings.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'skin_care_solutions_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'skin-care-solutions' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'skin_care_solutions_theme_option_panel',
	)
);

$wp_customize->add_setting( 'skin_care_solutions_global_color',
    array(
    'default'           => '#E69EB0',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'skin_care_solutions_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'skin-care-solutions' ),
        'section'    => 'skin_care_solutions_global_color_setting',
        'settings'   => 'skin_care_solutions_global_color',
    ) ) 
);
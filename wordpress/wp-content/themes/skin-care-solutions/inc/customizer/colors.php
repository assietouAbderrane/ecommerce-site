<?php
/**
* Color Settings.
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

$wp_customize->add_setting( 'skin_care_solutions_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'skin_care_solutions_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'skin-care-solutions' ),
        'section'    => 'colors',
        'settings'   => 'skin_care_solutions_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'skin_care_solutions_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'skin_care_solutions_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'skin-care-solutions' ),
        'section'    => 'colors',
        'settings'   => 'skin_care_solutions_border_color',
    ) ) 
);
<?php
/**
* Header Options.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'skin_care_solutions_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'skin-care-solutions' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'skin_care_solutions_theme_option_panel',
	)
);

$wp_customize->add_setting( 'skin_care_solutions_header_layout_phone_number',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Header Phone Number', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_header_layout_20_per_discount_text',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_header_layout_20_per_discount_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_layout_20_per_discount_text',
    array(
    'label'    => esc_html__( 'Header Discount Text', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('skin_care_solutions_menu_font_size',
    array(
        'default'           => $skin_care_solutions_default['skin_care_solutions_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_number_range',
    )
);
$wp_customize->add_control('skin_care_solutions_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'skin-care-solutions'),
        'section'     => 'skin_care_solutions_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'skin_care_solutions_menu_text_transform',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'skin_care_solutions_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'skin-care-solutions' ),
        'uppercase'  => esc_html__( 'Uppercase', 'skin-care-solutions' ),
        'lowercase'    => esc_html__( 'Lowercase', 'skin-care-solutions' ),
        ),
    )
);

$wp_customize->add_setting('skin_care_solutions_sticky',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_button_header_setting',
        'type' => 'checkbox',
    )
);
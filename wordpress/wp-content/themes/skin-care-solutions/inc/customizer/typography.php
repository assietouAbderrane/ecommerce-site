<?php
/**
* Typography Settings.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'skin_care_solutions_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'skin-care-solutions' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'skin_care_solutions_theme_option_panel',
	)
);

// -----------------  Font array
$skin_care_solutions_fonts = array(
    'bad-script' => 'Bad Script',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'play'       => 'Play',
    'Inter'     => 'Inter',
    'PlayfairDisplay'     => 'PlayfairDisplay',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'skin_care_solutions_content_typography_font', array(
    'default'           => 'Inter',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_radio_sanitize',
) );
$wp_customize->add_control( 'skin_care_solutions_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content font', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_typography_setting',
    'settings' => 'skin_care_solutions_content_typography_font',
    'choices'  => $skin_care_solutions_fonts,
) );

 // -----------------  General Heading font
$wp_customize->add_setting( 'skin_care_solutions_heading_typography_font', array(
    'default'           => 'PlayfairDisplay',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_radio_sanitize',
) );
$wp_customize->add_control( 'skin_care_solutions_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General heading font', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_typography_setting',
    'settings' => 'skin_care_solutions_heading_typography_font',
    'choices'  => $skin_care_solutions_fonts,
) );
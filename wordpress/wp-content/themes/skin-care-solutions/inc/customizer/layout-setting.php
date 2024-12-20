<?php
/**
* Layouts Settings.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'skin_care_solutions_layout_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'skin-care-solutions' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'skin_care_solutions_theme_option_panel',
	)
);

$wp_customize->add_setting( 'skin_care_solutions_global_sidebar_layout',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'skin_care_solutions_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'skin-care-solutions' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'skin-care-solutions' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'skin-care-solutions' ),
        ),
    )
);

$wp_customize->add_setting('skin_care_solutions_page_sidebar_layout', array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_sidebar_option',
));

$wp_customize->add_control('skin_care_solutions_page_sidebar_layout', array(
    'label'       => esc_html__('Single Page Sidebar Layout', 'skin-care-solutions'),
    'section'     => 'skin_care_solutions_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'skin-care-solutions'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'skin-care-solutions'),
        'no-sidebar'    => esc_html__('No Sidebar', 'skin-care-solutions'),
    ),
));

$wp_customize->add_setting('skin_care_solutions_post_sidebar_layout', array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_sidebar_option',
));

$wp_customize->add_control('skin_care_solutions_post_sidebar_layout', array(
    'label'       => esc_html__('Single Post Sidebar Layout', 'skin-care-solutions'),
    'section'     => 'skin_care_solutions_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'skin-care-solutions'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'skin-care-solutions'),
        'no-sidebar'    => esc_html__('No Sidebar', 'skin-care-solutions'),
    ),
));
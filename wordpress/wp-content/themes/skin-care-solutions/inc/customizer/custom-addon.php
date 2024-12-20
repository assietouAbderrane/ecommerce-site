<?php
/**
* Custom Addons.
*
* @package Skin Care Solutions
*/

$wp_customize->add_section( 'skin_care_solutions_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'skin-care-solutions' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_addons_panel',
    )
);

$wp_customize->add_setting('skin_care_solutions_theme_loader',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_theme_pagination_options',
        'type' => 'checkbox',
    )
);

// Add Pagination Enable/Disable option to Customizer
$wp_customize->add_setting( 'skin_care_solutions_enable_pagination', 
    array(
        'default'           => true, // Default is enabled
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_enable_pagination', // Sanitize the input
    )
);

// Add the control to the Customizer
$wp_customize->add_control( 'skin_care_solutions_enable_pagination', 
    array(
        'label'    => esc_html__( 'Enable Pagination', 'skin-care-solutions' ),
        'section'  => 'skin_care_solutions_theme_pagination_options', // Add to the correct section
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_theme_pagination_type', 
    array(
        'default'           => 'numeric', // Set "numeric" as the default
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_pagination_type', // Use our sanitize function
    )
);

$wp_customize->add_control( 'skin_care_solutions_theme_pagination_type',
    array(
        'label'       => esc_html__( 'Pagination Style', 'skin-care-solutions' ),
        'section'     => 'skin_care_solutions_theme_pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'numeric'      => esc_html__( 'Numeric (Page Numbers)', 'skin-care-solutions' ),
            'newer_older'  => esc_html__( 'Newer/Older (Previous/Next)', 'skin-care-solutions' ), // Renamed to "Newer/Older"
        ),
    )
);

$wp_customize->add_setting( 'skin_care_solutions_theme_pagination_options_alignment',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'skin_care_solutions_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'skin-care-solutions' ),
        'Right' => esc_html__( 'Right', 'skin-care-solutions' ),
        'Left'  => esc_html__( 'Left', 'skin-care-solutions' ),
        ),
    )
);

$wp_customize->add_setting('skin_care_solutions_theme_breadcrumb_enable',
array(
    'default' => $skin_care_solutions_default['skin_care_solutions_theme_breadcrumb_enable'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
)
);
$wp_customize->add_control('skin_care_solutions_theme_breadcrumb_enable',
    array(
        'label' => esc_html__('Enable Breadcrumb', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_theme_pagination_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_theme_breadcrumb_options_alignment',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'skin_care_solutions_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'skin-care-solutions' ),
        'Right' => esc_html__( 'Right', 'skin-care-solutions' ),
        'Left'  => esc_html__( 'Left', 'skin-care-solutions' ),
        ),
    )
);
$wp_customize->add_setting('skin_care_solutions_breadcrumb_font_size',
    array(
        'default'           => $skin_care_solutions_default['skin_care_solutions_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_number_range',
    )
);
$wp_customize->add_control('skin_care_solutions_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'skin-care-solutions'),
        'section'     => 'skin_care_solutions_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'skin_care_solutions_single_page_content_alignment',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'skin_care_solutions_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'skin-care-solutions' ),
        'center'  => esc_html__( 'Center', 'skin-care-solutions' ),
        'right'    => esc_html__( 'Right', 'skin-care-solutions' ),
        ),
    )
);

$wp_customize->add_setting( 'skin_care_solutions_single_post_content_alignment',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_single_post_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'skin_care_solutions_single_post_content_alignment',
    array(
    'label'       => esc_html__( 'Single Post Content Alignment', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'skin-care-solutions' ),
        'center'  => esc_html__( 'Center', 'skin-care-solutions' ),
        'right'    => esc_html__( 'Right', 'skin-care-solutions' ),
        ),
    )
);
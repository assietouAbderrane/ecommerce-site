<?php
/**
* Posts Settings.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'skin_care_solutions_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'skin-care-solutions' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'skin_care_solutions_theme_option_panel',
    )
);

$wp_customize->add_setting('skin_care_solutions_post_author',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_post_date',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_post_category',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_post_tags',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_single_posts_settings',
        'type' => 'checkbox',
    )
);

// Archive Post Section.
$wp_customize->add_section( 'skin_care_solutions_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'skin-care-solutions' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'skin_care_solutions_theme_option_panel',
    )
);

$wp_customize->add_setting('skin_care_solutions_display_archive_post_sticky_post',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_display_archive_post_sticky_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_display_archive_post_sticky_post',
    array(
        'label' => esc_html__('Enable sticky Post', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_display_archive_post_image',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_display_archive_post_category',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_display_archive_post_title',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_display_archive_post_content',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_display_archive_post_button',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_excerpt_limit',
    array(
        'default'           => $skin_care_solutions_default['skin_care_solutions_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_number_range',
    )
);
$wp_customize->add_control('skin_care_solutions_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'skin-care-solutions'),
        'section'     => 'skin_care_solutions_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);
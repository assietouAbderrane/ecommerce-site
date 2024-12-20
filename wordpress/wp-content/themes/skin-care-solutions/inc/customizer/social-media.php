<?php
/**
* Header Options.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'skin_care_solutions_social_media_setting',
	array(
	'title'      => esc_html__( 'Social Media Settings', 'skin-care-solutions' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'skin_care_solutions_theme_option_panel',
	)
);

$wp_customize->add_setting( 'skin_care_solutions_header_layout_facebook_link',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_header_layout_facebook_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_layout_facebook_link',
    array(
    'label'    => esc_html__( 'Facebook Link', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_header_layout_twitter_link',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_header_layout_twitter_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_layout_twitter_link',
    array(
    'label'    => esc_html__( 'Twitter Link', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_header_layout_pintrest_link',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_header_layout_pintrest_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_layout_pintrest_link',
    array(
    'label'    => esc_html__( 'Pintrest Link', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_header_layout_instagram_link',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_header_layout_instagram_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_layout_instagram_link',
    array(
    'label'    => esc_html__( 'Instagram Link', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_header_layout_youtube_link',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_header_layout_youtube_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_layout_youtube_link',
    array(
    'label'    => esc_html__( 'Youtube Link', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_social_media_setting',
    'type'     => 'url',
    )
);
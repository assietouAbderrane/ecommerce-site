<?php
/**
* Footer Settings.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

$wp_customize->add_section( 'skin_care_solutions_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'skin-care-solutions' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'skin_care_solutions_theme_option_panel',
	)
);

$wp_customize->add_setting('skin_care_solutions_display_footer',
    array(
    'default' => $skin_care_solutions_default['skin_care_solutions_display_footer'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
)
);
$wp_customize->add_control('skin_care_solutions_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_footer_column_layout',
	array(
	'default'           => $skin_care_solutions_default['skin_care_solutions_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'skin_care_solutions_sanitize_select',
	)
);
$wp_customize->add_control( 'skin_care_solutions_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'skin-care-solutions' ),
	'section'     => 'skin_care_solutions_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'skin-care-solutions' ),
		'2' => esc_html__( 'Two Column', 'skin-care-solutions' ),
		'3' => esc_html__( 'Three Column', 'skin-care-solutions' ),
	    ),
	)
);

$wp_customize->add_setting( 'skin_care_solutions_footer_widget_title_alignment',
        array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_footer_widget_title_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_footer_widget_title_alignment',
    )
);
$wp_customize->add_control( 'skin_care_solutions_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'skin-care-solutions' ),
        'center'  => esc_html__( 'Center', 'skin-care-solutions' ),
        'right'    => esc_html__( 'Right', 'skin-care-solutions' ),
        ),
    )
);

$wp_customize->add_setting( 'skin_care_solutions_footer_copyright_text',
	array(
	'default'           => $skin_care_solutions_default['skin_care_solutions_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'skin_care_solutions_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'skin-care-solutions' ),
	'section'  => 'skin_care_solutions_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('skin_care_solutions_copyright_font_size',
    array(
        'default'           => $skin_care_solutions_default['skin_care_solutions_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_number_range',
    )
);
$wp_customize->add_control('skin_care_solutions_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'skin-care-solutions'),
        'section'     => 'skin_care_solutions_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'skin_care_solutions_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'skin_care_solutions_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'skin-care-solutions'),
    'description' => __('It will change the complete footer widget background color.', 'skin-care-solutions'),
    'section' => 'skin_care_solutions_footer_widget_area',
    'settings' => 'skin_care_solutions_footer_widget_background_color',
)));

$wp_customize->add_setting('skin_care_solutions_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'skin_care_solutions_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','skin-care-solutions'),
    'section' => 'skin_care_solutions_footer_widget_area'
)));

$wp_customize->add_setting('skin_care_solutions_enable_to_the_top',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_to_the_top_text',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'skin_care_solutions_to_the_top_text',
    array(
    'label'    => esc_html__( 'To The Top Text', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_footer_widget_area',
    'type'     => 'text',
    )
);
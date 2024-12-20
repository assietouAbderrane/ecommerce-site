<?php
/**
* Additional Woocommerce Settings.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'skin_care_solutions_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'skin-care-solutions' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'skin_care_solutions_theme_option_panel',
	)
);

	$wp_customize->add_setting('skin_care_solutions_per_columns',
		array(
		'default'           => $skin_care_solutions_default['skin_care_solutions_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skin_care_solutions_sanitize_number_range',
		)
	);
	$wp_customize->add_control('skin_care_solutions_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'skin-care-solutions'),
		'section'     => 'skin_care_solutions_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('skin_care_solutions_product_per_page',
		array(
		'default'           => $skin_care_solutions_default['skin_care_solutions_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skin_care_solutions_sanitize_number_range',
		)
	);
	$wp_customize->add_control('skin_care_solutions_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'skin-care-solutions'),
		'section'     => 'skin_care_solutions_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('skin_care_solutions_show_hide_related_product',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('skin_care_solutions_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'skin-care-solutions'),
	        'section' => 'skin_care_solutions_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);

<?php
/**
* Header Banner Options.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
$skin_care_solutions_post_category_list = skin_care_solutions_post_category_list();

$wp_customize->add_section( 'skin_care_solutions_header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'skin-care-solutions' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting('skin_care_solutions_display_header_text',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'skin-care-solutions'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('skin_care_solutions_header_banner',
    array(
        'default' => $skin_care_solutions_default['skin_care_solutions_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'skin_care_solutions_sanitize_checkbox',
    )
);
$wp_customize->add_control('skin_care_solutions_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'skin-care-solutions'),
        'section' => 'skin_care_solutions_header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_slider_section_title',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_slider_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'skin_care_solutions_slider_section_title',
    array(
    'label'    => esc_html__( 'Slider Title', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'skin_care_solutions_sanitize_select',
    )
);
$wp_customize->add_control( 'skin_care_solutions_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'skin-care-solutions' ),
    'section'     => 'skin_care_solutions_header_banner_setting',
    'type'        => 'select',
    'choices'     => $skin_care_solutions_post_category_list,
    )
);

// Product Settings

$wp_customize->add_section( 'skin_care_solutions_product_column_setting',
    array(
    'title'      => esc_html__( 'Product Settings', 'skin-care-solutions' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_product_section_heading',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_product_section_heading'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'skin_care_solutions_product_section_heading',
    array(
    'label'    => esc_html__( 'Product Short Heading', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_product_column_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'skin_care_solutions_product_section_title',
    array(
    'default'           => $skin_care_solutions_default['skin_care_solutions_product_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'skin_care_solutions_product_section_title',
    array(
    'label'    => esc_html__( 'Product Title', 'skin-care-solutions' ),
    'section'  => 'skin_care_solutions_product_column_setting',
    'type'     => 'text',
    )
);

$skin_care_solutions_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$skin_care_solutions_categories = get_categories($skin_care_solutions_args);
$skin_care_solutions_cat_posts = array();
$skin_care_solutions_m = 0;
$skin_care_solutions_cat_posts[]='Select';
foreach($skin_care_solutions_categories as $skin_care_solutions_category){
    if($skin_care_solutions_m==0){
        $skin_care_solutions_default = $skin_care_solutions_category->slug;
        $skin_care_solutions_m++;
    }
    $skin_care_solutions_cat_posts[$skin_care_solutions_category->slug] = $skin_care_solutions_category->name;
}

$wp_customize->add_setting('skin_care_solutions_featured_product_category',array(
    'default'   => 'select',
    'sanitize_callback' => 'skin_care_solutions_sanitize_select',
));
$wp_customize->add_control('skin_care_solutions_featured_product_category',array(
    'type'    => 'select',
    'choices' => $skin_care_solutions_cat_posts,
    'label' => __('Select category to display products ','skin-care-solutions'),
    'section' => 'skin_care_solutions_product_column_setting',
));
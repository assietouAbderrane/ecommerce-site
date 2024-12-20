<?php
/**
 * Skin Care Solutions Theme Customizer
 * @package Skin Care Solutions
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

if (!function_exists('skin_care_solutions_customize_register')) :

function skin_care_solutions_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/header-button.php';
	require get_template_directory() . '/inc/customizer/typography.php';
	require get_template_directory() . '/inc/customizer/social-media.php';
	require get_template_directory() . '/inc/customizer/global-color-setting.php';
	require get_template_directory() . '/inc/customizer/custom-addon.php';
	require get_template_directory() . '/inc/customizer/colors.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layout-setting.php';
	require get_template_directory() . '/inc/customizer/homepage-content.php';
	require get_template_directory() . '/inc/customizer/additional-woocommerce.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->panel = 'theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','skin-care-solutions');
	$wp_customize->get_section( 'title_tagline' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'theme_general_settings';

	if ( isset( $wp_customize->selective_refresh ) ) {
		
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header-titles .custom-logo-name',
			'render_callback' => 'skin_care_solutions_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'skin_care_solutions_customize_partial_blogdescription',
		) );

	}

	$wp_customize->add_panel( 'theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'skin-care-solutions' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'skin-care-solutions' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'theme_footer_option_panel',
		array(
			'title'      => esc_html__( 'Footer Setting', 'skin-care-solutions' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'theme_home_pannel',
		array(
			'title'      => esc_html__( 'Frontpage Settings', 'skin-care-solutions' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Addons Panel.
	$wp_customize->add_panel( 'theme_addons_panel',
		array(
			'title'      => esc_html__( 'Theme Addons', 'skin-care-solutions' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Theme Options Panel.
	$wp_customize->add_panel( 'skin_care_solutions_theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'skin-care-solutions' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting('skin_care_solutions_logo_width_range',
	    array(
	        'default'           => $skin_care_solutions_default['skin_care_solutions_logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'skin_care_solutions_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('skin_care_solutions_logo_width_range',
	    array(
	        'label'       => esc_html__('Logo width', 'skin-care-solutions'),
	        'description'       => esc_html__( 'Specify the range for logo size with a minimum of 200px and a maximum of 700px, in increments of 20px.', 'skin-care-solutions' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
	           'min'   => 200,
	           'max'   => 700,
	           'step'   => 20,
        	),
	    )
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Skin_Care_Solutions_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Skin_Care_Solutions_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Skin Care Solutions Pro', 'skin-care-solutions' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'skin-care-solutions' ),
				'pro_url'  => esc_url('https://www.omegathemes.com/products/skin-care-wordpress-theme'),
				'priority'  => 1,
			)
		)
	);
}

endif;
add_action( 'customize_register', 'skin_care_solutions_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('skin_care_solutions_customizer_scripts')) :

    function skin_care_solutions_customizer_scripts(){
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('skin-care-solutions-customizer', get_template_directory_uri() . '/lib/custom/css/customizer.css');
        wp_enqueue_script('skin-care-solutions-customizer', get_template_directory_uri() . '/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('skin_care_solutions_ajax_nonce');
        wp_localize_script( 
		    'skin-care-solutions-customizer',
		    'skin_care_solutions_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'skin_care_solutions_customizer_scripts');
add_action('customize_controls_init', 'skin_care_solutions_customizer_scripts');

function skin_care_solutions_customize_preview_js() {
	wp_enqueue_script( 'skin-care-solutions-customizer-preview', get_template_directory_uri() . '/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'skin_care_solutions_customize_preview_js' );

if (!function_exists('skin_care_solutions_customize_partial_blogname')) :
	function skin_care_solutions_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

if (!function_exists('skin_care_solutions_customize_partial_blogdescription')) :
	function skin_care_solutions_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
endif;
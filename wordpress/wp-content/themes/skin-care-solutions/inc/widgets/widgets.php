<?php
/**
* Widget Functions.
*
* @package Skin Care Solutions Engine
*/

function skin_care_solutions_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'skin-care-solutions'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'skin-care-solutions'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
    $skin_care_solutions_footer_column_layout = absint( get_theme_mod( 'skin_care_solutions_footer_column_layout',$skin_care_solutions_default['skin_care_solutions_footer_column_layout'] ) );

    for( $skin_care_solutions_i = 0; $skin_care_solutions_i < $skin_care_solutions_footer_column_layout; $skin_care_solutions_i++ ){
    	
    	if( $skin_care_solutions_i == 0 ){ $skin_care_solutions_count = esc_html__('One','skin-care-solutions'); }
    	if( $skin_care_solutions_i == 1 ){ $skin_care_solutions_count = esc_html__('Two','skin-care-solutions'); }
    	if( $skin_care_solutions_i == 2 ){ $skin_care_solutions_count = esc_html__('Three','skin-care-solutions'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'skin-care-solutions').$skin_care_solutions_count,
	        'id' => 'skin-care-solutions-footer-widget-'.$skin_care_solutions_i,
	        'description' => esc_html__('Add widgets here.', 'skin-care-solutions'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'skin_care_solutions_widgets_init');
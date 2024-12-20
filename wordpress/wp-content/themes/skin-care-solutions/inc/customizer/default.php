<?php
/**
 * Default Values.
 *
 * @package Skin Care Solutions
 */

if ( ! function_exists( 'skin_care_solutions_get_default_theme_options' ) ) :
	function skin_care_solutions_get_default_theme_options() {

		$skin_care_solutions_defaults = array();
		
        // Options.
        $skin_care_solutions_defaults['skin_care_solutions_logo_width_range']                                          = 300;
	$skin_care_solutions_defaults['skin_care_solutions_global_sidebar_layout']					   = 'right-sidebar';
        $skin_care_solutions_defaults['skin_care_solutions_header_layout_phone_number']            = esc_html__( '+(0321)7528659', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_header_layout_20_per_discount_text']    = esc_html__( 'Freebies on order above $60', 'skin-care-solutions' );
        
        $skin_care_solutions_defaults['skin_care_solutions_pagination_layout']                     = 'numeric';
        $skin_care_solutions_defaults['skin_care_solutions_menu_text_transform']          = 'capitalize';
        $skin_care_solutions_defaults['skin_care_solutions_single_page_content_alignment']                 = 'left';
        $skin_care_solutions_defaults['skin_care_solutions_footer_column_layout'] 		   = 3;
        $skin_care_solutions_defaults['skin_care_solutions_menu_font_size']          = 15;
        $skin_care_solutions_defaults['skin_care_solutions_copyright_font_size']          = 16;
        $skin_care_solutions_defaults['skin_care_solutions_breadcrumb_font_size']                 = 16;
        $skin_care_solutions_defaults['skin_care_solutions_excerpt_limit']                 = 10;
        $skin_care_solutions_defaults['skin_care_solutions_per_columns']          = 3;
        $skin_care_solutions_defaults['skin_care_solutions_product_per_page']          = 9;
        $skin_care_solutions_defaults['skin_care_solutions_footer_copyright_text'] 		   = esc_html__( 'All rights reserved.', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_theme_breadcrumb_options_alignment']                      = 'Center';
        $skin_care_solutions_defaults['skin_care_solutions_theme_pagination_options_alignment']                      = 'Center';
        $skin_care_solutions_defaults['skin_care_solutions_twp_navigation_type']              			   = 'theme-normal-navigation';
        $skin_care_solutions_defaults['skin_care_solutions_post_author']                	   = 1;
        $skin_care_solutions_defaults['skin_care_solutions_post_date']                		   = 1;
        $skin_care_solutions_defaults['skin_care_solutions_post_category']                	   = 1;
        $skin_care_solutions_defaults['skin_care_solutions_post_tags']                		   = 1;
        $skin_care_solutions_defaults['skin_care_solutions_floating_next_previous_nav']            = 1;
        $skin_care_solutions_defaults['skin_care_solutions_header_banner']               	   = 1;
        $skin_care_solutions_defaults['skin_care_solutions_sticky']                                = 0;
        $skin_care_solutions_defaults['skin_care_solutions_theme_loader']                 = 0;
        $skin_care_solutions_defaults['skin_care_solutions_display_footer']            = 0;
        $skin_care_solutions_defaults['skin_care_solutions_footer_widget_title_alignment']                 = 'left'; 
        $skin_care_solutions_defaults['skin_care_solutions_show_hide_related_product']          = 1;
        $skin_care_solutions_defaults['skin_care_solutions_display_archive_post_image']            = 1;
        $skin_care_solutions_defaults['skin_care_solutions_background_color']                      = '#fff';
        $skin_care_solutions_defaults['skin_care_solutions_product_section_title']                 = esc_html__( 'Trending Products', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_product_section_heading']               = esc_html__( 'Our Shop', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_slider_section_title']                  = esc_html__( 'Skincare & Dermatology', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_global_color']                                   = '#E69EB0';
        $skin_care_solutions_defaults['skin_care_solutions_display_archive_post_category']          = 1;
        $skin_care_solutions_defaults['skin_care_solutions_display_archive_post_sticky_post']       = 1;
        $skin_care_solutions_defaults['skin_care_solutions_display_archive_post_title']             = 1;
        $skin_care_solutions_defaults['skin_care_solutions_display_archive_post_content']           = 1;
        $skin_care_solutions_defaults['skin_care_solutions_display_archive_post_button']            = 1;
        $skin_care_solutions_defaults['skin_care_solutions_theme_breadcrumb_enable']                 = 1;
        $skin_care_solutions_defaults['skin_care_solutions_single_post_content_alignment']                 = 'left';

        $skin_care_solutions_defaults['skin_care_solutions_enable_to_the_top']                      = 1;
        $skin_care_solutions_defaults['skin_care_solutions_to_the_top_text']                      = esc_html__( 'To The Top', 'skin-care-solutions' );

        // Social Icon
        $skin_care_solutions_defaults['skin_care_solutions_header_layout_facebook_link']              = esc_url( '#', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_header_layout_twitter_link']               = esc_url( '#', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_header_layout_pintrest_link']              = esc_url( '#', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_header_layout_instagram_link']             = esc_url( '#', 'skin-care-solutions' );
        $skin_care_solutions_defaults['skin_care_solutions_header_layout_youtube_link']               = esc_url( '#', 'skin-care-solutions' );

	// Pass through filter.
	$skin_care_solutions_defaults = apply_filters( 'skin_care_solutions_filter_default_theme_options', $skin_care_solutions_defaults );

		return $skin_care_solutions_defaults;
	}
endif;

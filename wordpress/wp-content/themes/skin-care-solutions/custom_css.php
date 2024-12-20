<?php

$skin_care_solutions_custom_css = "";

	$skin_care_solutions_theme_pagination_options_alignment = get_theme_mod('skin_care_solutions_theme_pagination_options_alignment', 'Center');
	if ($skin_care_solutions_theme_pagination_options_alignment == 'Center') {
		$skin_care_solutions_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$skin_care_solutions_custom_css .= 'justify-content: center;margin: 0 auto;';
		$skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_theme_pagination_options_alignment == 'Right') {
		$skin_care_solutions_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$skin_care_solutions_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_theme_pagination_options_alignment == 'Left') {
		$skin_care_solutions_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$skin_care_solutions_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$skin_care_solutions_custom_css .= '}';
	}

	$skin_care_solutions_theme_breadcrumb_enable = get_theme_mod('skin_care_solutions_theme_breadcrumb_enable',true);
    if($skin_care_solutions_theme_breadcrumb_enable != true){
        $skin_care_solutions_custom_css .='nav.breadcrumb-trail.breadcrumbs,nav.woocommerce-breadcrumb{';
            $skin_care_solutions_custom_css .='display: none;';
        $skin_care_solutions_custom_css .='}';
    }

	$skin_care_solutions_theme_breadcrumb_options_alignment = get_theme_mod('skin_care_solutions_theme_breadcrumb_options_alignment', 'Left');
	if ($skin_care_solutions_theme_breadcrumb_options_alignment == 'Center') {
	    $skin_care_solutions_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $skin_care_solutions_custom_css .= 'text-align: center !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_theme_breadcrumb_options_alignment == 'Right') {
	    $skin_care_solutions_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $skin_care_solutions_custom_css .= 'text-align: Right !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_theme_breadcrumb_options_alignment == 'Left') {
	    $skin_care_solutions_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $skin_care_solutions_custom_css .= 'text-align: Left !important;';
	    $skin_care_solutions_custom_css .= '}';
	}

	$skin_care_solutions_single_page_content_alignment = get_theme_mod('skin_care_solutions_single_page_content_alignment', 'left');
	if ($skin_care_solutions_single_page_content_alignment == 'left') {
	    $skin_care_solutions_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $skin_care_solutions_custom_css .= 'text-align: left !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_single_page_content_alignment == 'center') {
	    $skin_care_solutions_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $skin_care_solutions_custom_css .= 'text-align: center !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_single_page_content_alignment == 'right') {
	    $skin_care_solutions_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $skin_care_solutions_custom_css .= 'text-align: right !important;';
	    $skin_care_solutions_custom_css .= '}';
	}

	$skin_care_solutions_single_post_content_alignment = get_theme_mod('skin_care_solutions_single_post_content_alignment', 'left');
	if ($skin_care_solutions_single_post_content_alignment == 'left') {
	    $skin_care_solutions_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $skin_care_solutions_custom_css .= 'text-align: left !important;justify-content: left;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_single_post_content_alignment == 'center') {
	    $skin_care_solutions_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $skin_care_solutions_custom_css .= 'text-align: center !important;justify-content: center;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_single_post_content_alignment == 'right') {
	    $skin_care_solutions_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $skin_care_solutions_custom_css .= 'text-align: right !important;justify-content: right;';
	    $skin_care_solutions_custom_css .= '}';
	}

	$skin_care_solutions_menu_text_transform = get_theme_mod('skin_care_solutions_menu_text_transform', 'Capitalize');
	if ($skin_care_solutions_menu_text_transform == 'Capitalize') {
	    $skin_care_solutions_custom_css .= '.site-navigation .primary-menu > li a{';
	    $skin_care_solutions_custom_css .= 'text-transform: Capitalize !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_menu_text_transform == 'uppercase') {
	    $skin_care_solutions_custom_css .= '.site-navigation .primary-menu > li a{';
	    $skin_care_solutions_custom_css .= 'text-transform: uppercase !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_menu_text_transform == 'lowercase') {
	    $skin_care_solutions_custom_css .= '.site-navigation .primary-menu > li a{';
	    $skin_care_solutions_custom_css .= 'text-transform: lowercase !important;';
	    $skin_care_solutions_custom_css .= '}';
	}

	$skin_care_solutions_footer_widget_title_alignment = get_theme_mod('skin_care_solutions_footer_widget_title_alignment', 'left');
	if ($skin_care_solutions_footer_widget_title_alignment == 'left') {
	    $skin_care_solutions_custom_css .= 'h2.widget-title{';
	    $skin_care_solutions_custom_css .= 'text-align: left !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_footer_widget_title_alignment == 'center') {
	    $skin_care_solutions_custom_css .= 'h2.widget-title{';
	    $skin_care_solutions_custom_css .= 'text-align: center !important;';
	    $skin_care_solutions_custom_css .= '}';
	} else if ($skin_care_solutions_footer_widget_title_alignment == 'right') {
	    $skin_care_solutions_custom_css .= 'h2.widget-title{';
	    $skin_care_solutions_custom_css .= 'text-align: right !important;';
	    $skin_care_solutions_custom_css .= '}';
	}

    $skin_care_solutions_show_hide_related_product = get_theme_mod('skin_care_solutions_show_hide_related_product',true);
    if($skin_care_solutions_show_hide_related_product != true){
        $skin_care_solutions_custom_css .='.related.products{';
            $skin_care_solutions_custom_css .='display: none;';
        $skin_care_solutions_custom_css .='}';
    }

	/*-------------------- Global First Color -------------------*/

	$skin_care_solutions_global_color = get_theme_mod('skin_care_solutions_global_color', '#E69EB0'); // Add a fallback if the color isn't set

	if ($skin_care_solutions_global_color) {
		$skin_care_solutions_custom_css .= ':root {';
		$skin_care_solutions_custom_css .= '--global-color: ' . esc_attr($skin_care_solutions_global_color) . ';';
		$skin_care_solutions_custom_css .= '}';
	}	

	/*-------------------- Content Font -------------------*/

	$skin_care_solutions_content_typography_font = get_theme_mod('skin_care_solutions_content_typography_font', 'Inter'); // Add a fallback if the color isn't set

	if ($skin_care_solutions_content_typography_font) {
		$skin_care_solutions_custom_css .= ':root {';
		$skin_care_solutions_custom_css .= '--font-main: ' . esc_attr($skin_care_solutions_content_typography_font) . ';';
		$skin_care_solutions_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$skin_care_solutions_heading_typography_font = get_theme_mod('skin_care_solutions_heading_typography_font', 'PlayfairDisplay'); // Add a fallback if the color isn't set

	if ($skin_care_solutions_heading_typography_font) {
		$skin_care_solutions_custom_css .= ':root {';
		$skin_care_solutions_custom_css .= '--font-head: ' . esc_attr($skin_care_solutions_heading_typography_font) . ';';
		$skin_care_solutions_custom_css .= '}';
	}
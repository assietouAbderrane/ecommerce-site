<?php
/**
* Body Classes.
* @package Skin Care Solutions
*/
 
 if (!function_exists('skin_care_solutions_body_classes')) :

    function skin_care_solutions_body_classes($skin_care_solutions_classes) {
        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
        global $post;
    
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $skin_care_solutions_classes[] = 'hfeed';
        }
    
        // Adds a class of no-sidebar when there is no sidebar present.
        if (!is_active_sidebar('sidebar-1')) {
            $skin_care_solutions_classes[] = 'no-sidebar';
        }
    
        $skin_care_solutions_global_sidebar_layout = esc_html(get_theme_mod('skin_care_solutions_global_sidebar_layout', $skin_care_solutions_default['skin_care_solutions_global_sidebar_layout']));
        $skin_care_solutions_page_sidebar_layout = esc_html(get_theme_mod('skin_care_solutions_page_sidebar_layout', $skin_care_solutions_global_sidebar_layout));
        $skin_care_solutions_post_sidebar_layout = esc_html(get_theme_mod('skin_care_solutions_post_sidebar_layout', $skin_care_solutions_global_sidebar_layout));
    
        if (is_page()) {
            $skin_care_solutions_classes[] = $skin_care_solutions_page_sidebar_layout;
        } elseif (is_single()) {
            $skin_care_solutions_classes[] = $skin_care_solutions_post_sidebar_layout;
        } else {
            $skin_care_solutions_classes[] = $skin_care_solutions_global_sidebar_layout;
        }
    
        return $skin_care_solutions_classes;
    }
    
endif;

add_filter('body_class', 'skin_care_solutions_body_classes');
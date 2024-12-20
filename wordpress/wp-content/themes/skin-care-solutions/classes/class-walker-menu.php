<?php
/**
 * Custom page walker for this theme.
 *
 * @package Skin Care Solutions
 */

if (!class_exists('Skin_Care_Solutions_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Skin_Care_Solutions_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $skin_care_solutions_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $skin_care_solutions_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $skin_care_solutions_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$skin_care_solutions_output, $skin_care_solutions_depth = 0, $skin_care_solutions_args = array() ) {
            $skin_care_solutions_indent  = str_repeat( "\t", $skin_care_solutions_depth );
            $skin_care_solutions_output .= "$skin_care_solutions_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$skin_care_solutions_output, $page, $skin_care_solutions_depth = 0, $skin_care_solutions_args = array(), $current_page = 0)
        {

            if (isset($skin_care_solutions_args['item_spacing']) && 'preserve' === $skin_care_solutions_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($skin_care_solutions_depth) {
                $skin_care_solutions_indent = str_repeat($t, $skin_care_solutions_depth);
            } else {
                $skin_care_solutions_indent = '';
            }

            $skin_care_solutions_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($skin_care_solutions_args['pages_with_children'][$page->ID])) {
                $skin_care_solutions_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $skin_care_solutions_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $skin_care_solutions_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $skin_care_solutions_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $skin_care_solutions_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $skin_care_solutions_css_classes = implode(' ', apply_filters('page_css_class', $skin_care_solutions_css_class, $page, $skin_care_solutions_depth, $skin_care_solutions_args, $current_page));
            $skin_care_solutions_css_classes = $skin_care_solutions_css_classes ? ' class="' . esc_attr($skin_care_solutions_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'skin-care-solutions'), $page->ID);
            }

            $skin_care_solutions_args['link_before'] = empty($skin_care_solutions_args['link_before']) ? '' : $skin_care_solutions_args['link_before'];
            $skin_care_solutions_args['link_after'] = empty($skin_care_solutions_args['link_after']) ? '' : $skin_care_solutions_args['link_after'];

            $skin_care_solutions_atts = array();
            $skin_care_solutions_atts['href'] = get_permalink($page->ID);
            $skin_care_solutions_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $skin_care_solutions_atts = apply_filters('page_menu_link_attributes', $skin_care_solutions_atts, $page, $skin_care_solutions_depth, $skin_care_solutions_args, $current_page);

            $skin_care_solutions_attributes = '';
            foreach ($skin_care_solutions_atts as $attr => $skin_care_solutions_value) {
                if (!empty($skin_care_solutions_value)) {
                    $skin_care_solutions_value = ('href' === $attr) ? esc_url($skin_care_solutions_value) : esc_attr($skin_care_solutions_value);
                    $skin_care_solutions_attributes .= ' ' . $attr . '="' . $skin_care_solutions_value . '"';
                }
            }

            $skin_care_solutions_args['list_item_before'] = '';
            $skin_care_solutions_args['list_item_after'] = '';
            $skin_care_solutions_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($skin_care_solutions_args['show_toggles']) && true === $skin_care_solutions_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $skin_care_solutions_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($skin_care_solutions_args['show_sub_menu_icons']) && true === $skin_care_solutions_args['show_sub_menu_icons']) {
                if (isset($skin_care_solutions_args['pages_with_children'][$page->ID])) {
                    $skin_care_solutions_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($skin_care_solutions_args['show_toggles']) && true === $skin_care_solutions_args['show_toggles']) {
                if (isset($skin_care_solutions_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $skin_care_solutions_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'skin-care-solutions' ) . '</span>' . skin_care_solutions_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($skin_care_solutions_args['show_toggles']) && true === $skin_care_solutions_args['show_toggles']) {

                $skin_care_solutions_output .= $skin_care_solutions_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $skin_care_solutions_css_classes,
                        '<div class="submenu-wrapper">',
                        $skin_care_solutions_args['list_item_before'],
                        $skin_care_solutions_attributes,
                        $skin_care_solutions_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $skin_care_solutions_args['link_after'],
                        $skin_care_solutions_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $skin_care_solutions_output .= $skin_care_solutions_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $skin_care_solutions_css_classes,
                        $skin_care_solutions_args['list_item_before'],
                        $skin_care_solutions_attributes,
                        $skin_care_solutions_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $skin_care_solutions_args['icon_rennder'],
                        $skin_care_solutions_args['link_after'],
                        $skin_care_solutions_args['list_item_after']
                    );

            }

            if (!empty($skin_care_solutions_args['show_date'])) {
                if ('modified' === $skin_care_solutions_args['show_date']) {
                    $skin_care_solutions_time = $page->post_modified;
                } else {
                    $skin_care_solutions_time = $page->post_date;
                }

                $skin_care_solutions_date_format = empty($skin_care_solutions_args['date_format']) ? '' : $skin_care_solutions_args['date_format'];
                $skin_care_solutions_output .= ' ' . mysql2date($skin_care_solutions_date_format, $skin_care_solutions_time);
            }
        }
    }
}
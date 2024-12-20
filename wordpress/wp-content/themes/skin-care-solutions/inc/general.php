<?php

function skin_care_solutions_enqueue_fonts() {
    $skin_care_solutions_default_font_content = 'Inter';
    $skin_care_solutions_default_font_heading = 'PlayfairDisplay';

    $skin_care_solutions_font_content = esc_attr(get_theme_mod('skin_care_solutions_content_typography_font', $skin_care_solutions_default_font_content));
    $skin_care_solutions_font_heading = esc_attr(get_theme_mod('skin_care_solutions_heading_typography_font', $skin_care_solutions_default_font_heading));

    $skin_care_solutions_css = '';

    // Always enqueue main font
    $skin_care_solutions_css .= '
    :root {
        --font-main: ' . $skin_care_solutions_font_content . ', ' . (in_array($skin_care_solutions_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('skin-care-solutions-style-font-general', get_template_directory_uri() . '/fonts/' . $skin_care_solutions_font_content . '/font.css');

    // Always enqueue header font
    $skin_care_solutions_css .= '
    :root {
        --font-head: ' . $skin_care_solutions_font_heading . ', ' . (in_array($skin_care_solutions_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('skin-care-solutions-style-font-h', get_template_directory_uri() . '/fonts/' . $skin_care_solutions_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('skin-care-solutions-style-font-general', $skin_care_solutions_css);
}
add_action('wp_enqueue_scripts', 'skin_care_solutions_enqueue_fonts', 50);
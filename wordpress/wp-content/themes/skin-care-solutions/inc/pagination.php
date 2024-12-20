<?php
/**
 *
 * Pagination Functions
 *
 * @package Skin Care Solutions
 */

/**
 * Pagination for archive.
 */
function skin_care_solutions_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $skin_care_solutions_is_pagination_enabled = get_theme_mod( 'skin_care_solutions_enable_pagination', true );

    // Check if pagination is enabled
    if ( $skin_care_solutions_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $skin_care_solutions_pagination_type = get_theme_mod( 'skin_care_solutions_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $skin_care_solutions_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'skin-care-solutions' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'skin-care-solutions' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'skin-care-solutions' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'skin-care-solutions' ),
                    'next_text' => __( 'Next &raquo;', 'skin-care-solutions' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'skin-care-solutions' ),
                )
            );
        endif;
    }
}
add_action( 'skin_care_solutions_posts_pagination', 'skin_care_solutions_render_posts_pagination', 10 );
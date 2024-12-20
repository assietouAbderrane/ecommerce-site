<?php
/**
 * The sidebar containing the main widget area
 * @package Skin Care Solutions
 */

$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
$post_id = get_the_ID(); // Get the post ID.

if ( is_page() ) {
    $skin_care_solutions_global_sidebar_layout = esc_html( get_theme_mod( 'skin_care_solutions_page_sidebar_layout', $skin_care_solutions_default['skin_care_solutions_global_sidebar_layout'] ) );
} elseif ( is_single() ) {
    $skin_care_solutions_global_sidebar_layout = esc_html( get_theme_mod( 'skin_care_solutions_post_sidebar_layout', $skin_care_solutions_default['skin_care_solutions_global_sidebar_layout'] ) );
} else {
    $skin_care_solutions_global_sidebar_layout = esc_html( get_theme_mod( 'skin_care_solutions_global_sidebar_layout', $skin_care_solutions_default['skin_care_solutions_global_sidebar_layout'] ) );
}

// Hide the sidebar if 'no-sidebar' is selected.
if ( !is_active_sidebar('sidebar-1') || $skin_care_solutions_global_sidebar_layout === 'no-sidebar' ) {
    return;
}

$skin_care_solutions_sidebar_column_class = $skin_care_solutions_global_sidebar_layout === 'left-sidebar' ? 'column-order-1' : 'column-order-2';
?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $skin_care_solutions_sidebar_column_class ); ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>
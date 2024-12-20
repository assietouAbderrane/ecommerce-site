<?php
/**
 * Search Template for search form
 * @package Skin Care Solutions
 * @since 1.0.0
 */
?>
<form role="search" method="get" class="search-form search-form-custom" action="<?php echo esc_url(home_url('/')); ?>">

    <label>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search...', 'skin-care-solutions'); ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s">
    </label>
    <button type="submit" class="search-submit"><?php skin_care_solutions_the_theme_svg('search'); ?></button>
</form>
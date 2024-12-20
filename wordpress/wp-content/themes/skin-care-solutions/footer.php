<?php
/**
 * The template for displaying the footer
 * @package Skin Care Solutions
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked skin_care_solutions_content_offcanvas - 30
*/

do_action('skin_care_solutions_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked skin_care_solutions_footer_content_widget - 10
     * @hooked skin_care_solutions_footer_content_info - 20
    */

    do_action('skin_care_solutions_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
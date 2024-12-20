<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function skin_care_solutions_menu()
{
  add_theme_page(__('Omega Options', 'skin-care-solutions'), __('Omega Options', 'skin-care-solutions'), 'edit_theme_options', 'skin-care-solutions-theme', 'skin_care_solutions_page');
}
add_action('admin_menu', 'skin_care_solutions_menu');


// Add Getstart admin notice
function skin_care_solutions_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'skin_care_solutions_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_skin-care-solutions-theme' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e('Thank You for installing Skin Care Solutions Theme!', 'skin-care-solutions') ?> </h2>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=skin-care-solutions-theme' ) ); ?>"><?php esc_html_e('Omega Options', 'skin-care-solutions'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(SKIN_CARE_SOLUTIONS_LITE_DOCS_PRO); ?>" target="_blank"> <?php esc_html_e('Documentation', 'skin-care-solutions'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(SKIN_CARE_SOLUTIONS_BUY_NOW); ?>" target="_blank"> <?php esc_html_e('Upgrade to Pro', 'skin-care-solutions'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(SKIN_CARE_SOLUTIONS_DEMO_PRO); ?>" target="_blank"> <?php esc_html_e('Premium Demo', 'skin-care-solutions'); ?></a>
                </div>
                <p class="dismiss-link"><strong><a href="?skin_care_solutions_admin_notice=1"><?php esc_html_e( 'Dismiss', 'skin-care-solutions' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'skin_care_solutions_admin_notice' );

if ( ! function_exists( 'skin_care_solutions_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function skin_care_solutions_update_admin_notice() {
    if ( isset( $_GET['skin_care_solutions_admin_notice'] ) && $_GET['skin_care_solutions_admin_notice'] == '1' ) {
        update_option( 'skin_care_solutions_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'skin_care_solutions_update_admin_notice' );

// After Switch theme function
add_action( 'after_switch_theme', 'skin_care_solutions_getstart_setup_options' );
function skin_care_solutions_getstart_setup_options() {
    update_option( 'skin_care_solutions_admin_notice', false );
}


/**
 * Enqueue styles for the help page.
 */
function skin_care_solutions_admin_scripts($hook)
{
	wp_enqueue_style('skin-care-solutions-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'skin_care_solutions_admin_scripts');

/**
 * Add the theme page
 */
function skin_care_solutions_page(){
$skin_care_solutions_user = wp_get_current_user();
$skin_care_solutions_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="skin-care-solutions-panel header">
    <div class="skin-care-solutions-logo">
      <span></span>
      <h2><?php echo esc_html( $skin_care_solutions_theme ); ?></h2>
    </div>
    <p>
      <?php
            $skin_care_solutions_theme = wp_get_theme();
            echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $skin_care_solutions_theme->get( 'Description' ) ) ) );
          ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'skin-care-solutions'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="skin-care-solutions-panel">
        <div class="skin-care-solutions-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'skin-care-solutions'); ?></h3>
          </div>
          <a href="<?php echo esc_url( SKIN_CARE_SOLUTIONS_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'skin-care-solutions'); ?></a>
        </div>
      </div>
      <div class="skin-care-solutions-panel">
        <div class="skin-care-solutions-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'skin-care-solutions'); ?></h3>
          </div>
          <a href="<?php echo esc_url( SKIN_CARE_SOLUTIONS_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'skin-care-solutions'); ?></a>
        </div>
      </div>
       <div class="skin-care-solutions-panel"><div class="skin-care-solutions-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'skin-care-solutions'); ?></h3>
          </div>
          <a href="<?php echo esc_url( SKIN_CARE_SOLUTIONS_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'skin-care-solutions'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <p><strong><?php esc_html_e('Premium Features Include:', 'skin-care-solutions'); ?></strong></p>
        <ul>
          <li>
          <?php esc_html_e('One Click Demo Content Importer', 'skin-care-solutions'); ?>
          </li>
          <li>
          <?php esc_html_e('Woocommerce Plugin Compatibility', 'skin-care-solutions'); ?>
          </li>
          <li>
          <?php esc_html_e('Multiple Section for the templates', 'skin-care-solutions'); ?>            
          </li>
          <li>
          <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'skin-care-solutions'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( SKIN_CARE_SOLUTIONS_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'skin-care-solutions'); ?></a>
        </div>
      </div>
      <div class="skin-care-solutions-panel">
        <div class="skin-care-solutions-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'skin-care-solutions'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( SKIN_CARE_SOLUTIONS_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'skin-care-solutions'); ?></a>
        </div>
        <div class="skin-care-solutions-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'skin-care-solutions'); ?></h3>
          </div>
          <a href="<?php echo esc_url( SKIN_CARE_SOLUTIONS_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation.', 'skin-care-solutions'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
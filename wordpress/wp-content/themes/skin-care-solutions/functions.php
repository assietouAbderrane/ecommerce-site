<?php
/**
 * Skin Care Solutions functions and definitions
 * @package Skin Care Solutions
 */

if ( ! function_exists( 'skin_care_solutions_after_theme_support' ) ) :

	function skin_care_solutions_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

        load_theme_textdomain( 'skin-care-solutions', get_template_directory() . '/languages' ); 

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'skin_care_solutions_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

	}

endif;

add_action( 'after_setup_theme', 'skin_care_solutions_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function skin_care_solutions_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $skin_care_solutions_theme_version = wp_get_theme()->get( 'Version' );
	$skin_care_solutions_fonts_url = skin_care_solutions_fonts_url();
    if( $skin_care_solutions_fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'skin-care-solutions-google-fonts',
			wptt_get_webfont_url( $skin_care_solutions_fonts_url ),
			array(),
			$skin_care_solutions_theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/lib/custom/css/owl.carousel.min.css');
	wp_enqueue_style( 'skin-care-solutions-style', get_stylesheet_uri(), array(), $skin_care_solutions_theme_version );

	wp_enqueue_style( 'skin-care-solutions-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'skin-care-solutions-style',$skin_care_solutions_custom_css );

	$skin_care_solutions_css = '';

	if ( get_header_image() ) :

		$skin_care_solutions_css .=  '
			#center-header{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'skin-care-solutions-style', $skin_care_solutions_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'skin-care-solutions-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/lib/custom/js/owl.carousel.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$skin_care_solutions_posts_per_page = absint( get_option('posts_per_page') );
        $skin_care_solutions_c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $skin_care_solutions_posts_args = array(
            'posts_per_page'        => $skin_care_solutions_posts_per_page,
            'paged'                 => $skin_care_solutions_c_paged,
        );
        $skin_care_solutions_posts_qry = new WP_Query( $skin_care_solutions_posts_args );
        $max = $skin_care_solutions_posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $skin_care_solutions_c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
    $skin_care_solutions_pagination_layout = get_theme_mod( 'skin_care_solutions_pagination_layout',$skin_care_solutions_default['skin_care_solutions_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'skin_care_solutions_register_styles',200 );

function skin_care_solutions_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('skin-care-solutions-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'skin_care_solutions_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function skin_care_solutions_menus() {

	$skin_care_solutions_locations = array(
		'skin-care-solutions-primary-menu'  => esc_html__( 'Primary Menu', 'skin-care-solutions' ),
	);

	register_nav_menus( $skin_care_solutions_locations );
}

add_action( 'init', 'skin_care_solutions_menus' );

add_filter('loop_shop_columns', 'skin_care_solutions_loop_columns');
if (!function_exists('skin_care_solutions_loop_columns')) {
	function skin_care_solutions_loop_columns() {
		$skin_care_solutions_columns = get_theme_mod( 'skin_care_solutions_per_columns', 3 );
		return $skin_care_solutions_columns;
	}
}

add_filter( 'loop_shop_per_page', 'skin_care_solutions_per_page', 20 );
function skin_care_solutions_per_page( $skin_care_solutions_cols ) {
  	$skin_care_solutions_cols = get_theme_mod( 'skin_care_solutions_product_per_page', 9 );
	return $skin_care_solutions_cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/inc/TGM/tgm.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

if (! defined( 'SKIN_CARE_SOLUTIONS_DOCS_PRO' ) ){
define('SKIN_CARE_SOLUTIONS_DOCS_PRO',__('https://layout.omegathemes.com/steps/pro-skin-care-solutions/','skin-care-solutions'));
}
if (! defined( 'SKIN_CARE_SOLUTIONS_BUY_NOW' ) ){
define('SKIN_CARE_SOLUTIONS_BUY_NOW',__('https://www.omegathemes.com/products/skin-care-wordpress-theme','skin-care-solutions'));
}
if (! defined( 'SKIN_CARE_SOLUTIONS_SUPPORT_FREE' ) ){
define('SKIN_CARE_SOLUTIONS_SUPPORT_FREE',__('https://wordpress.org/support/theme/skin-care-solutions/','skin-care-solutions'));
}
if (! defined( 'SKIN_CARE_SOLUTIONS_REVIEW_FREE' ) ){
define('SKIN_CARE_SOLUTIONS_REVIEW_FREE',__('https://wordpress.org/support/theme/skin-care-solutions/reviews/#new-post/','skin-care-solutions'));
}
if (! defined( 'SKIN_CARE_SOLUTIONS_DEMO_PRO' ) ){
define('SKIN_CARE_SOLUTIONS_DEMO_PRO',__('https://layout.omegathemes.com/skin-care-solutions/','skin-care-solutions'));
}
if (! defined( 'SKIN_CARE_SOLUTIONS_LITE_DOCS_PRO' ) ){
define('SKIN_CARE_SOLUTIONS_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-skin-care-solutions/','skin-care-solutions'));
}

function skin_care_solutions_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'skin_care_solutions_remove_customize_register', 11 );

// Apply styles based on customizer settings

function skin_care_solutions_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $skin_care_solutions_footer_widget_background_color = get_theme_mod('skin_care_solutions_footer_widget_background_color');
        if ($skin_care_solutions_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($skin_care_solutions_footer_widget_background_color) . '; }';
        }

        $skin_care_solutions_footer_widget_background_image = get_theme_mod('skin_care_solutions_footer_widget_background_image');
        if ($skin_care_solutions_footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($skin_care_solutions_footer_widget_background_image) . '); }';
        }
        $skin_care_solutions_copyright_font_size = get_theme_mod('skin_care_solutions_copyright_font_size');
        if ($skin_care_solutions_copyright_font_size) {
            echo '.footer-copyright { font-size: ' . esc_attr($skin_care_solutions_copyright_font_size) . 'px;}';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'skin_care_solutions_customizer_css');


function skin_care_solutions_radio_sanitize(  $skin_care_solutions_input, $skin_care_solutions_setting  ) {
	$skin_care_solutions_input = sanitize_key( $skin_care_solutions_input );
	$skin_care_solutions_choices = $skin_care_solutions_setting->manager->get_control( $skin_care_solutions_setting->id )->choices;
	return ( array_key_exists( $skin_care_solutions_input, $skin_care_solutions_choices ) ? $skin_care_solutions_input : $skin_care_solutions_setting->default );
}
require get_template_directory() . '/inc/general.php';
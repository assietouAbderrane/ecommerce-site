<?php
/**
 * Custom Functions.
 *
 * @package Skin Care Solutions
 */

if( !function_exists( 'skin_care_solutions_fonts_url' ) ) :

    //Google Fonts URL
    function skin_care_solutions_fonts_url(){

        $skin_care_solutions_font_families = array(
            'Playfair+Display:ital,wght@0,400..900;1,400..900',
            'Inter:wght@100..900&display=swap',
        );

        $skin_care_solutions_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $skin_care_solutions_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($skin_care_solutions_fonts_url);

    }

endif;

if ( ! function_exists( 'skin_care_solutions_sub_menu_toggle_button' ) ) :

    function skin_care_solutions_sub_menu_toggle_button( $skin_care_solutions_args, $skin_care_solutions_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $skin_care_solutions_args->theme_location == 'skin-care-solutions-primary-menu' && isset( $skin_care_solutions_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $skin_care_solutions_args->before = '<div class="submenu-wrapper">';
            $skin_care_solutions_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $skin_care_solutions_item->classes ) ) {

                $skin_care_solutions_toggle_target_string = '.menu-item.menu-item-' . $skin_care_solutions_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $skin_care_solutions_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $skin_care_solutions_toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'skin-care-solutions' ) . '</span>' . skin_care_solutions_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $skin_care_solutions_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $skin_care_solutions_args->theme_location == 'skin-care-solutions-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $skin_care_solutions_item->classes ) ) {

                $skin_care_solutions_args->before = '<div class="link-icon-wrapper">';
                $skin_care_solutions_args->after  = skin_care_solutions_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $skin_care_solutions_args->before = '';
                $skin_care_solutions_args->after  = '';

            }

        }

        return $skin_care_solutions_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'skin_care_solutions_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'skin_care_solutions_the_theme_svg' ) ):
    
    function skin_care_solutions_the_theme_svg( $skin_care_solutions_svg_name, $skin_care_solutions_return = false ) {

        if( $skin_care_solutions_return ){

            return skin_care_solutions_get_theme_svg( $skin_care_solutions_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in skin_care_solutions_get_theme_svg();.

        }else{

            echo skin_care_solutions_get_theme_svg( $skin_care_solutions_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in skin_care_solutions_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'skin_care_solutions_get_theme_svg' ) ):

    function skin_care_solutions_get_theme_svg( $skin_care_solutions_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $skin_care_solutions_svg = wp_kses(
            Skin_Care_Solutions_SVG_Icons::get_svg( $skin_care_solutions_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $skin_care_solutions_svg ) {
            return false;
        }
        return $skin_care_solutions_svg;

    }

endif;

if( !function_exists( 'skin_care_solutions_post_category_list' ) ) :

    // Post Category List.
    function skin_care_solutions_post_category_list( $skin_care_solutions_select_cat = true ){

        $skin_care_solutions_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $skin_care_solutions_post_cat_cat_array = array();
        if( $skin_care_solutions_select_cat ){

            $skin_care_solutions_post_cat_cat_array[''] = esc_html__( '-- Select Category --','skin-care-solutions' );

        }

        foreach ( $skin_care_solutions_post_cat_lists as $skin_care_solutions_post_cat_list ) {

            $skin_care_solutions_post_cat_cat_array[$skin_care_solutions_post_cat_list->slug] = $skin_care_solutions_post_cat_list->name;

        }

        return $skin_care_solutions_post_cat_cat_array;
    }

endif;

if( !function_exists('skin_care_solutions_single_post_navigation') ):

    function skin_care_solutions_single_post_navigation(){

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
        $skin_care_solutions_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $skin_care_solutions_current_id = '';
        $article_wrap_class = '';
        global $post;
        $skin_care_solutions_current_id = $post->ID;
        if( $skin_care_solutions_twp_navigation_type == '' || $skin_care_solutions_twp_navigation_type == 'global-layout' ){
            $skin_care_solutions_twp_navigation_type = get_theme_mod('skin_care_solutions_twp_navigation_type', $skin_care_solutions_default['skin_care_solutions_twp_navigation_type']);
        }

        if( $skin_care_solutions_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $skin_care_solutions_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . skin_care_solutions_the_theme_svg('arrow-left',$skin_care_solutions_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'skin-care-solutions') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . skin_care_solutions_the_theme_svg('arrow-right',$skin_care_solutions_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'skin-care-solutions') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $skin_care_solutions_next_post = get_next_post();
                if( isset( $skin_care_solutions_next_post->ID ) ){

                    $skin_care_solutions_next_post_id = $skin_care_solutions_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $skin_care_solutions_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'skin_care_solutions_navigation_action','skin_care_solutions_single_post_navigation',30 );

if( !function_exists('skin_care_solutions_content_offcanvas') ):

    // Offcanvas Contents
    function skin_care_solutions_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'skin-care-solutions'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'skin-care-solutions'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('skin-care-solutions-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'skin-care-solutions-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Skin_Care_Solutions_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'skin_care_solutions_before_footer_content_action','skin_care_solutions_content_offcanvas',30 );

if( !function_exists('skin_care_solutions_footer_content_widget') ):

    function skin_care_solutions_footer_content_widget(){

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
        
            $skin_care_solutions_footer_column_layout = absint(get_theme_mod('skin_care_solutions_footer_column_layout', $skin_care_solutions_default['skin_care_solutions_footer_column_layout']));
            $skin_care_solutions_footer_sidebar_class = 12;
            if($skin_care_solutions_footer_column_layout == 2) {
                $skin_care_solutions_footer_sidebar_class = 6;
            }
            if($skin_care_solutions_footer_column_layout == 3) {
                $skin_care_solutions_footer_sidebar_class = 4;
            }
            ?>
           
            <?php if ( get_theme_mod('skin_care_solutions_display_footer', false) == true ) : ?>
                <div class="footer-widgetarea">
                    <div class="wrapper">
                        <div class="column-row">

                            <?php for ($i=0; $i < $skin_care_solutions_footer_column_layout; $i++) {
                                ?>
                                <div class="column <?php echo 'column-' . absint($skin_care_solutions_footer_sidebar_class); ?> column-sm-12">
                                    <?php dynamic_sidebar('skin-care-solutions-footer-widget-' . $i); ?>
                                </div>
                           <?php } ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php

    }

endif;

add_action( 'skin_care_solutions_footer_content_action','skin_care_solutions_footer_content_widget',10 );

if( !function_exists('skin_care_solutions_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function skin_care_solutions_footer_content_info(){

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $skin_care_solutions_footer_copyright_text = wp_kses_post( get_theme_mod( 'skin_care_solutions_footer_copyright_text', $skin_care_solutions_default['skin_care_solutions_footer_copyright_text'] ) );
                                    echo esc_html( $skin_care_solutions_footer_copyright_text );
                                    echo '<br>';
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'skin-care-solutions') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-skin-care-wordpress-theme') . '" title="' . esc_attr__('Skin Care Solutions', 'skin-care-solutions') . '" target="_blank"><span>' . esc_html__('Skin Care Solutions', 'skin-care-solutions') . '</span></a>' . esc_html__(' By ', 'skin-care-solutions') . '  <span>' . esc_html__('OMEGA ', 'skin-care-solutions') . '</span>';
                                    echo esc_html__('Powered by ', 'skin-care-solutions') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'skin-care-solutions') . '" target="_blank"><span>' . esc_html__('WordPress.', 'skin-care-solutions') . '</span></a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('skin_care_solutions_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $skin_care_solutions_to_the_top_text = get_theme_mod( 'skin_care_solutions_to_the_top_text', __( 'To the Top', 'skin-care-solutions' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $skin_care_solutions_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'skin_care_solutions_footer_content_action','skin_care_solutions_footer_content_info',20 );


if( !function_exists( 'skin_care_solutions_main_slider' ) ) :

    function skin_care_solutions_main_slider(){

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

        $skin_care_solutions_slider_section_title = esc_html( get_theme_mod( 'skin_care_solutions_slider_section_title',
        $skin_care_solutions_default['skin_care_solutions_slider_section_title'] ) );

        $skin_care_solutions_header_banner = get_theme_mod( 'skin_care_solutions_header_banner', $skin_care_solutions_default['skin_care_solutions_header_banner'] );
        $skin_care_solutions_header_banner_cat = get_theme_mod( 'skin_care_solutions_header_banner_cat' );

        if( $skin_care_solutions_header_banner ){

            $skin_care_solutions_rtl = '';
            if( is_rtl() ){
                $skin_care_solutions_rtl = 'dir="rtl"';
            }

            $skin_care_solutions_banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $skin_care_solutions_header_banner_cat ) ) );

            if( $skin_care_solutions_banner_query->have_posts() ): ?>

                <div class="theme-custom-block theme-banner-block">
                    <div class="swiper-container theme-main-carousel swiper-container" <?php echo $skin_care_solutions_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $skin_care_solutions_banner_query->have_posts() ):
                            $skin_care_solutions_banner_query->the_post();
                            $skin_care_solutions_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                        $default_image = get_template_directory_uri() . '/assets/images/slider.png'; // Replace with the actual path to your default image
                                        $skin_care_solutions_featured_image = isset( $skin_care_solutions_featured_image[0] ) ? $skin_care_solutions_featured_image[0] : $default_image;?>
                                <div class="swiper-slide main-carousel-item">                                 
                                    <div class="theme-article-post">
                                        <div class="entry-thumbnail">
                                            <div class="data-bg data-bg-large" data-background="<?php echo esc_url($skin_care_solutions_featured_image); ?>">
                                                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                            </div>
                                            <?php skin_care_solutions_post_format_icon(); ?>
                                        </div>
                                
                                        <div class="main-carousel-caption">
                                            <div class="post-content">
                                                <header class="entry-header">
                                                    <?php if( $skin_care_solutions_slider_section_title ){ ?>
                                                        <h3><?php echo esc_html( $skin_care_solutions_slider_section_title ); ?></h3>
                                                    <?php } ?>
                                                    <h2 class="entry-title entry-title-big">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                    </h2>
                                                </header>

                                                <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                    <?php echo esc_html__('Let’s Get Started', 'skin-care-solutions'); ?> <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6 .1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            <?php
            wp_reset_postdata();
            endif;
        }
    }

endif;


if( !function_exists( 'skin_care_solutions_product_section' ) ) :

    function skin_care_solutions_product_section(){ 

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();

        $skin_care_solutions_product_section_heading = esc_html( get_theme_mod( 'skin_care_solutions_product_section_heading',
        $skin_care_solutions_default['skin_care_solutions_product_section_heading'] ) );

        $skin_care_solutions_product_section_title = esc_html( get_theme_mod( 'skin_care_solutions_product_section_title',
        $skin_care_solutions_default['skin_care_solutions_product_section_title'] ) );

        $skin_care_solutions_catData = get_theme_mod('skin_care_solutions_featured_product_category','');
          
        if ( class_exists( 'WooCommerce' ) ) {
            $skin_care_solutions_args = array(
                'post_type' => 'product',
                'posts_per_page' => 100,
                'product_cat' => $skin_care_solutions_catData,
                'order' => 'ASC'
            ); ?>
        
            <div class="theme-product-block">
                <div class="wrapper">
                    <div class="shop-heading">
                        <?php if( $skin_care_solutions_product_section_heading ){ ?>
                            <h4><?php echo esc_html( $skin_care_solutions_product_section_heading ); ?></h4>
                        <?php } ?>
                        <?php if( $skin_care_solutions_product_section_title ){ ?>
                            <h3><?php echo esc_html( $skin_care_solutions_product_section_title ); ?></h3>
                        <?php } ?>
                    </div>
                    <div class="owl-carousel" role="listbox">
                        <?php 
                        $skin_care_solutions_loop = new WP_Query( $skin_care_solutions_args );
                        if ( $skin_care_solutions_loop->have_posts() ) :
                            while ( $skin_care_solutions_loop->have_posts() ) : $skin_care_solutions_loop->the_post(); 
                            global $product; 
                            $product_id = $product->get_id(); // Get product ID dynamically
                        ?>
                            <div class="grid-product">
                                <figure>
                                    <?php if (has_post_thumbnail( $skin_care_solutions_loop->post->ID )) echo get_the_post_thumbnail($skin_care_solutions_loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                                    <div class="product-cart">
                                        <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $skin_care_solutions_loop->post, $product );} ?>
                                    </div>
                                </figure>
                                <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $skin_care_solutions_loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></p>
                            </div>
                        <?php endwhile;
                         else: 
                            // Show fallback static products if no WooCommerce products found
                            ?>
                                <!-- Default 3 Products -->
                                <div class="grid-product">
                                <div class="image-box">
                                    <figure>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product1.png' ); ?>" alt="<?php echo esc_attr( __( 'Product Name 1', 'skin-care-solutions' ) ); ?>" />
                                    </figure>
                                </div>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Product Name 1', 'skin-care-solutions' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$70.00', 'skin-care-solutions' ); ?></p>
                                    <div class="product-cart">
                                        <a class="button" href="#"><?php echo esc_html( __( 'Add to cart', 'skin-care-solutions' ) ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-product">
                                <div class="image-box">
                                    <figure>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product2.png' ); ?>" alt="<?php echo esc_attr( __( 'Product Name 2', 'skin-care-solutions' ) ); ?>" />
                                    </figure>
                                </div>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Product Name 2', 'skin-care-solutions' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$70.00', 'skin-care-solutions' ); ?></p>
                                    <div class="product-cart">
                                        <a class="button" href="#"><?php echo esc_html( __( 'Add to cart', 'skin-care-solutions' ) ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-product">
                                <div class="image-box">
                                    <figure>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product3.png' ); ?>" alt="<?php echo esc_attr( __( 'Product Name 3', 'skin-care-solutions' ) ); ?>" />
                                    </figure>
                                </div>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Product Name 3', 'skin-care-solutions' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$70.00', 'skin-care-solutions' ); ?></p>
                                    <div class="product-cart">
                                        <a class="button" href="#"><?php echo esc_html( __( 'Add to cart', 'skin-care-solutions' ) ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-product">
                                <div class="image-box">
                                    <figure>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product4.png' ); ?>" alt="<?php echo esc_attr( __( 'Product Name 4', 'skin-care-solutions' ) ); ?>" />
                                    </figure>
                                </div>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Product Name 4', 'skin-care-solutions' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$70.00', 'skin-care-solutions' ); ?></p>
                                    <div class="product-cart">
                                        <a class="button" href="#"><?php echo esc_html( __( 'Add to cart', 'skin-care-solutions' ) ); ?></a>
                                    </div>
                                </div>
                            </div>

                            <?php 
                            endif; 
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php }

endif;

if (!function_exists('skin_care_solutions_post_format_icon')):

    // Post Format Icon.
    function skin_care_solutions_post_format_icon() {

        $skin_care_solutions_format = get_post_format(get_the_ID()) ?: 'standard';
        $skin_care_solutions_icon = '';
        $skin_care_solutions_title = '';
        if( $skin_care_solutions_format == 'video' ){
            $skin_care_solutions_icon = skin_care_solutions_get_theme_svg( 'video' );
            $skin_care_solutions_title = esc_html__('Video','skin-care-solutions');
        }elseif( $skin_care_solutions_format == 'audio' ){
            $skin_care_solutions_icon = skin_care_solutions_get_theme_svg( 'audio' );
            $skin_care_solutions_title = esc_html__('Audio','skin-care-solutions');
        }elseif( $skin_care_solutions_format == 'gallery' ){
            $skin_care_solutions_icon = skin_care_solutions_get_theme_svg( 'gallery' );
            $skin_care_solutions_title = esc_html__('Gallery','skin-care-solutions');
        }elseif( $skin_care_solutions_format == 'quote' ){
            $skin_care_solutions_icon = skin_care_solutions_get_theme_svg( 'quote' );
            $skin_care_solutions_title = esc_html__('Quote','skin-care-solutions');
        }elseif( $skin_care_solutions_format == 'image' ){
            $skin_care_solutions_icon = skin_care_solutions_get_theme_svg( 'image' );
            $skin_care_solutions_title = esc_html__('Image','skin-care-solutions');
        }
        
        if (!empty($skin_care_solutions_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo skin_care_solutions_svg_escape($skin_care_solutions_icon); ?></span>
                <?php if( $skin_care_solutions_title ){ echo '<span class="post-format-label">'.esc_html( $skin_care_solutions_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'skin_care_solutions_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $skin_care_solutions_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function skin_care_solutions_svg_escape( $skin_care_solutions_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $skin_care_solutions_svg = wp_kses(
            $skin_care_solutions_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $skin_care_solutions_svg ) {
            return false;
        }

        return $skin_care_solutions_svg;

    }

endif;

if( !function_exists( 'skin_care_solutions_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function skin_care_solutions_sanitize_sidebar_option_meta( $skin_care_solutions_input ){

        $skin_care_solutions_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $skin_care_solutions_input,$skin_care_solutions_metabox_options ) ){

            return $skin_care_solutions_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'skin_care_solutions_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function skin_care_solutions_sanitize_pagination_meta( $skin_care_solutions_input ){

        $skin_care_solutions_metabox_options = array( 'Center','Right','Left');
        if( in_array( $skin_care_solutions_input,$skin_care_solutions_metabox_options ) ){

            return $skin_care_solutions_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'skin_care_solutions_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function skin_care_solutions_sanitize_menu_transform( $skin_care_solutions_input ){

        $skin_care_solutions_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $skin_care_solutions_input,$skin_care_solutions_metabox_options ) ){

            return $skin_care_solutions_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'skin_care_solutions_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function skin_care_solutions_sanitize_page_content_alignment( $skin_care_solutions_input ){

        $skin_care_solutions_metabox_options = array( 'left','center','right');
        if( in_array( $skin_care_solutions_input,$skin_care_solutions_metabox_options ) ){

            return $skin_care_solutions_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'skin_care_solutions_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function skin_care_solutions_sanitize_footer_widget_title_alignment( $skin_care_solutions_input ){

        $skin_care_solutions_metabox_options = array( 'left','center','right');
        if( in_array( $skin_care_solutions_input,$skin_care_solutions_metabox_options ) ){

            return $skin_care_solutions_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'skin_care_solutions_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $skin_care_solutions_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function skin_care_solutions_sanitize_pagination_type( $skin_care_solutions_input ) {
        // Define valid options for the pagination type.
        $skin_care_solutions_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $skin_care_solutions_input, $skin_care_solutions_valid_options, true ) ) {
            return $skin_care_solutions_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('skin_care_solutions_sanitize_enable_pagination') ) :
    function skin_care_solutions_sanitize_enable_pagination( $skin_care_solutions_input ) {
        return (bool) $skin_care_solutions_input;
    }
endif;
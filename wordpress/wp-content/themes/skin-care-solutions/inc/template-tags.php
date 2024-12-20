<?php
/**
 * Custom Functions
 * @package Skin Care Solutions
 * @since 1.0.0
 */

if( !function_exists('skin_care_solutions_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $skin_care_solutions_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $skin_care_solutions_echo Echo or return the HTML.
     *
     * @return string $skin_care_solutions_html Compiled HTML based on our arguments.
     */
    function skin_care_solutions_site_logo( $skin_care_solutions_args = array(), $skin_care_solutions_echo = true ){
        $skin_care_solutions_logo = get_custom_logo();
        $skin_care_solutions_site_title = get_bloginfo('name');
        $skin_care_solutions_contents = '';
        $skin_care_solutions_classname = '';
        $skin_care_solutions_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $skin_care_solutions_args = wp_parse_args($skin_care_solutions_args, $skin_care_solutions_defaults);
        /**
         * Filters the arguments for `skin_care_solutions_site_logo()`.
         *
         * @param array $skin_care_solutions_args Parsed arguments.
         * @param array $skin_care_solutions_defaults Function's default arguments.
         */
        $skin_care_solutions_args = apply_filters('skin_care_solutions_site_logo_args', $skin_care_solutions_args, $skin_care_solutions_defaults);
        if ( has_custom_logo() ) {
            $skin_care_solutions_contents = sprintf($skin_care_solutions_args['logo'], $skin_care_solutions_logo, esc_html($skin_care_solutions_site_title));
            $skin_care_solutions_contents .= sprintf($skin_care_solutions_args['title'], esc_url( get_home_url(null, '/') ), esc_html($skin_care_solutions_site_title));
            $skin_care_solutions_classname = $skin_care_solutions_args['logo_class'];
        } else {
            $skin_care_solutions_contents = sprintf($skin_care_solutions_args['title'], esc_url( get_home_url(null, '/') ), esc_html($skin_care_solutions_site_title));
            $skin_care_solutions_classname = $skin_care_solutions_args['title_class'];
        }
        $skin_care_solutions_wrap = $skin_care_solutions_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $skin_care_solutions_wrap = 'home_wrap';
        $skin_care_solutions_html = sprintf($skin_care_solutions_args[$skin_care_solutions_wrap], $skin_care_solutions_classname, $skin_care_solutions_contents);
        /**
         * Filters the arguments for `skin_care_solutions_site_logo()`.
         *
         * @param string $skin_care_solutions_html Compiled html based on our arguments.
         * @param array $skin_care_solutions_args Parsed arguments.
         * @param string $skin_care_solutions_classname Class name based on current view, home or single.
         * @param string $skin_care_solutions_contents HTML for site title or logo.
         */
        $skin_care_solutions_html = apply_filters('skin_care_solutions_site_logo', $skin_care_solutions_html, $skin_care_solutions_args, $skin_care_solutions_classname, $skin_care_solutions_contents);
        if (!$skin_care_solutions_echo) {
            return $skin_care_solutions_html;
        }
        echo $skin_care_solutions_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('skin_care_solutions_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $skin_care_solutions_echo Echo or return the html.
     *
     * @return string $skin_care_solutions_html The HTML to display.
     */
    function skin_care_solutions_site_description($skin_care_solutions_echo = true){

        if ( get_theme_mod('skin_care_solutions_display_header_text', false) == true ) :
        $skin_care_solutions_description = get_bloginfo('description');
        if (!$skin_care_solutions_description) {
            return;
        }
        $skin_care_solutions_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $skin_care_solutions_html = sprintf($skin_care_solutions_wrapper, esc_html($skin_care_solutions_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $skin_care_solutions_html The HTML to display.
         * @param string $skin_care_solutions_description Site description via `bloginfo()`.
         * @param string $skin_care_solutions_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $skin_care_solutions_html = apply_filters('skin_care_solutions_site_description', $skin_care_solutions_html, $skin_care_solutions_description, $skin_care_solutions_wrapper);
        if (!$skin_care_solutions_echo) {
            return $skin_care_solutions_html;
        }
        echo $skin_care_solutions_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('skin_care_solutions_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function skin_care_solutions_posted_on( $skin_care_solutions_icon = true, $skin_care_solutions_animation_class = '' ){

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
        $skin_care_solutions_post_date = absint( get_theme_mod( 'skin_care_solutions_post_date',$skin_care_solutions_default['skin_care_solutions_post_date'] ) );

        if( $skin_care_solutions_post_date ){

            $skin_care_solutions_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $skin_care_solutions_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $skin_care_solutions_time_string = sprintf($skin_care_solutions_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $skin_care_solutions_year = get_the_date('Y');
            $skin_care_solutions_month = get_the_date('m');
            $skin_care_solutions_day = get_the_date('d');
            $skin_care_solutions_link = get_day_link($skin_care_solutions_year, $skin_care_solutions_month, $skin_care_solutions_day);

            $skin_care_solutions_posted_on = '<a href="' . esc_url($skin_care_solutions_link) . '" rel="bookmark">' . $skin_care_solutions_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $skin_care_solutions_animation_class ).'">';

            if( $skin_care_solutions_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                skin_care_solutions_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $skin_care_solutions_posted_on . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('skin_care_solutions_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function skin_care_solutions_posted_by( $skin_care_solutions_icon = true, $skin_care_solutions_animation_class = '' ){   

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
        $skin_care_solutions_post_author = absint( get_theme_mod( 'skin_care_solutions_post_author',$skin_care_solutions_default['skin_care_solutions_post_author'] ) );

        if( $skin_care_solutions_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $skin_care_solutions_animation_class ).'">';

            if( $skin_care_solutions_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                skin_care_solutions_the_theme_svg('user');
                echo '</span>';
                
            }

            $skin_care_solutions_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $skin_care_solutions_byline . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('skin_care_solutions_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function skin_care_solutions_posted_by_avatar( $skin_care_solutions_date = false ){

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
        $skin_care_solutions_post_author = absint( get_theme_mod( 'skin_care_solutions_post_author',$skin_care_solutions_default['skin_care_solutions_post_author'] ) );

        if( $skin_care_solutions_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $skin_care_solutions_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $skin_care_solutions_byline . '</div>';

            if( $skin_care_solutions_date ){
                skin_care_solutions_posted_on($skin_care_solutions_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('skin_care_solutions_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function skin_care_solutions_entry_footer( $skin_care_solutions_cats = true, $skin_care_solutions_tags = true, $skin_care_solutions_edits = true){   

        $skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
        $skin_care_solutions_post_category = absint( get_theme_mod( 'skin_care_solutions_post_category',$skin_care_solutions_default['skin_care_solutions_post_category'] ) );
        $skin_care_solutions_post_tags = absint( get_theme_mod( 'skin_care_solutions_post_tags',$skin_care_solutions_default['skin_care_solutions_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $skin_care_solutions_cats && $skin_care_solutions_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $skin_care_solutions_categories = get_the_category();
                if ($skin_care_solutions_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $skin_care_solutions_categories as $skin_care_solutions_category ){

                        $cat_name = $skin_care_solutions_category->name;
                        $cat_slug = $skin_care_solutions_category->slug;
                        $cat_url = get_category_link( $skin_care_solutions_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $cat_slug ); ?>" href="<?php echo esc_url( $cat_url ); ?>" rel="category tag"><?php echo esc_html( $cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $skin_care_solutions_tags && $skin_care_solutions_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $skin_care_solutions_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'skin-care-solutions'));
                if( $skin_care_solutions_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($skin_care_solutions_tags_list) . '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $skin_care_solutions_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'skin-care-solutions'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( !function_exists('skin_care_solutions_post_thumbnail') ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views. If no post thumbnail is available, a default image is used.
     */
    function skin_care_solutions_post_thumbnail($image_size = 'full'){

        if( post_password_required() || is_attachment() ){ return; }

        // Set the URL for your default image here (e.g. from your theme directory)
        $skin_care_solutions_default_image = get_template_directory_uri() . '/assets/images/slider.png'; // Update this path accordingly

        if ( is_singular() ) : ?>
                <?php the_post_thumbnail(); ?>
        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php

                $skin_care_solutions_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                $skin_care_solutions_featured_image = isset($skin_care_solutions_featured_image[0]) ? $skin_care_solutions_featured_image[0] : '';

                // Check if there's a featured image
                if ($skin_care_solutions_featured_image != '' ) {
                    // Display the featured image
                    the_post_thumbnail($image_size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                } else {
                    // No featured image, display the default image
                    echo '<img src="' . esc_url($skin_care_solutions_default_image) . '" alt="' . the_title_attribute(array('echo' => false)) . '" />';
                }
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

if( !function_exists('skin_care_solutions_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $skin_care_solutions_comment Comment data.
     *
     * @return bool
     */
    function skin_care_solutions_is_comment_by_post_author($skin_care_solutions_comment = null){

        if (is_object($skin_care_solutions_comment) && $skin_care_solutions_comment->user_id > 0) {
            $user = get_userdata($skin_care_solutions_comment->user_id);
            $post = get_post($skin_care_solutions_comment->comment_post_ID);
            if (!empty($user) && !empty($post)) {
                return $skin_care_solutions_comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('skin_care_solutions_breadcrumb') ) :

    /**
     * Skin Care Solutions Breadcrumb
     */
    function skin_care_solutions_breadcrumb($skin_care_solutions_comment = null){

        echo '<div class="entry-breadcrumb">';
        breadcrumb_trail();
        echo '</div>';

    }

endif;
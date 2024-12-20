<?php
/**
 * The main template file
 * @package Skin Care Solutions
 * @since 1.0.0
 */

get_header();
$skin_care_solutions_default = skin_care_solutions_get_default_theme_options();
$skin_care_solutions_global_sidebar_layout = esc_html( get_theme_mod( 'skin_care_solutions_global_sidebar_layout',$skin_care_solutions_default['skin_care_solutions_global_sidebar_layout'] ) );
$skin_care_solutions_sidebar_column_class = 'column-order-2';
if ($skin_care_solutions_global_sidebar_layout == 'right-sidebar') {
    $skin_care_solutions_sidebar_column_class = 'column-order-1';
}

global $skin_care_solutions_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo esc_attr($skin_care_solutions_sidebar_column_class) ; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            skin_care_solutions_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('skin_care_solutions_posts_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BLOG_REFLECTION
 */

get_header();
?>
    <div class="blog-area space-top space-extra-bottom">
        <div class="container page-layout right-sidebar">
            <div class="row gx-30 blog-page-with-sidebar">
                <div class="col-xxl-8 col-lg-7">
                    <div class="row  all-posts-wrapper">
                        <?php
                        if (have_posts()) :
                            if (is_home() && !is_front_page()) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                            <?php
                            endif;
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();
                                get_template_part('template-parts/content', get_post_type());
                            endwhile;
                        else :
                            get_template_part('template-parts/content', 'none');
                        endif;
                        ?>
                    </div>
                    <?php blog_reflection_post_pagination(); ?>
                </div>
                <?php if (is_active_sidebar('sidebar-1')) : ?>
                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                    <?php endif;
                endif;
                 ?>
            </div>
        </div>
    </div>
<?php
get_footer();
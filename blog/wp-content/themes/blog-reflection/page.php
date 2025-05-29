<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BLOG_REFLECTION
 */

get_header();
?>
    <div class="container">
    <?php do_action('blog_reflection_breadcrumb'); ?>
        <div class="row">
            <?php
            $page_layout_option = get_theme_mod('page_layout', 'rtl');
            ?>
            <?php if (is_active_sidebar('sidebar-1') && $page_layout_option == 'ltl') : ?>
                <?php if (is_active_sidebar('sidebar-1')) : ?>
                    <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($page_layout_option == 'no-sidebar'): ?>
            <div class="col-12">
                <?php else: ?>
                <div class="col-xxl-8 col-lg-7">
                    <?php endif; ?>
                    <main id="primary" class="site-main">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', 'page');
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                        endwhile; // End of the loop.
                        ?>
                    </main><!-- #main -->
                </div>
                <?php if (is_active_sidebar('sidebar-1') && $page_layout_option == 'rtl') : ?>
                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php
get_footer();
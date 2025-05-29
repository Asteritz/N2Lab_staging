<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blog-Reflection
 */

get_header();
?>
    <main id="primary" class="site-main">
        <div class="container">
            <section class="error-404 not-found">
                <!-- .page-header -->
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                    <header class="page-header">
                                        <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'blog-reflection'); ?></h1>
                                    </header>
                                <div class="space-bottom">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="error-wrap text-center">
                                                    <img src='<?php echo esc_url( get_template_directory_uri() . '/assets/images/error.svg' ); ?>' alt='Error Image'>

                                                    <h2 class="error-title"><?php esc_html_e('Oops!','blog-reflection'); ?></h2>
                                                    <h3 class="error-subtitle"><?php esc_html_e('Something went wrong','blog-reflection'); ?></h3>
                                                    <p>
                                                        <?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blog-reflection'); ?>
                                                    </p>
                                                    <div class="error-search-forms mb-0">
                                                    <?php get_search_form(); ?>

                                                    </div>
                                                    
                                                    <div class="btn-wrap justify-content-center mt-60">
                                                        <a class="btn" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Back to home','blog-reflection'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <!-- .page-content -->
            </section><!-- .error-404 -->
        </div>

    </main><!-- #main -->

<?php
get_footer();
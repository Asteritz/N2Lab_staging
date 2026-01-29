<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog-Reflection
 */

get_header();
?>
<div class="container">
<?php do_action( 'blog_reflection_breadcrumb' ); ?>
    <div class="row">
		<?php
		$archive_page_layout_option = get_theme_mod( 'archive_layout', 'rtl' );
		?>
		<?php if ( is_active_sidebar( 'sidebar-1' ) && $archive_page_layout_option == 'ltl' ) : ?>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $archive_page_layout_option == 'no-sidebar' ): ?>
        <div class="col-12">
			<?php else: ?>
            <div class="col-xxl-8 col-lg-7">
				<?php endif; ?>
                <main id="primary" class="site-main">
					<?php if ( have_posts() ) : ?>
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
                </main><!-- #main -->
            </div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) && $archive_page_layout_option == 'rtl' ) : ?>
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </div>
				<?php endif; ?>
			<?php endif; ?>
        </div>
    </div>
<?php
get_footer();
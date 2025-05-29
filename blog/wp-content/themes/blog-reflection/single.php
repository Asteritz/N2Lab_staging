<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blog_Reflection
 */

get_header();
?>
    <div class="container">
        <?php do_action('blog_reflection_breadcrumb'); ?>
    </div>
    <main id="primary" class="site-main blog-area space-extra-bottom">
        <div class="container page-layout right-sidebar">
            <div class="row gx-30 blog-page-with-sidebar">
                <?php
                $blog_reflection_single_page_layout_option = get_theme_mod('singe_page_layout', 'rtl');
                ?>
                <?php if (is_active_sidebar('sidebar-1') && $blog_reflection_single_page_layout_option == 'ltl') : ?>
                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($blog_reflection_single_page_layout_option == 'no-sidebar'): ?>
                <div class="col-12">
                    <?php else: ?>
                    <div class="col-xxl-8 col-lg-7">
                        <?php
                        endif;
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', get_post_type());
                            // Call the social media share function
                            blog_reflection_custom_social_media_share();
                            // Get the previous and next post objects
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();

                            the_post_navigation(
                                array(
                                    'prev_text' => ( $prev_post ? '<span class="nav-subtitle">' . esc_html__('Previous Post', 'blog-reflection') : '' ),
                                    'next_text' => ( $next_post ? '<span class="nav-subtitle">' . esc_html__('Next Post', 'blog-reflection')  : '' ),
                                )
                            );

                            
                            // Get the author ID of the current post
                            $blog_reflection_author_id = get_the_author_meta('ID');
                            // Get the author's avatar URL
                            $blog_reflection_author_avatar_url = get_avatar_url($blog_reflection_author_id);
                            $blog_reflection_author_name = get_the_author_meta('display_name');
                            // Fetch the current post's author ID
                            $author_id = get_the_author_meta('ID');
                            // Fetch the author's avatar URL
                            $author_avatar_url = get_avatar_url($author_id);
                            // Fetch the author's name
                            $author_name = get_the_author_meta('display_name', $author_id);
                            // Fetch the author's role
                            $author_role = implode(', ', get_user_role($author_id));
                            // Fetch the author's social media links (assuming these are saved as user meta)
                            $author_facebook = get_the_author_meta('facebook', $author_id);
                            $author_twitter = get_the_author_meta('twitter', $author_id);
                            $author_linkedin = get_the_author_meta('linkedin', $author_id);
                            $author_instagram = get_the_author_meta('instagram', $author_id);
                            ?>
                            <div class="blog-author">
                                <div class="author-img">
                                    <img src="<?php echo esc_url($author_avatar_url); ?>"
                                         alt="<?php echo esc_attr($author_name); ?>">
                                </div>
                                <div class="media-body">
                                    <h3 class="author-name"><?php echo esc_html($author_name); ?></h3>
                                    <span class="author-desig"><?php echo esc_html($author_role); ?><?php esc_html_e('Author', 'blog-reflection'); ?> </span>
                                    <p class="author-text">
                                        <?php
                                        // Fetch the author's biographical info
                                        $author_bio = get_the_author_meta('description');

                                        // Check if the bio exists, then display it
                                        if ( ! empty( $author_bio ) ) {
                                            echo esc_html( $author_bio );
                                        } else {
                                            // Fallback text if no biographical info is provided
                                            esc_html_e('Crafting innovative web solutions and seamless user experiences with clean, efficient code. Passionate about front-end and back-end development.', 'blog-reflection');
                                        }
                                        ?>
                                    </p>
                                    <div class="social-btn style3">
                                        <?php if ($author_facebook): ?>
                                            <a href="<?php echo esc_url($author_facebook); ?>" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a>
                                        <?php endif; ?>
                                        <?php if ($author_twitter): ?>
                                            <a href="<?php echo esc_url($author_twitter); ?>" target="_blank"><i
                                                        class="fab fa-twitter"></i></a>
                                        <?php endif; ?>
                                        <?php if ($author_linkedin): ?>
                                            <a href="<?php echo esc_url($author_linkedin); ?>" target="_blank"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                        <?php endif; ?>
                                        <?php if ($author_instagram): ?>
                                            <a href="<?php echo esc_url($author_instagram); ?>" target="_blank"><i
                                                        class="fab fa-instagram"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <?php if (is_active_sidebar('sidebar-1') && $blog_reflection_single_page_layout_option == 'rtl') : ?>
                        <?php if (is_active_sidebar('sidebar-1')) : ?>
                            <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
                                <?php dynamic_sidebar('sidebar-1'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
    </main><!-- #main -->
<?php
get_footer(); 
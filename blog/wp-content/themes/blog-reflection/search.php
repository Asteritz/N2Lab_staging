<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blog_Reflection
 */

get_header();
?>
<div class="container space-top space-extra-bottom arrow-wrap">
    <div class="row">
        <?php
        // Get the search page layout option from the theme settings
        $blog_reflection_search_page_layout_option = get_theme_mod('search_layout', 'rtl');
        ?>
        <!-- If the layout is set to 'ltl', display the sidebar on the left -->
        <?php if ($blog_reflection_search_page_layout_option == 'ltl') : ?>
            <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>

        <!-- Main content area -->
        <?php if ($blog_reflection_search_page_layout_option == 'no-sidebar'): ?>
            <div class="col-12">
        <?php else: ?>
            <div class="col-xxl-8 col-lg-7">
        <?php endif; ?>
                <main id="primary" class="site-main">
                    <?php if (have_posts()) : ?>
                        <header class="page-header">
                            <h2 class="post-title blog-title single-blog-title">
                                <?php
                                /* translators: %s: search query. */
                                printf(esc_html__('Search Results for: %s', 'blog-reflection'), '<span>' . get_search_query() . '</span>');
                                ?>
                            </h2>
                        </header><!-- .page-header -->
                        <div class="post-contents with-thum-img blog-content search-shadow">
                            <div class="post-meta-item blog-meta">
                                <?php
                                /* Start the Loop */
                                while (have_posts()) :
                                    the_post();
                                    ?>
                                    <div class="col-12 single-post-item">
                                        <article id="post-<?php the_ID(); ?>" class="post-details blog-single">
                                            <div class="post-img blog-img video-wrap2">
                                                <?php 
                                                    $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                                    if (get_the_post_thumbnail_url(null, 'large')) {
                                                        $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                                    } else {
                                                        $alt_text = 'No Image';
                                                    }
                                                    if (get_the_post_thumbnail_url()) {
                                                        // Get the post thumbnail ID
                                                        ?>
                                                        <img src="<?php the_post_thumbnail_url(null, 'large') ?>" alt="<?php echo esc_attr($alt_text); ?>">
                                                        <?php
                                                    } elseif (!get_the_post_thumbnail_url() && !is_singular()) {
                                                        ?>
                                                        <img class="w-100"
                                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/no-image.jpg'); ?>"
                                                            alt="<?php echo esc_attr($alt_text); ?>">
                                                        <?php
                                                    }?>
                                            </div>
                                            <div class="post-contents with-thum-img blog-content">
                                                

                                                <div class="post-meta-item blog-meta">
                                                    <?php
                                                    // Get the author ID of the current post
                                                    $blog_reflection_author_id = get_the_author_meta('ID');
                                                    // Get the author's avatar URL
                                                    $blog_reflection_author_avatar_url = get_avatar_url($blog_reflection_author_id);
                                                    $blog_reflection_author_name = get_the_author_meta('display_name');

                                                    ?>
                                                    <a href="<?php esc_url(get_author_posts_url($blog_reflection_author_id)); ?>" class="blog-meta-author"></a>
                                                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                                                       class="blog-meta-author">
                                                        <img src="<?php echo esc_url($blog_reflection_author_avatar_url); ?>"
                                                             alt="<?php echo esc_attr($blog_reflection_author_name); ?>">
                                                        <?php echo esc_html($blog_reflection_author_name); ?>
                                                    </a>

                                                    <a href="<?php the_permalink(); ?>"><i class="far fa-calendar-check"></i>
                                                        <?php echo get_the_date('M j Y'); ?></a>
                                                    <a href="<?php the_permalink(); ?>"><i class="far fa-comment"></i>
                                                        <?php
                                                        echo esc_html(get_comments_number());
                                                        if (get_comments_number() <= 1) {
                                                            esc_html_e(' Comment', 'blog-reflection');
                                                        } else {
                                                            esc_html_e(' Comments', 'blog-reflection');
                                                        }
                                                        ?>
                                                    </a>

                                                </div>



                                                <h2 class="post-title blog-title single-blog-title search-single">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <div class="post-content blog-text">
                                                    <p>
                                                        <?php the_excerpt(); ?>
                                                    </p>
                                                </div>
                                                <div class="row post-button tagcloud-row">
                                                    <div class="col-auto post-cat">
                                                        <?php
                                                        // Get the categories for the current post
                                                        $blog_reflection_categories = get_the_category();
                                                        $blog_reflection_separator = ' ';
                                                        $blog_reflection_output = '';

                                                        // Check if there are any categories
                                                        if (!empty($blog_reflection_categories)) {
                                                            ?>
                                                            <span class="title"><?php esc_html_e('Category :', 'blog-reflection'); ?></span>
                                                            <?php
                                                            $blog_reflection_count = 0; // Initialize a counter to limit the number of categories
                                                            foreach ($blog_reflection_categories as $blog_reflection_category) {
                                                                // Limit the output to 4 categories
                                                                if ($blog_reflection_count >= 4) {
                                                                    break;
                                                                }
                                                                $blog_reflection_post_catgory_link = get_category_link($blog_reflection_category->term_id);
                                                                $blog_reflection_post_category_name = $blog_reflection_category->name;
                                                                ?>
                                                                <a class="cat-blog-pad"
                                                                href="<?php echo esc_url($blog_reflection_post_catgory_link) ?>"><?php echo esc_html($blog_reflection_post_category_name) ?> </a>
                                                                <?php
                                                            
                                                                $blog_reflection_count++;
                                                            }
                                                            // Trim the trailing separator and echo the final output
                                                            echo esc_html(trim($blog_reflection_output, $blog_reflection_separator));
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="col-auto tagcloud">
                                                        <?php
                                                        // Fetch tags for the current post
                                                        $blog_reflection_post_tags = get_the_tags(get_the_ID());
                                                        // Check if tags were returned and are an array
                                                        if ($blog_reflection_post_tags && is_array($blog_reflection_post_tags)) {
                                                        ?>
                                                        <span class="title"><?php esc_html_e('Tags : ', 'blog-reflection'); ?></span>
                                                        <?php
                                                      

                                                            // Initialize counter
                                                            $blog_reflection_tag_count = 0;
                                                            // Loop through each tag and create a link, but limit to 5 tags
                                                            foreach ($blog_reflection_post_tags as $blog_reflection_post_tag) {
                                                                // Break the loop if the counter reaches 5
                                                                if ($blog_reflection_tag_count >= 6) {
                                                                    break;
                                                                }
                                                                ?>
                                                                <a href="<?php echo esc_url(get_tag_link($blog_reflection_post_tag->term_id)); ?>">
                                                                    <?php echo esc_html($blog_reflection_post_tag->name); ?>
                                                                </a>
                                                                <?php
                                                                // Increment the counter
                                                                $blog_reflection_tag_count++;
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <br>
                                    <?php
                                endwhile;
                                the_posts_navigation();
                                ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>
                </main>
            </div>

        <!-- If the layout is set to 'rtl', display the sidebar on the right -->
        <?php if ($blog_reflection_search_page_layout_option == 'rtl') : ?>
           
                <?php get_sidebar(); ?>
          
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
?>
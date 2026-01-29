<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Reflection
 */

?>
<div class="col-12 single-post-item remove-margin-top">
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-single blog-card'); ?>>
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
            }
            // Get the post format
            $blog_reflection_post_format = get_post_format();
            if ($blog_reflection_post_format == 'gallery') {
                // Assuming you have a custom field or a method to get the gallery image URL
                $gallery_url = get_post_meta(get_the_ID(), 'image_gallery', true); // Replace with your method
                $image_urls_array = explode(',', $gallery_url);
                foreach ($image_urls_array as $urlItem) {
                    ?>
                    <a href="<?php echo esc_url($urlItem); ?>" class="popup-image icon-btn">
                        <i class="far fa-images"></i>
                    </a>
                    <?php
                }
            } elseif ($blog_reflection_post_format == 'video') {
                // Assuming you have a custom field or a method to get the video URL
                $video_url = get_post_meta(get_the_ID(), 'video_url', true); // Replace with your method
                ?>
                <a href="<?php echo esc_url($video_url); ?>" class="play-btn style3 popup-video">
                    <i class="fas fa-play"></i>
                </a>
                <?php
            } elseif ($blog_reflection_post_format == 'image') {
                // Assuming you have a custom field or a method to get the image URL
                $image_url = get_post_meta(get_the_ID(), 'image_url', true); // Replace with your method
                ?>
                <a href="<?php echo esc_url($image_url); ?>" class="play-btn style3 popup-image">
                    <i class="far fa-image"></i>
                </a>
                <?php
            } elseif ($blog_reflection_post_format == 'audio') {
                // Assuming you have a custom field or a method to get the audio URL
                $audio_url = get_post_meta(get_the_ID(), 'audio_url', true); // Replace with your method
                ?>
                <a href="<?php echo esc_url($audio_url); ?>" class="play-btn style3 popup-audio">
                    <i class="fa fa-headphones"></i>
                </a>
                <?php
            } elseif ($blog_reflection_post_format == 'quote') {
                // Assuming you have a custom field or a method to get the audio URL
                $quote_url = get_post_meta(get_the_ID(), 'quote_url', true); // Replace with your method
                ?>
                <a href="<?php echo esc_url($quote_url); ?>" class="play-btn style3 popup-quote">
                    <i class="fas fa-quote-right"></i>
                </a>
                <?php
            } elseif ($blog_reflection_post_format == 'link') {
                // Assuming you have a custom field or a method to get the audio URL
                $link_url = get_post_meta(get_the_ID(), 'link_url', true); // Replace with your method
                ?>
                <a href="<?php echo esc_url($link_url); ?>" class="play-btn style3 popup-link">
                    <i class="fas fa-link"></i>
                </a>
                <?php
            } else {
                // Assuming you have a custom field or a method to get the default URL
                $default_url = get_permalink(); // Replace with your method if needed
                ?>
                <a href="<?php echo esc_url($default_url); ?>" class="play-btn style3 popup-default">

                </a>
                <?php
            }
            ?>
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

            <?php
            if (is_singular()) {
                ?>
                <h1 class="post-title blog-title single-blog-title">
                    <?php the_title(); ?>
                </h1>
                <div class="entry-content post-content blog-text">
                    <p>
                        <?php the_content(); ?>
                    </p>
                </div>
                <?php
            } else {
                ?>
                <h1 class="post-title blog-title single-blog-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>
                <div class="post-content blog-text">
                    <p>
                        <?php the_excerpt(); ?>
                    </p>
                </div>
                <?php
            }
            ?>
            <div class="post-button">
                <div class="post-cat">
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
                <div class="tagcloud">
                    <?php
                    // Fetch tags for the current post
                    $blog_reflection_post_tags = get_the_tags(get_the_ID());

                    // Check if tags were returned and are an array
                    if ($blog_reflection_post_tags && is_array($blog_reflection_post_tags)) {
                        ?>
                        <span class="title"><?php esc_html_e('Tags :', 'blog-reflection'); ?></span>
                        <?php
                        // Initialize counter
                        $blog_reflection_tag_count = 0;
                        // Loop through each tag and create a link, but limit to 5 tags
                        foreach ($blog_reflection_post_tags as $blog_reflection_post_tag) {
                            // Break the loop if the counter reaches 5
                            if ($blog_reflection_tag_count >= 4) {
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
    </article>
</div>
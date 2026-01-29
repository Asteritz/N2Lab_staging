<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Reflection
 */

?>
<!--  code  for content -->
<div class="col-12 single-post-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="post-single blog-card">
        <header class="entry-header">
            <div class="entry-meta">
                <?php
                // Get the author ID of the current post
                $author_id = get_the_author_meta('ID');
                // Get the author's avatar URL
                $author_avatar_url = get_avatar_url($author_id);
                ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
        <div class="post-img blog-img video-wrap2">
            <img src="<?php blog_reflection_post_thumbnail(); ?>" alt="<?php the_title(); ?>">
            <?php
            // Get the video URL from the post meta
            $video_url = get_post_meta(get_the_ID(), 'video_url', true);
            if ($video_url) {
                ?>
                <a href="<?php echo esc_url($video_url); ?>" class="play-btn style3 popup-video">
                    <i class="fas fa-play"></i>
                </a>
                <?php
            }
            ?>

        </div>
        <div class="post-contents with-thum-img blog-content">
            <div class="post-meta-item blog-meta">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="blog-meta-author">
                    <?php the_author(); ?>
                </a>
                <?php
                echo '<img src="' . esc_url($author_avatar_url) . '" alt="Author Image" class="author-image">';
                blog_reflection_posted_by();
                ?>
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                    <i class="far fa-calendar-check"></i><?php blog_reflection_posted_on(); ?>
                </a>
            </div>

            <h2 class="post-title blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <?php
            if (is_singular()) :
                the_title('<h2 class="entry-title">', '</h2>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            if ('post' === get_post_type()) :
            ?></a>
            <?php endif; ?>
            <div class="post-content blog-text">
                <p>.</p>
            </div>
            <div class="post-button">
                <div class="tagcloud">
                    <?php
                    // Get the tags associated with the current post
                    $blog_reflection_post_tags = get_the_tags();
                    // Check if tags exist for the current post
                    if ($blog_reflection_post_tags) {
                        // Loop through each tag and output the tag with a link to the tag archive page
                        foreach ($blog_reflection_post_tags as $blog_reflection_post_tag) {
                            $blog_reflection_post_tag_link = esc_url(get_tag_link($blog_reflection_post_tag->term_id));
                            $blog_reflection_post_tag_name = esc_html($blog_reflection_post_tag->name);
                            ?>
                            <span class="title"><?php esc_html_e('Tags:', 'blog-reflection'); ?><?php echo '<a href=' . esc_url($blog_reflection_post_tag_link) . '>' . esc_html($blog_reflection_post_tag_name) . '</a> '; ?></span>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="entry-content">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'blog-reflection'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'blog-reflection'),
                            'after' => '</div>',
                        )
                    );
                    ?>
                </div><!-- .entry-content -->
            </div>
        </div>
        <footer class="entry-footer">
            <?php blog_reflection_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
</div>

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Reflection
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h2 class="entry-title">', '</h2>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                blog_reflection_posted_on();
                blog_reflection_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php blog_reflection_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'blog-reflection'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'blog-reflection'),
                'after' => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php blog_reflection_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

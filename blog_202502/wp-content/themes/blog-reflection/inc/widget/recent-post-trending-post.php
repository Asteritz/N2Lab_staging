<?php
// Creating the widget
class Blogreflection_Recent_Trending_Post extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'blogreflection_recent_trending_post',

            // Widget name that will appear in UI
            __('Blogreflection: Recent & Trending Post', 'blog-reflection'),

            // Widget description
            array('description' => __('This widget is for recent and trending post bar.', 'blog-reflection'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        // Before and after widget arguments are defined by themes

            echo wp_kses_post($args['before_widget']);
            if (!empty($title)) {
                echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
            }
        ?>
        <div class="widget widget-recent-post">
            <div class="nav tab-menu recent-post-tab" role="tablist">
                <button class="tab-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one"
                        type="button" role="tab" aria-controls="nav-one" aria-selected="true">Recent Posts
                </button>
                <button class="tab-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button"
                        role="tab" aria-controls="nav-two" aria-selected="false">Trending Posts
                </button>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <div class="recent-post-wrap">

                    <?php
                        $sticky_posts = get_option('sticky_posts');
                        $blog_reflection_args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'posts_per_page' => 3,  // Changed to 2 posts
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'post__not_in'   => $sticky_posts,
                        );

                        $blog_reflection_query = new WP_Query($blog_reflection_args);

                        if ($blog_reflection_query->have_posts()) {
                            while ($blog_reflection_query->have_posts()) {
                                $blog_reflection_query->the_post();
                                $blog_reflection_recent_post_img = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                ?>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                            <img src="<?php echo esc_url($blog_reflection_recent_post_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title">
                                            <a class="text-inherit" href="<?php echo esc_url(get_the_permalink()); ?>">
                                                <?php echo esc_html(wp_trim_words(get_the_title(), 5)); ?>
                                            </a>
                                        </h4>
                                        <div class="recent-post-meta">
                                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                                <i class="far fa-calendar-check"></i> <?php echo esc_html(get_the_date()); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } 

                        // Restore original post data
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                    <div class="recent-post-wrap">
                        <?php
                        $sticky_posts = get_option('sticky_posts');
                        $blog_reflection_trending_args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'orderby'        => 'comment_count',
                            'order'          => 'DESC',
                            'post__not_in'   => $sticky_posts,
                        );

                        $blog_reflection_trending_query = new WP_Query($blog_reflection_trending_args);

                        if ($blog_reflection_trending_query->have_posts()) {
                            while ($blog_reflection_trending_query->have_posts()) {
                                $blog_reflection_trending_query->the_post();
                                $blog_reflection_trending_post_img = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                // Output your post content here
                                ?>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                        <img src="<?php echo esc_url($blog_reflection_trending_post_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">                           
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title">
                                            <a class="text-inherit" href="<?php echo esc_url(get_the_permalink()); ?>">
                                                <?php echo esc_attr(wp_trim_words(get_the_title(), 5)); ?>
                                            </a>
                                        </h4>
                                        <div class="recent-post-meta">
                                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                                <i class="far fa-calendar-check"></i> <?php echo esc_html(get_the_date()); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } 

                        // Restore original post data
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent & Trending Post', 'blog-reflection');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_textarea_field($new_instance['title']) : '';

        return $instance;
    }
} // Class Custom_Widget ends here
?>
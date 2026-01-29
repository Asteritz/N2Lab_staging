</div>
</div>
<!--   hero one  start  -->
<?php
$enable_disable_hero_one = get_theme_mod('enable_disable_hero_one', 'on');
if ($enable_disable_hero_one == 'on') {
        $hero_one_container_or_full_width = get_theme_mod('hero_one_container_or_full_width', 'off');
        if($hero_one_container_or_full_width == 'on'){
            $container_class_or_full_width_class = 'container';
        }else{
            $container_class_or_full_width_class = 'full-width';
        }
    ?>
<div class="blog-area space-extra-bottom">
    <div class="<?php echo esc_attr($container_class_or_full_width_class) ?> page-layout">
            <div class="owl-carousel owl-theme">
            <?php
                $hero_one_select_slider_post = get_theme_mod('hero_one_slider_repeater');
                if (!empty($hero_one_select_slider_post)) {
                    foreach ($hero_one_select_slider_post as $hero_one_slider_post) {
                        $blog_reflection_hero_one_slider_image_src = wp_get_attachment_image_src($hero_one_slider_post['select_hero_slider_post_image'], 'full');
                        $blog_reflection_hero_one_slider_post_image = get_the_post_thumbnail_url($hero_one_slider_post['select_hero_slider_post'], 'full') ?: get_template_directory_uri() . '/assets/images/slider-no-image.jpg';
                        $hero_one_repeter_slider_post_image = $blog_reflection_hero_one_slider_image_src ? $blog_reflection_hero_one_slider_image_src[0] : $blog_reflection_hero_one_slider_post_image;
                        $blog_reflection_hero_one_slider_post_args = [
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'p' => $hero_one_slider_post['select_hero_slider_post'],
                            'orderby' => 'title',
                            'order' => 'DESC',
                            'ignore_sticky_posts' => 1,
                        ];
                        $blog_reflection_hero_one_repeter_slider_post_query = new WP_Query($blog_reflection_hero_one_slider_post_args);

                        if (!$blog_reflection_hero_one_repeter_slider_post_query->have_posts()){
                            $blog_reflection_hero_one_slider_post_args = [
                                'posts_per_page' => 1, // Get only 1 post
                                'post_status'    => 'publish', // Only get published posts
                                'orderby'        => 'date', // Order by date (default)
                                'order'          => 'DESC', // Latest post first
                                'ignore_sticky_posts' => 1,
                            ];
                            $blog_reflection_hero_one_repeter_slider_post_query = new WP_Query($blog_reflection_hero_one_slider_post_args);
                        }

                        if ($blog_reflection_hero_one_repeter_slider_post_query->have_posts()) {
                            while ($blog_reflection_hero_one_repeter_slider_post_query->have_posts()) {
                                $blog_reflection_hero_one_repeter_slider_post_query->the_post();
                                $hero_one_slider_repeter_categories = get_the_category();
                                $hero_one_repeter_slider_category_name = !empty($hero_one_slider_repeter_categories) ? esc_html($hero_one_slider_repeter_categories[0]->name) : 'Uncategorized';
                                $hero_one_repeter_slider_category_link = !empty($hero_one_slider_repeter_categories) ? get_category_link($hero_one_slider_repeter_categories[0]->term_id) : '#';
                                $hero_one_repeter_slider_post_date = get_the_date('M d, Y');
                                $hero_one_repeter_slider_post_author = get_the_author();
                                $hero_one_repeter_slider_post_comment_number = get_comments_number();
                                $hero_one_repeter_slider_post_link = get_permalink();
                                $hero_one_repeter_slider_post_title = get_the_title();
                                $hero_one_repeter_slider_post_comment_permalink = '#';
                                if (have_comments()) {
                                    $hero_one_repeter_slider_comments = get_comments([
                                        'post_id' => get_the_ID(),
                                        'status' => 'approve',
                                        'number' => 1
                                    ]);

                                    if (!empty($hero_one_repeter_slider_comments)) {
                                        $hero_one_repeter_slider_post_comment_permalink = get_comment_link($hero_one_repeter_slider_comments[0]->comment_ID);
                                    }
                                }
                                ?>
                                <div class="item">
                                    <div class="col-12">
                                        <article class="post-single blog-card style-slider">
                                            <div class="post-img blog-img">
                                                <img class="hero-slider-img" src="<?php echo esc_url($hero_one_repeter_slider_post_image); ?>"
                                                                            alt="<?php the_title_attribute(); ?>">
                                                <div class="hero-one-slider-image-overlay"></div>
                                            </div>
                                            <div class="post-contents with-thum-img blog-content carousel-caption d-md-block">
                                                <a href="<?php echo esc_url($hero_one_repeter_slider_category_link); ?>"
                                                                        class="post-category"><?php echo esc_html($hero_one_repeter_slider_category_name); ?></a>
                                                <h1 class="post-title blog-title hover-not ">
                                                    <a class="text-decoration-none" href="<?php echo esc_url($hero_one_repeter_slider_post_link); ?>"><?php echo esc_html($hero_one_repeter_slider_post_title); ?></a>
                                                </h1>
                                                <div class="post-meta-item blog-meta">
                                                    <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                                                        <i class="far fa-clock"></i> <?php echo esc_html($hero_one_repeter_slider_post_date); ?>
                                                    </a>
                                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <i class="far fa-user"></i> <?php echo esc_html($hero_one_repeter_slider_post_author); ?>
                                                    </a>
                                                    <a href="<?php echo esc_url($hero_one_repeter_slider_post_comment_permalink); ?>">
                                                        <i class="far fa-comment"></i> <?php echo esc_html($hero_one_repeter_slider_post_comment_number); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>


                                <?php
                            }
                            wp_reset_postdata();
                        }
                    }
                }
                 else {
                    $blog_reflection_hero_one_default_slider_post_args = [
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'orderby' => 'title',
                        'order' => 'DESC'
                    ];
                    $hero_one_slider_post_image = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/slider-no-image.jpg';
                    $blog_reflection_hero_one_slider_post_query = new WP_Query($blog_reflection_hero_one_default_slider_post_args);
                    if ($blog_reflection_hero_one_slider_post_query->have_posts()) {
                        while ($blog_reflection_hero_one_slider_post_query->have_posts()) {
                            $blog_reflection_hero_one_slider_post_query->the_post();
                            $hero_one_slider_categories = get_the_category();
                            $hero_one_slider_category_name = !empty($hero_one_slider_categories) ? esc_html($hero_one_slider_categories[0]->name) : 'Uncategorized';
                            $hero_one_slider_category_link = !empty($hero_one_slider_categories) ? get_category_link($hero_one_slider_categories[0]->term_id) : '#';
                            $hero_one_slider_post_date = get_the_date('M d, Y');
                            $hero_one_slider_post_author = get_the_author();
                            $hero_one_slider_post_comment_number = get_comments_number();
                            $hero_oner_slider_post_link = get_permalink();
                            $hero_one_slider_post_title = get_the_title();

                            $hero_one_slider_post_comment_permalink = '#';
                            if (have_comments()) {
                                $hero_one_slider_comments = get_comments([
                                    'post_id' => get_the_ID(),
                                    'status' => 'approve',
                                    'number' => 1
                                ]);

                                if (!empty($hero_one_slider_comments)) {
                                    $hero_one_slider_post_comment_permalink = get_comment_link($hero_one_slider_comments[0]->comment_ID);
                                }
                            }
                            ?>
                            <div class="item">
                                <div class="col-12">
                                    <article class="post-single blog-card style-slider">
                                        <div class="post-img blog-img">
                                            <img class="hero-slider-img" src="<?php echo esc_url($hero_one_slider_post_image); ?>"
                                                alt="<?php the_title_attribute(); ?>">
                                            <div class="hero-one-slider-image-overlay"></div>
                                        </div>
                                        <div class="post-contents with-thum-img blog-content">
                                            <a href="<?php echo esc_url($hero_one_slider_category_link); ?>"
                                            class="post-category"><?php echo esc_html($hero_one_slider_category_name); ?></a>
                                            <h1 class="post-title blog-title hover-not">
                                                <a class="text-decoration-none" href="<?php echo esc_url($hero_oner_slider_post_link); ?>"><?php echo esc_html($hero_one_slider_post_title); ?></a>
                                            </h1>
                                            <div class="post-meta-item blog-meta">
                                                <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                                                    <i class="far fa-clock"></i> <?php echo esc_html($hero_one_slider_post_date); ?>
                                                </a>
                                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <i class="far fa-user"></i> <?php echo esc_html($hero_one_slider_post_author); ?>
                                                </a>
                                                <a href="<?php echo esc_url($hero_one_slider_post_comment_permalink); ?>">
                                                    <i class="far fa-comment"></i> <?php echo esc_html($hero_one_slider_post_comment_number); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
}
?>
<!-- home two hero section start  -->
    <?php
        $blog_reflection_enable_home_two_hero = get_theme_mod('enable_disable_hero_two', 'on');
        if ($blog_reflection_enable_home_two_hero == 'on') {
            ?>
        <div class="space-bottom overflow-hidden">
            <div class="container">
                <div class="row gx-20 space-top">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="row ">
                            <div class="col-md-12 col-lg-6 col-sm-12">
                                <div class="row">
                                    <?php
                                    $left_hero_posts_cat = get_theme_mod('select_left_hero_post_cat', array(1));
                                    $sticky_posts = get_option('sticky_posts');
                                    // Check if there are any selected posts
                                    if (!empty($left_hero_posts_cat)) {
                                        // Query the posts
                                        $post_count = 3;
                                        $left_hero_cat_or_latest_post = get_theme_mod('hero_two_left_post_choose_cat_or_latest', 'latest');
                                       if( $left_hero_cat_or_latest_post === 'latest'){
                                        $home_two_left_hero_args = [
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 3,
                                            'orderby' => 'date', // Order by the order of IDs in the array
                                            'order' => 'asc',
                                            'post__not_in' => $sticky_posts, // Exclude sticky posts
                                        ];
                                        $home_two_left_hero_query = new WP_Query($home_two_left_hero_args);
                                       }else{
                                        $home_two_left_hero_args = [
                                            'post_type' => 'post',
                                            'category__in' => $left_hero_posts_cat,
                                            'posts_per_page' => 3,
                                            'orderby' => 'date', // Order by the order of IDs in the array
                                            'order' => 'desc',
                                            'post__not_in' => $sticky_posts, // Exclude sticky posts
                                        ];
                                        $home_two_left_hero_query = new WP_Query($home_two_left_hero_args);
                                       }
                                        if ($home_two_left_hero_query->have_posts()) {
                                            $post_index = 0;
                                            while ($home_two_left_hero_query->have_posts()) {
                                                $home_two_left_hero_query->the_post();

                                                // Get the categories of the specific post
                                                $home_two_left_hero_categories = get_the_category();

                                                if (!empty($home_two_left_hero_categories)) {
                                                    // Assuming only one category per post
                                                    $home_two_left_hero_category = $home_two_left_hero_categories[0]; // Selecting the first category

                                                    // Get category link and color
                                                    $blog_reflection_home_two_left_hero_category_link = get_category_link($home_two_left_hero_category->term_id);
                                                    $home_two_left_hero_custom_field_cat_color = get_term_meta($home_two_left_hero_category->term_id, 'term_color', true);

                                                    // Example: Get random color for post tag
                                                    $tag_colors = array(
                                                        'style-dark-green',
                                                        'style-red',
                                                        'style-blue'
                                                    );
                                                    $random_color = $tag_colors[array_rand($tag_colors)];
                                                    $home_two_left_hero_post_categories = $home_two_left_hero_category->name;
                                                } else {
                                                    $blog_reflection_home_two_left_hero_category_link = '';
                                                    $home_two_left_hero_custom_field_cat_color = '';
                                                    $home_two_left_hero_post_categories = 'Uncategorized';
                                                }
                                                $post_index ++;

                                                // Determine the column class based on the number of posts and their position
                                                if ( $post_count <= 2 ) {
                                                    $col_class = 'col-12';
                                                } elseif ( $post_count == 3 && $post_index <= 2 ) {
                                                    $col_class = 'col-md-6';
                                                    if ( $col_class = 'col-md-6' ) {
                                                        $hero_img_hight = 'hero-img-hight';
                                                    }
                                                } elseif ( $post_count == 3 && $post_index == 3 ) {
                                                    $col_class = 'col-12';
                                                }
                                                $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                                if (get_the_post_thumbnail_url()) {
                                                    $blog_reflection_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                                } else {
                                                    $blog_reflection_image_alt_text = 'No Image';
                                                }
                                                // Get post image URL
                                                $home_two_hero_left_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                                ?>
                                                <div class="<?php echo esc_attr($col_class); ?> left-hero-post">
                                                    <div class="single-blog-post style2 styles1 mb-4">
                                                        <a href="<?php echo esc_url($blog_reflection_home_two_left_hero_category_link) ?>"
                                                           class="post-category <?php echo esc_attr($random_color) ; ?>"><?php echo esc_html($home_two_left_hero_post_categories) ?></a>
                                                        <div class="post-img">

                                                            <a href="<?php the_permalink() ?>" class="post-img">
                                                                <img class="<?php echo esc_attr($hero_img_hight); ?>"
                                                                     style="height: 250px;"
                                                                     src="<?php echo esc_url($home_two_hero_left_post_img); ?>"
                                                                     alt="<?php echo esc_attr($blog_reflection_image_alt_text) ?>">
                                                            </a>
                                                        </div>
                                                        <div class="post-wrap-details">
                                                        <span class="post-date">
                                                            <i class="far fa-clock"></i>
                                                            <?php echo esc_html(get_the_date('M d, Y')); ?>
                                                        </span>
                                                            <h1 class="post-title font-size-16 mt-10"><a
                                                                        class="text-white"
                                                                        href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        wp_reset_postdata(); // Reset Post Data
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-sm-12">
                                <div class="row">
                                    <?php
                                    $right_hero_posts_cat = get_theme_mod('select_right_hero_post_cat', array(1));
                                    $sticky_posts = get_option('sticky_posts');
                                    // Check if there are any selected posts
                                    
                                    if (!empty($right_hero_posts_cat)) {
                                        // Query the posts
                                        $post_count = 3;
                                        $right_hero_cat_or_latest_post = get_theme_mod('hero_two_right_post_choose_cat_or_latest', 'latest');
                                       if( $right_hero_cat_or_latest_post === 'latest'){
                                        $home_two_right_hero_args = [
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 3,
                                            'orderby' => 'date', // Order by the order of IDs in the array
                                            'order' => 'desc',
                                            'post__not_in' => $sticky_posts, // Exclude sticky posts
                                        ];
                                        $home_two_right_hero_query = new WP_Query($home_two_right_hero_args);
                                    }else{
                                        $home_two_right_hero_args = [
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'category__in' => $right_hero_posts_cat,
                                            'posts_per_page' => 3,
                                            'orderby' => 'date', // Order by the order of IDs in the array
                                            'order' => 'desc',
                                            'post__not_in' => $sticky_posts, // Exclude sticky posts
                                        ];
                                        $home_two_right_hero_query = new WP_Query($home_two_right_hero_args);
                                    }
                                        if ($home_two_right_hero_query->have_posts()) {
                                            $post_index = 0;
                                            while ($home_two_right_hero_query->have_posts()) {
                                                $home_two_right_hero_query->the_post();
                                                // Get the categories of the specific post
                                                $home_two_left_hero_categories = get_the_category();
                                                if (!empty($home_two_left_hero_categories)) {
                                                    // Assuming only one category per post
                                                    $home_two_left_hero_category = $home_two_left_hero_categories[0]; // Selecting the first category

                                                    // Get category link and color
                                                    $blog_reflection_home_two_left_hero_category_link = get_category_link($home_two_left_hero_category->term_id);
                                                    $home_two_left_hero_custom_field_cat_color = get_term_meta($home_two_left_hero_category->term_id, 'term_color', true);

                                                    // Example: Get random color for post tag
                                                    $tag_colors = array(
                                                        'style-dark-green',
                                                        'style-red',
                                                        'style-blue'
                                                    );
                                                    $random_color = $tag_colors[array_rand($tag_colors)];
                                                    $home_two_left_hero_post_categories = $home_two_left_hero_category->name;
                                                } else {
                                                    $blog_reflection_home_two_left_hero_category_link = '';
                                                    $home_two_left_hero_custom_field_cat_color = '';
                                                    $home_two_left_hero_post_categories = 'Uncategorized';
                                                }


                                                $post_index ++;
                                                // Determine the column class based on the number of posts and their position
                                                if ( $post_count <= 2 ) {
                                                    $col_class = 'col-12';
                                                } elseif ( $post_count == 3 && $post_index == 1 ) {
                                                    $col_class = 'col-12';

                                                } elseif ( $post_count == 3 && $post_index > 1 ) {
                                                    $col_class      = 'col-md-6 ';
                                                    $hero_img_hight = 'hero-img-hight';

                                                }
                                                $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                                if (get_the_post_thumbnail_url()) {
                                                    $blog_reflection_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                                } else {
                                                    $blog_reflection_image_alt_text = 'No Image';
                                                }
                                                // Get post image URL
                                                $home_two_hero_right_post_img = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                                ?>
                                                <div class="<?php echo esc_attr($col_class); ?> left-hero-post">
                                                    <div class="single-blog-post style2 left-side_content mb-4">
                                                        <a href="<?php echo esc_url($blog_reflection_home_two_left_hero_category_link) ?>"
                                                           class="post-category <?php echo esc_attr($random_color) ; ?>"><?php echo esc_html($home_two_left_hero_post_categories) ?></a>
                                                        <div class="post-img">

                                                            <a href="<?php the_permalink() ?>" class="post-img">
                                                                <img class="<?php echo esc_attr($hero_img_hight); ?>"
                                                                     style="height: 250px;"
                                                                     src="<?php echo esc_url($home_two_hero_right_post_img); ?>"
                                                                     alt="<?php echo esc_attr($blog_reflection_image_alt_text) ?>">
                                                            </a>
                                                        </div>
                                                        <div class="post-wrap-details">
                                                    <span class="post-date">
                                                        <i class="far fa-clock"></i>
                                                        <?php echo esc_html(get_the_date('M d, Y')); ?>
                                                    </span>
                                                            <h1 class="post-title font-size-16 mt-10"><a
                                                                        class="text-white"
                                                                        href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        wp_reset_postdata(); // Reset Post Data
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
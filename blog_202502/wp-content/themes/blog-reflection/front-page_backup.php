<?php
get_header();
//Set tag color array
$blog_reflection_tag_color = array('blue', 'red', 'purple', 'blue', 'pink');
?>
    <main id="primary" class="site-main">
    <div class="page-wrapper blog-reflection-front-page-wrapper">
        <!--==============================
            hero OneArea
        ==============================-->

<?php
$blog_reflection_enable_home_two = get_theme_mod('enable_news_main', 'on');
if ($blog_reflection_enable_home_two == 'on') {
    ?>
        <div class="home-wrapper hero-1" id="hero-one">
            <div class="container">
                <div class="row gy-20 gx-20">
                    <?php
                    $blog_reflection_hero_select = get_theme_mod('select_hero', 'one');
                    get_template_part('inc/hero/hero-' . $blog_reflection_hero_select);
                    ?>
                </div>
            </div>
        </div>
<?php
}
?>
<!--==============================
    Latest Blog Post Section Starts
==================================-->
        <?php
        $blog_reflection_enable_disable_latest_blog_post_options = get_theme_mod('enable_disable_latest_blog_post_options', 'on');
        if ($blog_reflection_enable_disable_latest_blog_post_options == 'on') {
            // Get the Latest Blog Post title
            $blog_reflection_latest_blog_post_section_title = get_theme_mod('latest_blog_post_section_title', 'Latest Blog Post');
            ?>
            <div class="space-bottom space-top overflow-hidden">
                <div class="container">
                    <div class="row align-items-center justify-content-sm-between justify-content-center">
                        <div class="col-auto latest-blog-post">
                            <!-- Display Latest Blog Post Title -->
                            <h2 class="sec-title latest-blog-post-title-color h3 text-center"><?php echo esc_html($blog_reflection_latest_blog_post_section_title); ?></h2>
                        </div>
                        <div class="col d-sm-block d-none">
                            <hr class="title-line latest-post">
                        </div>
                    </div>
                    <div class="row gx-20 gy-20">
                        <!-- Latest Blog Post Looping Code -->
                        <?php
                        // Get the selected category IDs for Latest Blog Post
                        $blog_reflection_select_latest_blog_post_category_id = get_theme_mod('select_latest_blog_post_category', 1); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_order = get_theme_mod('latest_blog_post_order', 'desc'); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_order_by = get_theme_mod('latest_blog_post_order_by', 'date'); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_display_control = get_theme_mod('latest_blog_post_display_post_number', '6'); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_get_latest_post_only = 'latest';
                        $blog_reflection_latest_blog_post_get_latest_post_only = get_theme_mod('latest_blog_post_cat_or_latest', 'latest');
                        // Get the category object
                        $blog_reflection_latest_blog_post_category = get_category($blog_reflection_select_latest_blog_post_category_id);
                        if (!$blog_reflection_latest_blog_post_category) {
                            $blog_reflection_latest_blog_post_category = get_category(1);
                        }
                        // Get the category slug
                        $blog_reflection_latest_blog_post_category_slug = $blog_reflection_latest_blog_post_category->slug;
                        if ($blog_reflection_latest_blog_post_get_latest_post_only == 'latest') {
                            // Define query arguments
                            $latest_blog_post_args_latest = array(
                                'post_status' => 'publish',
                                'post_type' => 'post',
                                'posts_per_page' => $blog_reflection_latest_blog_post_display_control,
                                'order' => $blog_reflection_latest_blog_post_order, // Use the selected order
                                'orderby' => $blog_reflection_latest_blog_post_order_by, // Use the selected order by
                                'ignore_sticky_posts' => 1,
                            );
                            $latest_blog_post_query = new WP_Query($latest_blog_post_args_latest);
                        } else {
                            // The Query for Trending Stories
                            $latest_blog_post_args_cat = array(
                                'post_type' => 'post',
                                'posts_per_page' => $blog_reflection_latest_blog_post_display_control,
                                'order' => $blog_reflection_latest_blog_post_order, // Use the selected order
                                'orderby' => $blog_reflection_latest_blog_post_order_by, // Use the selected order by
                                'category_name' => $blog_reflection_latest_blog_post_category_slug,
                                'ignore_sticky_posts' => 1,
                            );
                            $latest_blog_post_query = new WP_Query($latest_blog_post_args_cat);
                        }
                        if ($latest_blog_post_query->have_posts()) {
                            $tempCount = 1;
                            while ($latest_blog_post_query->have_posts()) {
                                $latest_blog_post_query->the_post();
                                // Get the categories of the specific post
                                $latest_blog_post_categories = get_the_category();

                                if (!empty($latest_blog_post_categories)) {
                                    // Assuming only one category per post
                                    $latest_blog_post_category = $latest_blog_post_categories[0]; // Selecting the first category
                                    // Get category link and color
                                    $blog_reflection_latest_blog_post_category_link = get_category_link($latest_blog_post_category->term_id);
                                    $latest_blog_post_custom_field_cat_color = get_term_meta($latest_blog_post_category->term_id, 'term_color', true);
                                    // Example: Get random color for post tag
                                    $latest_blog_post_tag_colors = array(
                                        'style-dark-green',
                                        'style-red',
                                        'style-blue'
                                    );
                                    $random_color = $latest_blog_post_tag_colors[array_rand($latest_blog_post_tag_colors)];
                                    $latest_blog_post_categories = $latest_blog_post_category->name;
                                } else {
                                    $blog_reflection_latest_blog_post_category_link = '';
                                    $latest_blog_post_custom_field_cat_color = '';
                                    $latest_blog_post_categories = '';
                                }
                                $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                if (get_the_post_thumbnail_url()) {
                                    $blog_reflection_latest_blog_post_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                } else {
                                    $blog_reflection_latest_blog_post_image_alt_text = 'No Image';
                                }
                                // Get post image URL
                                $latest_blog_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                if (strlen(get_the_title()) > 5) {
                                    // Trim to the first 5 characters and add ellipsis
                                    $blog_reflection_latest_blog_post_title = substr(get_the_title(), 0, 35) . '...';
                                } else {
                                    // If the title is less than or equal to 5 characters, display it as is
                                    $blog_reflection_latest_blog_post_title = get_the_title();
                                }

                                if (strlen(get_the_excerpt()) > 78) {
                                    // Trim to the first 5 characters and add ellipsis
                                    $blog_reflection_latest_blog_post_excerpt = substr(get_the_excerpt(), 0, 65) . '...';
                                } else {
                                    // If the title is less than or equal to 5 characters, display it as is
                                    $blog_reflection_latest_blog_post_excerpt = get_the_excerpt();
                                }

                                if ($tempCount <= 6) {
                                    ?>
                                    <div class="col-lg-4 mb-4 margin-3n">
                                        <div class="single-blog-post styles3 margin-nth">
                                            <a href="<?php echo esc_url($blog_reflection_latest_blog_post_category_link); ?>"
                                               class="post-category <?php echo esc_attr($random_color); ?>"
                                               style="background-color: <?php echo esc_attr($latest_blog_post_custom_field_cat_color) ?> ;"><?php echo esc_html($latest_blog_post_categories); ?></a>
                                            <div class="post-img">
                                                <!-- Display Post Thumbnail if available -->
                                                <img style="height:300px;"
                                                     src="<?php echo esc_url($latest_blog_post_img); ?>"
                                                     alt="<?php echo esc_attr($blog_reflection_latest_blog_post_image_alt_text); ?>">
                                                <!-- Overlay -->
                                                <div class="latest-blog-overlay"></div>
                                            </div>
                                            <div class="post-wrap-details">

                                                <div class="blog-post-meta blog-date mt-20 mb-n1">
                                                    <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>"
                                                       class="post-date">
                                                        <i class="far fa-clock"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
                                                    </a>
                                                    <a href="<?php the_permalink(); ?>" class="post-author">
                                                        <?php esc_html_e('By ', 'blog-reflection'); ?> <?php echo esc_html(get_the_author()); ?>
                                                        <!-- Added author name -->
                                                    </a>
                                                </div>
                                                <h2 class="post-title font-size-16">
                                                    <a class="latest-blog text-title " href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html($blog_reflection_latest_blog_post_title); ?>
                                                    </a>
                                                </h2>
                                                <p class="top-latest-post"><?php echo esc_html($blog_reflection_latest_blog_post_excerpt); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ++$tempCount;
                            }
                            wp_reset_postdata(); // Reset Post Data
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!--==============================
           Latest Blog Post Section Ends
        ==============================-->


        <!--===========================
            start tranding stories  
         =============================-->
        <?php
        $blog_reflection_trending_stories_options = get_theme_mod('enable_trending_stories', 'on');

        if ($blog_reflection_trending_stories_options == 'on') {
            // Get the home one trending stories title
            $blog_reflection_trending_stories_section_title = get_theme_mod('trending_stories_section_title', 'Today Trending Stories');
            ?>
            <div class="space-bottom overflow-hidden">
                <div class="container">
                    <div class="row align-items-center justify-content-sm-between justify-content-center">
                        <div class="col-auto trending-edit">
                            <!-- Display tranding stories Title -->
                            <h2 class="sec-title tranding-title-color h3 text-center">
                                <?php echo esc_html($blog_reflection_trending_stories_section_title); ?>
                            </h2>
                        </div>
                        <div class="col d-sm-block d-none">
                            <hr class="title-line today-trending-news">
                        </div>
                    </div>
                    <div class="row gx-20 global-carousel blog-reflaction-slider" data-slide-show="4"
                         data-lg-slide-show="3"
                         data-md-slide-show="2" data-dots="true" data-xl-dots="true" data-ml-dots="true"
                         data-lg-dots="true"
                         data-md-dots="true" data-sm-dots="true" data-xs-dots="true">
                        <!-- Trending Stories Looping Code -->
                        <?php
                        // Get the selected category IDs for trending stories
                        $blog_reflection_trending_stories_category_id = get_theme_mod('trending_stories_category', 1); // Default to category ID 1 if not set
                        $blog_reflection_trending_stories_post_order = get_theme_mod('trending_stories_post_order', 'asc'); // Default to category ID 1 if not set
                        $blog_reflection_trending_stories_post_order_by = get_theme_mod('tranding_stories_post_order_by', 'date'); // Default to category ID 1 if not set
                        $blog_reflection_trending_stories_post_display_control = get_theme_mod('tranding_stories_post_display_item_number', '5'); // Default to category ID 1 if not set
                        $blog_reflection_trending_stories_get_latest_post_only = 'latest';
                        $blog_reflection_trending_stories_get_latest_post_only = get_theme_mod('trending_stories_choose_cat_or_latest', 'latest');
                        // Get the category object
                        $blog_reflection_trending_stories_category = get_category($blog_reflection_trending_stories_category_id);
                        if (!$blog_reflection_trending_stories_category) {
                            $blog_reflection_trending_stories_category = get_category(1);
                        }
                        // Get the category slug
                        $blog_reflection_trending_stories_category_slug = $blog_reflection_trending_stories_category->slug;
                        if ($blog_reflection_trending_stories_get_latest_post_only == 'latest') {
                            // Define query arguments
                            $trending_stories_args_latest = array(
                                'post_status' => 'publish',
                                'post_type' => 'post',
                                'posts_per_page' => $blog_reflection_trending_stories_post_display_control,
                                'order' => $blog_reflection_trending_stories_post_order, // Use the selected order
                                'orderby' => $blog_reflection_trending_stories_post_order_by, // Use the selected order by

                            );
                            $trending_stories_query = new WP_Query($trending_stories_args_latest);
                        } else {
                            // The Query for Trending Stories
                            $trending_stories_args_cat = array(
                                'post_type' => 'post',
                                'posts_per_page' => $blog_reflection_trending_stories_post_display_control,
                                'order' => $blog_reflection_trending_stories_post_order, // Use the selected order
                                'orderby' => $blog_reflection_trending_stories_post_order_by, // Use the selected order by
                                'category_name' => $blog_reflection_trending_stories_category_slug,
                            );
                            $trending_stories_query = new WP_Query($trending_stories_args_cat);
                        }
                        if ($trending_stories_query->have_posts()) {
                            while ($trending_stories_query->have_posts()) {
                                $trending_stories_query->the_post();
                                // Get the categories of the specific post
                                $trending_stories_categories = get_the_category();

                                if (!empty($trending_stories_categories)) {
                                    // Assuming only one category per post
                                    $trending_stories_category = $trending_stories_categories[0]; // Selecting the first category
                                    // Get category link and color
                                    $blog_reflection_trending_stories_category_link = get_category_link($trending_stories_category->term_id);
                                    $trending_custom_field_cat_color = get_term_meta($trending_stories_category->term_id, 'term_color', true);
                                    // Example: Get random color for post tag
                                    $trending_tag_colors = array(
                                        'style-dark-green',
                                        'style-red',
                                        'style-blue'
                                    );
                                    $random_color = $trending_tag_colors[array_rand($trending_tag_colors)];
                                    $trending_stories_post_categories = $trending_stories_category->name;
                                } else {
                                    $blog_reflection_trending_stories_category_link = '';
                                    $trending_custom_field_cat_color = '';
                                    $trending_stories_post_categories = '';
                                }
                                $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                if (get_the_post_thumbnail_url()) {
                                    $blog_reflection_trending_stories_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                } else {
                                    $blog_reflection_trending_stories_image_alt_text = 'No Image';
                                }
                                // Get post image URL
                                $tranding_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';

                                if (strlen(get_the_title()) > 5) {
                                    // Trim to the first 5 characters and add ellipsis
                                    $blog_reflection_trending_post_title = substr(get_the_title(), 0, 25) . '...';
                                } else {
                                    // If the title is less than or equal to 5 characters, display it as is
                                    $blog_reflection_trending_post_title = get_the_title();
                                }

                                ?>
                                <div class="col-lg-3">
                                    <div class="single-blog-post style3">
                                        <a href="<?php echo esc_url($blog_reflection_trending_stories_category_link); ?>"
                                           class="post-category <?php echo esc_attr($random_color); ?>"
                                           style="background-color: <?php echo esc_attr($trending_custom_field_cat_color) ?> ;">
                                            <?php echo esc_html($trending_stories_post_categories); ?>
                                        </a>
                                        <div class="post-img">
                                            <!-- Display Post Thumbnail if available -->
                                            <img style="height:220px;" src="<?php echo esc_url($tranding_post_img); ?>"
                                                 alt="<?php echo esc_attr($blog_reflection_trending_stories_image_alt_text); ?>">
                                            <!-- Overlay -->
                                            <div class="trend-overlay"></div>
                                        </div>
                                        <div class="post-wrap-details">
                                            <h2 class="post-title font-size-16">
                                                <a class="text-title" href="<?php the_permalink(); ?>">
                                                    <?php echo esc_html($blog_reflection_trending_post_title); ?>
                                                </a>
                                            </h2>
                                            <div class="blog-post-meta blog-date mt-20 mb-n1">
                                                <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>"
                                                   class="post-date">
                                                    <i class="far fa-clock"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
                                                </a>
                                                <a href="<?php the_permalink(); ?>" class="post-author">
                                                    <i class="far fa-user"></i>
                                                    <?php echo esc_html(get_the_author()); ?> <!-- Added author name -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata(); // Reset Post Data
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <!--==============================
            Most Popular post Area
        ==============================-->
        <?php
        $blog_reflection_most_popular_post_options = get_theme_mod('enable_most_popular_post', 'on');
        if ($blog_reflection_most_popular_post_options == 'on') {
            $blog_reflection_most_popular_post_title = get_theme_mod('most_popular_post_title', 'Most Popular Post');
            ?>
            <div class="space overflow-hidden">
                <div class="container">
                    <div class="row align-items-center justify-content-sm-between justify-content-center">
                        <div class="col-auto most-popular">
                            <h2 class="sec-title h3 text-center"><?php echo esc_html($blog_reflection_most_popular_post_title); ?></h2>
                        </div>
                        <div class="col d-sm-block d-none">
                            <hr class="title-line most-popular-marker">
                        </div>
                        <div class="col-lg-auto">
                            <div class="sec-btn">
                                <div class="news-tab tab-menu1 nav nav-tabs">
                                    <?php
                                    $blog_reflection_popular_news_post_categorys = get_theme_mod('popular_post_categorys', array(1));
                                    $blog_reflection_popular_news_display_category_number = get_theme_mod('popular_post_category_number', '3');
                                    $blog_reflection_popular_news_category_ids = $blog_reflection_popular_news_post_categorys; // Replace with your category IDs
                                    $blog_reflection_popular_news_args = array('include' => $blog_reflection_popular_news_category_ids);
                                    $blog_reflection_popular_news_categories = get_categories($blog_reflection_popular_news_args);

                                    if(count($blog_reflection_popular_news_categories) == 0){
                                        // Get all categories
                                        $blog_reflection_random_categories = get_categories();
                                        // Check if there are at least two categories
                                        if ( count( $blog_reflection_random_categories ) >= 2 ) {
                                            $blog_reflection_popular_news_categories[0] = $blog_reflection_random_categories[0];
                                            $blog_reflection_popular_news_categories[1] = $blog_reflection_random_categories[1];
                                        }
                                        else{
                                            $blog_reflection_popular_news_categories = get_categories();
                                        }
                                    }


                                    // Check if categories exist
                                    if (!empty($blog_reflection_popular_news_categories)) {
                                        $count = 0;
                                        // Loop through each category
                                        foreach ($blog_reflection_popular_news_categories as $index => $blog_reflection_popular_news_category) {
                                            $tab_id = 'nav-tab' . ($index + 1); // Unique ID for each tab
                                            ?>
                                            <button class="nav-link <?php echo esc_html(($index === 0) ? 'active' : ''); ?> tab-btn"
                                                    id="<?php echo esc_attr($tab_id); ?>" data-bs-toggle="tab"
                                                    data-bs-target="#nav-tab-wrap<?php echo esc_html($index + 1); ?>">
                                                <?php echo esc_html($blog_reflection_popular_news_category->name); ?>
                                            </button>
                                            <?php
                                            $count++; // Increment the counter
                                            // Break the loop if we have displayed six categories
                                            if ($count >= $blog_reflection_popular_news_display_category_number) {
                                                break;
                                            }
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <?php
                        // Check if categories exist
                        if (!empty($blog_reflection_popular_news_categories)) {
                            $count = 0;
                            // Loop through each category
                            foreach ($blog_reflection_popular_news_categories as $index => $blog_reflection_popular_news_category) {
                                $tab_id = 'nav-tab-wrap' . ($index + 1);
                                ?>
                                <div class="tab-pane fade show <?php echo esc_html(($index === 0) ? 'active' : ''); ?>"
                                     id="<?php echo esc_attr($tab_id); ?>">
                                    <div class="row gx-60 gy-4">
                                        <div class="col-lg-12">
                                            <?php
                                            // Query the posts
                                            $blog_reflection_popular_news_post_args = [
                                                'post_type' => 'post',
                                                'posts_per_page' => 1,
                                                'cat' => $blog_reflection_popular_news_category->term_id,
                                            ];
                                            $blog_reflection_most_popular_news_category_link = get_category_link($blog_reflection_popular_news_category->term_id);
                                            $blog_reflection_popular_news_query = new WP_Query($blog_reflection_popular_news_post_args);

                                            if ($blog_reflection_popular_news_query->have_posts()) {
                                                while ($blog_reflection_popular_news_query->have_posts()) {
                                                    $blog_reflection_popular_news_query->the_post();
                                                    $blog_reflection_popular_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                                    // Get the post thumbnail ID
                                                    $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                                    if (get_the_post_thumbnail_url()) {
                                                        $blog_reflection_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                                    } else {
                                                        $blog_reflection_image_alt_text = 'No Image';
                                                    }
                                                    if (strlen(get_the_title()) > 5) {
                                                        // Trim to the first 5 characters and add ellipsis
                                                        $blog_reflection_most_popular_post_title = substr(get_the_title(), 0, 60) . '...';
                                                    } else {
                                                        // If the title is less than or equal to 5 characters, display it as is
                                                        $blog_reflection_most_popular_post_title = get_the_title();
                                                    }
                                                    ?>
                                                    <div class="single-blog-post">
                                                        <a href="<?php echo esc_url($blog_reflection_most_popular_news_category_link) ?>"
                                                           class="post-category style-light-blue style-underline-none"><?php echo esc_html($blog_reflection_popular_news_category->name); ?></a>
                                                        <div class="post-img most-popurlar-news-img">
                                                            <img class="most-popular-img"
                                                                 src="<?php echo esc_url($blog_reflection_popular_post_img) ?>"
                                                                 alt="<?php echo esc_attr($blog_reflection_image_alt_text) ?>">
                                                            <div class="blog-reflection-popular-overlay"></div>
                                                        </div>
                                                        <div class="post-wrap-details mb-lg-4">
                                                    <span class="post-date">
                                                        <i class="far fa-clock"></i>
                                                        <?php echo esc_html($blog_reflection_popular_news_category->name); ?>
                                                    </span>
                                                            <h2 class="post-title mt-10 fw-medium">
                                                                <a class="text-white style-underline-none"
                                                                   href="<?php the_permalink() ?>">
                                                                    <?php echo esc_html($blog_reflection_most_popular_post_title); ?>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            // Restore original post data
                                            wp_reset_postdata();
                                            ?>
                                        </div>
                                        <div class="col-lg-12">
                                            
                                                <div class="row">
                                                    <?php
                                                    // Query the posts
                                                    $blog_reflection_popular_news_post_args_2nd = [
                                                        'post_status' => 'publish',
                                                        'post_type' => 'post',
                                                        'posts_per_page' => 7,
                                                        'cat' => $blog_reflection_popular_news_category->term_id,
                                                    ];
                                                    $blog_reflection_most_popular_news_category_link = get_category_link($blog_reflection_popular_news_category->term_id);
                                                    $blog_reflection_popular_news_query = new WP_Query($blog_reflection_popular_news_post_args_2nd);
                                                    $i = 0;

                                                    if ($blog_reflection_popular_news_query->have_posts()) {
                                                        while ($blog_reflection_popular_news_query->have_posts()) {
                                                            $blog_reflection_popular_news_query->the_post();
                                                            $popular_news_post_img = (get_the_post_thumbnail_url(null, 'thumbnail')) ? get_the_post_thumbnail_url(null, 'thumbnail') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                                            // Get the post thumbnail ID
                                                            $popular_news_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                                            if (get_the_post_thumbnail_url()) {
                                                                $popular_news_image_alt_text = get_post_meta($popular_news_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                                            } else {
                                                                $popular_news_image_alt_text = 'No Image';
                                                            }
                                                            // Example: Get random color for post tag
                                                            $trending_tag_colors = array(
                                                                'style-dark-green',
                                                                'style-red',
                                                                'style-blue'
                                                            );
                                                            $random_color = $trending_tag_colors[array_rand($trending_tag_colors)];
                                                            if (strlen(get_the_title()) > 5) {
                                                                // Trim to the first 5 characters and add ellipsis
                                                                $blog_reflection_most_popular_bottom_post_title = substr(get_the_title(), 0, 20) . '...';
                                                            } else {
                                                                // If the title is less than or equal to 5 characters, display it as is
                                                                $blog_reflection_most_popular_bottom_post_title = get_the_title();
                                                            }
                                                            $i++;
                                                            if ($i != 1) {
                                                                ?>
                                                                <div class="col-lg-4">
                                                                    
                                                                    <div class="single-blog-post style-grid ">
                                                                        <a href="<?php echo esc_url($blog_reflection_most_popular_news_category_link) ?>"
                                                                           class="post-img img-rounded round-img1 style-underline-none">
                                                                            <img style="width:120px; height:120px;"
                                                                                 src="<?php echo esc_url($popular_news_post_img); ?>"
                                                                                 alt="<?php echo esc_attr($popular_news_image_alt_text) ?>">
                                                                            <div class="blog-reflection-popular-overlay"></div>
                                                                        </a>
                                                                        <div class="post-wrap-details">
                                                                            <a href="<?php echo esc_url($blog_reflection_most_popular_news_category_link) ?>"
                                                                               class="post-category cat-name <?php echo esc_attr($random_color); ?>"><?php echo esc_html($blog_reflection_popular_news_category->name); ?></a>
                                                                            <h6 class="post-title mt-10 fw-medium">
                                                                                <a class="text-title style-underline-none"
                                                                                   href="<?php echo esc_url(get_the_permalink()); ?>">
                                                                                    <?php echo esc_html($blog_reflection_most_popular_bottom_post_title); ?>
                                                                                </a>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
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
                                $count++; // Increment the counter
                                // Break the loop if we have displayed six categories
                                if ($count >= 6) {
                                    break;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <!-- ==============================
         Blog Slider Post Area star here
    ==============================-->
    <?php
    $home_one_blogs_post_options = get_theme_mod('enable_blog_post', 'on');
    if ($home_one_blogs_post_options == 'on') {
        // Get the blog post title
        $home_one_blogs_post_title = get_theme_mod('blog_post_title', 'Blog Post');
        ?>
        <div class="space-bottom space-top overflow-hidden">
            <div class="container-fluid p-0">
                <div class="row global-carousel gx-0" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2">
                    <?php
                    // Define query parameters
                    $blog_reflection_home_one_blogs_post_order = get_theme_mod('blog_post_order', 'desc');
                    $blog_reflection_home_one_blogs_post_order_by = get_theme_mod('blog_post_order_by', 'date');
                    $home_one_blog_post_args = array(
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'posts_per_page' => 15, // Adjust the number of posts
                        'orderby' => $blog_reflection_home_one_blogs_post_order_by,
                        'order' => $blog_reflection_home_one_blogs_post_order
                    );

                    // Fetch the posts
                    $home_one_blog_post_query = new WP_Query($home_one_blog_post_args);

                    // Check if there are posts
                    if ($home_one_blog_post_query->have_posts()) :
                        // Loop through the posts
                        while ($home_one_blog_post_query->have_posts()) : $home_one_blog_post_query->the_post();
                            // Get post categories
                            $home_one_blog_post_categories = get_the_category();
                            $home_one_blog_post_category_name = !empty($home_one_blog_post_categories) ? esc_html($home_one_blog_post_categories[0]->name) : 'Uncategorized';
                            $home_one_blog_post_category_link = !empty($home_one_blog_post_categories) ? get_category_link($home_one_blog_post_categories[0]->term_id) : '#';
                            // Get post date and author
                            $home_one_blog_post_date = get_the_date('M d, Y');
                            $home_one_blog_post_author = get_the_author();
                            $home_one_blog_post_link = get_permalink();
                            $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            if (get_the_post_thumbnail_url()) {
                                $blog_reflection_slider_blog_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                            } else {
                                $blog_reflection_slider_blog_image_alt_text = 'No Image';
                            }
                            $home_one_blog_post_image = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                            // Get random color of post tag
                            $home_one_blog_post_tag_colors = array(
                                'style-dark-green',
                                'style-red',
                                'style-blue'
                            ); // Example colors, adjust as needed
                            $home_one_blog_post_random_color = $home_one_blog_post_tag_colors[array_rand($home_one_blog_post_tag_colors)];
                            if (strlen(get_the_title()) > 5) {
                                // Trim to the first 5 characters and add ellipsis
                                $blog_reflection_blog_post_title = substr(get_the_title(), 0, 33) . '...';
                            } else {
                                // If the title is less than or equal to 5 characters, display it as is
                                $blog_reflection_blog_post_title = get_the_title();
                            }
                            ?>
                            <div class="col-xl-3">
                                <div class="single-blog-post">
                                    <a href="<?php echo esc_url($home_one_blog_post_category_link); ?>"
                                       class="post-category <?php echo esc_attr($home_one_blog_post_random_color); ?>"><?php echo esc_html($home_one_blog_post_category_name); ?></a>
                                    <div class="post-img img-radius-0">
                                        <img class="blogs-images-sizes"
                                             src="<?php echo esc_url($home_one_blog_post_image); ?>"
                                             alt="<?php echo esc_attr($blog_reflection_slider_blog_image_alt_text) ?>">
                                        <div class="blog-reflection-blog-overlay"></div>
                                    </div>
                                    <div class="post-wrap-details">
                                        <h2 class="post-title font-size-22 fw-medium">
                                            <a class="text-white"
                                               href="<?php echo esc_url($home_one_blog_post_link); ?>"><?php echo esc_html($blog_reflection_blog_post_title); ?></a>
                                        </h2>
                                        <div class="blog-post-meta mt-15 mb-n1 justify-content-start">
                                            <a href="<?php echo esc_url($home_one_blog_post_link); ?>"
                                               class="post-date font-size-16 text-white">
                                                <i class="far fa-clock"></i>
                                                <?php echo esc_html($home_one_blog_post_date); ?>
                                            </a>
                                            <a href="<?php echo esc_url($home_one_blog_post_link); ?>"
                                               class="post-author font-size-16 text-white">
                                                <i class="far fa-user"></i>
                                                by <?php echo esc_html($home_one_blog_post_author); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        // Restore original Post Data
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <!-- blog area ends here  -->

    <!--==============================
            Middle top Ad Area
    ==============================-->
    <?php
    $blog_reflection_middle_top_ads = get_theme_mod('middle_top_ad_enable', 'on');
    if ($blog_reflection_middle_top_ads == 'on') {
        ?>
        <div class="space-bottom ad-area text-center overflow-hidden">
            <div class="container ad-banner-wrap">
                <?php
                $blog_reflection_middle_top_ad_image = get_theme_mod('middle_top_ad_image', get_template_directory_uri() . '/assets/images/ads/ad2.jpg');
                $blog_reflection_middle_top_ad_url = get_theme_mod('middle_top_ad_image_url', 'https://www.mycodecare.com/blog-reflection'); ?>
                <a class="middle-top-ads-banner-edit"
                   href="<?php echo esc_url_raw($blog_reflection_middle_top_ad_url); ?>"
                   target="_blank"><img
                            src="<?php echo esc_url($blog_reflection_middle_top_ad_image); ?>"
                            alt="<?php the_title_attribute() ?>"></a>
            </div>
        </div>
        <?php
    }
    ?>

<!--==============================
   Trending Video Area Start
==============================-->
<?php
/**
* Hook - blog_reflection_video_post.
*/

if( true === get_theme_mod( 'enable_disable_video_section', false )){
    do_action( 'blog_reflection_video_post' );            
    }
?>

<!--==============================
   Trending Video Area Ends
==============================-->

    
<!--==============================
    What's New Area
==============================-->
    <?php
    $blog_reflection_home_one_what_new_options = get_theme_mod('home_one_enable_whats_new', 'on');

    if ($blog_reflection_home_one_what_new_options == 'on') {
        // Get the what new title
        $blog_reflection_home_one_what_new_title = get_theme_mod('home_one_whats_new_title', 'Whats New');
        ?>
        <div class="space-bottom space-top overflow-hidden">
            <div class="container">
                <div class="row gx-40 gy-50">
                    <?php
                    $what_new_sidebar_enable_disable = get_theme_mod('what_new_sidebar_enable_disable', 'on');
                    if ($what_new_sidebar_enable_disable == 'on') {
                        $what_new_post_class = 'col-lg-8';
                    } else {
                        $what_new_post_class = 'col-lg-12';
                    }
                    ?>
                    <div class="<?php echo esc_attr($what_new_post_class) ?>">
                        <div class="row align-items-center justify-content-sm-between justify-content-center">
                            <div class="col-auto">
                                <h2 class="sec-title h3 text-center what_new_title_color what-new-edit"><?php echo esc_html($blog_reflection_home_one_what_new_title); ?></h2>
                            </div>
                            <div class="col d-sm-block d-none">
                                <hr class="title-line">
                            </div>
                        </div>
                        <div class="row gy-20 gx-20">
                            <div class="col-12">
                                <!-- What New Looping Code -->
                                <?php
                                // Get the selected category ID for What's New
                                $blog_reflection_home_one_what_new_category_id = get_theme_mod('home_one_what_new_category', 1);
                                $blog_reflection_home_one_what_new_order = get_theme_mod('home_one_whats_new_order', 'desc');
                                $blog_reflection_home_one_what_new_order_by = get_theme_mod('one_whats_new_order_by', 'date');

                                // Convert category ID to slug
                                $blog_reflection_home_one_what_new_category_slug = '';
                                $blog_reflection_home_one_what_new_category = get_category($blog_reflection_home_one_what_new_category_id);

                                if (!$blog_reflection_home_one_what_new_category) {
                                    $blog_reflection_home_one_what_new_category = get_category(1);
                                }

                                if ($blog_reflection_home_one_what_new_category) {
                                    $blog_reflection_home_one_what_new_category_slug = $blog_reflection_home_one_what_new_category->slug;
                                }
                                // letest post code
                                $blog_reflection_home_one_what_new_get_latest_post_only = get_theme_mod('home_one_what_new_choose_cat_or_latest', 'latest');
                                if ($blog_reflection_home_one_what_new_get_latest_post_only == 'latest') {
                                    // Define query arguments
                                    $home_one_what_new_args = array(
                                        'post_status' => 'publish',
                                        'posts_per_page' => 1,
                                        'order' => 'desc', // Use the selected order
                                        'orderby' => 'date', // Use the selected order by
                                        'ignore_sticky_posts' => 1,

                                    );
                                    $home_one_what_new_query = new WP_Query($home_one_what_new_args);
                                } else {
                                    // The Query for what's new
                                    $home_one_what_new_args = array(
                                        'post_type' => 'post',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 1,
                                        'order' => $blog_reflection_home_one_what_new_order,
                                        'orderby' => $blog_reflection_home_one_what_new_order_by,
                                        'category_name' => $blog_reflection_home_one_what_new_category_slug,
                                        'ignore_sticky_posts' => 1,
                                    );
                                    $home_one_what_new_query = new WP_Query($home_one_what_new_args);
                                }

                                if ($home_one_what_new_query->have_posts()) {
                                    while ($home_one_what_new_query->have_posts()) {
                                        $home_one_what_new_query->the_post();
                                        // Get random color of post tag
                                        $home_one_what_new_tag_colors = array(
                                            'style-dark-green',
                                            'style-red',
                                            'style-blue'
                                        ); // Example colors, adjust as needed
                                        $random_color = $home_one_what_new_tag_colors[array_rand($home_one_what_new_tag_colors)];

                                        // Get category details by slug
                                        $home_one_what_new_post_category = get_category_by_slug($blog_reflection_home_one_what_new_category_slug);


                                        if ($home_one_what_new_post_category !== false) {
                                            $home_one_what_new_custom_field_cat_color = get_term_meta($home_one_what_new_post_category->term_id, 'term_color', true);
                                            $blog_reflection_home_one_what_new_category_link = get_category_link($home_one_what_new_post_category->term_id);
                                        } else {
                                            $home_one_what_new_custom_field_cat_color = '';
                                            $blog_reflection_home_one_what_new_category_link = '';
                                        }

                                        // Get post image URL
                                        $home_one_what_new_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                        $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        if (get_the_post_thumbnail_url()) {
                                            $blog_reflection_home_one_what_new_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                        } else {
                                            $blog_reflection_home_one_what_new_image_alt_text = 'No Image';
                                        }
                                        if (strlen(get_the_title()) > 5) {
                                            // Trim to the first 5 characters and add ellipsis
                                            $blog_reflection_what_new_post_title = substr(get_the_title(), 0, 50) . '...';
                                        } else {
                                            // If the title is less than or equal to 5 characters, display it as is
                                            $blog_reflection_what_new_post_title = get_the_title();
                                        }
                                        ?>
                                        <div class="single-blog-post">
                                            <a href="<?php echo esc_url($blog_reflection_home_one_what_new_category_link); ?>"
                                               class="post-category <?php echo esc_attr($blog_reflection_home_one_what_new_category_link); ?>"
                                               style="background-color: <?php echo esc_attr($home_one_what_new_custom_field_cat_color) ?> ;">
                                                <?php echo esc_html($home_one_what_new_post_category->name) ?>
                                            </a>
                                            <div class="post-img">
                                                <a href="<?php the_permalink(); ?>" class="post-img post-img-mobile">

                                                    <img class="what-new-img"
                                                         src="<?php echo esc_html($home_one_what_new_post_img); ?>"
                                                         alt="<?php echo esc_attr($blog_reflection_home_one_what_new_image_alt_text) ?>">
                                                    <div class="blog-reflection-what-new-overlay"></div>
                                                </a>
                                            </div>
                                            <div class="post-wrap-details mb-lg-4">
                                            <span class="post-date">
                                                <i class="far fa-clock"></i>
                                                <?php echo esc_html(get_the_date('F j, Y')); ?>
                                            </span>
                                                <h3 class=" post-title mt-10 fw-medium">
                                                    <a class="text-white" href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html($blog_reflection_what_new_post_title); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    wp_reset_postdata(); // Reset Post Data
                                }
                                ?>
                            </div>
                            <div class="col-md-12">
                                <div class="single-post-grid-wrap2">
                                    <div class="row">
                                        <!-- What New Looping Code -->
                                        <?php
                                        // Get the selected category ID for What's New
                                        $blog_reflection_what_new_post_category_id = get_theme_mod('home_one_what_new_post_category', 1);
                                        $blog_reflection_what_new_post_order = get_theme_mod('home_one_whats_new_post_order', 'desc');
                                        $blog_reflection_what_new_post_order_by = get_theme_mod('home_one_whats_new_post_order_by', 'title');

                                        // Convert category ID to slug
                                        $blog_reflection_what_new_post_category_slug = '';
                                        $blog_reflection_what_new_post_category = get_category($blog_reflection_what_new_post_category_id);
                                        if (!$blog_reflection_what_new_post_category) {
                                            $blog_reflection_what_new_post_category = get_category(1);
                                        }
                                        if ($blog_reflection_what_new_post_category) {
                                            $blog_reflection_what_new_post_category_slug = $blog_reflection_what_new_post_category->slug;
                                        }
                                        $blog_reflection_home_one_what_new_bottom_cat_or_latest = get_theme_mod('home_one_what_new_bottom_cat_or_latest', 'latest');
                                        if ($blog_reflection_home_one_what_new_bottom_cat_or_latest == 'latest') {
                                            // The Query for what's new
                                            $what_new_post_args = array(
                                                'post_status' => 'publish',
                                                'posts_per_page' => 6,
                                                'order' => 'desc',
                                                'orderby' => 'date',
                                                'ignore_sticky_posts' => 1,
                                            );
                                            $what_new_post_query = new WP_Query($what_new_post_args);
                                        } else {
                                            $what_new_post_args = array(
                                                'post_status' => 'publish',
                                                'post_type' => 'post',
                                                'posts_per_page' => 6,
                                                'order' => $blog_reflection_what_new_post_order,
                                                'orderby' => $blog_reflection_what_new_post_order_by,
                                                'category_name' => $blog_reflection_what_new_post_category_slug,
                                                'ignore_sticky_posts' => 1,
                                            );
                                            $what_new_post_query = new WP_Query($what_new_post_args);
                                        }

                                        if ($what_new_post_query->have_posts()) {
                                            while ($what_new_post_query->have_posts()) {
                                                $what_new_post_query->the_post();

                                                // Get the category of specific post
                                                $what_new_post_category = get_the_category();
                                                $blog_reflection_what_new_post_category_link = get_term_link($what_new_post_category[0]);

                                                // Get random color of post tag
                                                $tag_colors = array(
                                                    'style-dark-green',
                                                    'style-red',
                                                    'style-blue'
                                                ); // Example colors, adjust as needed
                                                $random_color = $tag_colors[array_rand($tag_colors)];
                                                // Get post image URL
                                                $what_new_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                                $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                                if (get_the_post_thumbnail_url()) {
                                                    $blog_reflection_what_new_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                                } else {
                                                    $blog_reflection_what_new_image_alt_text = 'No Image';
                                                }
                                                if (strlen(get_the_title()) > 5) {
                                                    // Trim to the first 5 characters and add ellipsis
                                                    $blog_reflection_what_new_bottom_post_title = substr(get_the_title(), 0, 20) . '...';
                                                } else {
                                                    // If the title is less than or equal to 5 characters, display it as is
                                                    $blog_reflection_what_new_bottom_post_title = get_the_title();
                                                }
                                                ?>
                                                <div class="col-md-6">
                                                    <div class="single-blog-post style-grid">
                                                        <a href="<?php the_permalink(); ?>"
                                                           class="post-img img-radius-5">
                                                            <img style="height:100px; width:150px"
                                                                 src="<?php echo esc_url($what_new_post_img); ?>"
                                                                 alt="<?php echo esc_attr($blog_reflection_what_new_image_alt_text); ?>">
                                                            <div class="blog-reflection-what-new-overlay"></div>
                                                        </a>
                                                        <div class="post-wrap-details">
                                                            <a href="<?php echo esc_url($blog_reflection_what_new_post_category_link) ?>"
                                                               class="post-category cat-name <?php echo esc_attr($random_color); ?> font-size-14"><?php echo esc_html($what_new_post_category[0]->name); ?></a>

                                                            <h6 class="post-title mt-10 fw-medium font-size-16"><a
                                                                        class="text-title"
                                                                        href="<?php the_permalink(); ?>"><?php echo esc_html($blog_reflection_what_new_bottom_post_title); ?></a>
                                                            </h6>
                                                            <a href="<?php the_permalink(); ?>"
                                                               class="post-date font-size-14 mt-10"><i
                                                                        class="far fa-clock"></i> <?php echo esc_html(get_the_date('F d, Y')); ?>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <?php
                                            }
                                            wp_reset_postdata(); // Reset Post Data
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $what_new_sidebar_enable_disable = get_theme_mod('what_new_sidebar_enable_disable', 'on');
                    if ($what_new_sidebar_enable_disable == 'on') {
                        ?>
                        <div class="col-lg-4">
                            <div class="row align-items-center justify-content-sm-between justify-content-center mt-80 wh-sidebar">
                                <?php if (is_active_sidebar('whatnew-sidebar')) : ?>
                                    <?php dynamic_sidebar('whatnew-sidebar'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
    <!--========================================
             slider Trend post Area
    =========================================-->
    <?php
    $trend_slider_post_enable_disable = get_theme_mod('enable_trend_slider_post', 'on');
    if ($trend_slider_post_enable_disable == 'on') {
        ?>
        <div class="space bg-body overflow-hidden">
            <div class="container">
                <div class="row gx-20 global-carousel top-news-slider" data-slide-show="3" data-lg-slide-show="2"
                     data-md-slide-show="2">
                    <?php
                    // Get the selected category ID for What new
                    $blog_reflection_trend_slider_post_category_id = get_theme_mod('trend_slider_post_category', 1);
                    $blog_reflection_trend_slider_post_order = get_theme_mod('blog_reflection_trend_slider_post_order', 'asc');
                    $blog_reflection_trend_slider_post_order_by = get_theme_mod('blog_reflection_trend_slider_post_order_by', 'date');
                    // Convert category IDs to slugs
                    $blog_reflection_trend_slider_post_category_slug = '';

                    $blog_reflection_trend_slider_post_category = get_category($blog_reflection_trend_slider_post_category_id);
                    if (!$blog_reflection_trend_slider_post_category) {
                        $blog_reflection_trend_slider_post_category = get_category(1);
                    }

                    if ($blog_reflection_trend_slider_post_category) {
                        $blog_reflection_trend_slider_post_category_slug = $blog_reflection_trend_slider_post_category->slug;
                    }
                    $blog_reflection_trend_slider_post_get_latest_post_only = get_theme_mod('trand_slider_post_choose_cat_or_latest', 'latest');
                    // Convert the array of slugs into a comma-separated string
                    if ($blog_reflection_trend_slider_post_get_latest_post_only === 'latest') {
                        // The Query for Hero Two
                        $trend_slider_post_args = array(
                            'post_status' => 'publish',
                            'posts_per_page' => 15,
                            'order' => 'desc',  // Use the selected order
                            'order_by' => 'date',  // Use the selected order by
                            'ignore_sticky_posts' => 1,
                        );
                        $trend_slider_post_query = new WP_Query($trend_slider_post_args);
                    } else {

                        // The Query for trend slider
                        $trend_slider_post_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 15,
                            'order' => $blog_reflection_trend_slider_post_order,  // Use the selected order
                            'order' => $blog_reflection_trend_slider_post_order_by,  // Use the selected order by
                            'category_name' => $blog_reflection_trend_slider_post_category_slug,
                            'ignore_sticky_posts' => 1,
                        );
                        $trend_slider_post_query = new WP_Query($trend_slider_post_args);
                    }

                    if ($trend_slider_post_query->have_posts()) {
                        while ($trend_slider_post_query->have_posts()) {
                            $trend_slider_post_query->the_post();
                            // Get the category of specific post
                            $trend_slider_post_category = get_the_category();
                            $blog_reflection_trend_slider_post_category_link = get_term_link($trend_slider_post_category[0]);
                            // Get random color of post tag
                            $tag_colors = array('style-dark-green', 'style-red', 'style-blue'); // Example colors, adjust as needed
                            $random_color = $tag_colors[array_rand($tag_colors)];

                            // Get post image URL
                            $trend_slider_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                            $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            if (get_the_post_thumbnail_url()) {
                                $blog_reflection_trend_slider_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                            } else {
                                $blog_reflection_trend_slider_image_alt_text = 'No Image';
                            }
                            if (strlen(get_the_title()) > 5) {
                                // Trim to the first 5 characters and add ellipsis
                                $blog_reflection_trend_slider_post_title = substr(get_the_title(), 0, 20) . '...';
                            } else {
                                // If the title is less than or equal to 5 characters, display it as is
                                $blog_reflection_trend_slider_post_title = get_the_title();
                            }
                            ?>
                            <div class="col-lg-3">
                                <div class="single-blog-post style-grid">
                                    <a href="<?php the_permalink(); ?>" class="post-img img-rounded height-width">
                                        <img src="<?php echo esc_html($trend_slider_post_img); ?>"
                                             alt="<?php echo esc_attr($blog_reflection_trend_slider_image_alt_text); ?>">
                                    </a>
                                    <div class="post-wrap-details">
                                        <a href="<?php echo esc_url($blog_reflection_trend_slider_post_category_link); ?>"
                                           class="post-category cat-name font-size-14 <?php echo esc_attr($random_color) ?>"><?php echo esc_html($trend_slider_post_category[0]->name); ?></a>
                                        <h6 class="post-title mt-10 fw-medium font-size-16"><a class="text-title"
                                                                                               href="<?php the_permalink(); ?>"><?php echo esc_html($blog_reflection_trend_slider_post_title); ?></a>
                                        </h6>
                                        <a href="<?php the_permalink(); ?>"
                                           class="post-author author-name-post font-size-14 mt-10"><?php echo esc_html('Post By: ', 'blog-reflection');
                                            the_author(); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <!--==============================
            Middle Ad Area
    ==============================-->
    <?php
    $blog_reflection_middle_ads_options = get_theme_mod('middle_ad_enable', 'on');

    if ($blog_reflection_middle_ads_options == 'on') {
        ?>
        <div class="space-top">
            <div class=" ad-area text-center overflow-hidden">
                <div class="container ad-banner-wrap">
                    <?php
                    $blog_reflection_middle_ad_image = get_theme_mod('middle_ad_image', get_template_directory_uri() . '/assets/images/ads/ad3.jpg');
                    $blog_reflection_middle_ad_url = get_theme_mod('middle_ad_image_url', 'https://www.mycodecare.com/blog-reflection'); ?>
                    <a class="middle-ads-banner-edit" href="<?php echo esc_url_raw($blog_reflection_middle_ad_url); ?>"
                       target="_blank"><img
                                src="<?php echo esc_url($blog_reflection_middle_ad_image); ?>"
                                alt="<?php the_title_attribute() ?>"></a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!--==============================
        Future Perfect Area Starts
    ==============================-->
    <?php
    $future_perfect_section_enable_disable = get_theme_mod('enable_disable_future_perfect_post', 'on');
    if ($future_perfect_section_enable_disable == 'on') {
        $future_perfect_section_title = get_theme_mod('future_perfect_post_section_title', 'Future Perfect Post');

        ?>
        <div class="space overflow-hidden">
            <div class="container">
                <div class="row gx-40 gy-30">
                    <?php
                    $future_perfect_side_bar_enable_disable = get_theme_mod('enable_disable_future_perfect_sidebar', 'on');
                    if ($future_perfect_side_bar_enable_disable == 'on') {
                        $future_perfect_class = 'col-xl-8';
                    } else {
                        $future_perfect_class = 'col-xl-12';
                    }
                    ?>
                    <div class="<?php echo esc_attr($future_perfect_class) ?>">
                        <div class="row align-items-center justify-content-sm-between justify-content-center">
                            <div class="col-auto">
                                <h2 class="sec-title h3 text-center future-perfect-post"><?php echo esc_html($future_perfect_section_title) ?> </h2>
                            </div>
                            <div class="col d-sm-block d-none">
                                <hr class="title-line">
                            </div>
                        </div>
                        <div class="single-post-grid-wrap mb-40 row">
                            <?php
                            $future_perfect_top_post_cat = get_theme_mod('select_future_perfect_main_post_cat', array(1));
                            $sticky_posts = get_option('sticky_posts');


                            $blog_reflection_future_main_post_choose_cat_or_latest = get_theme_mod('future_main_post_choose_cat_or_latest', 'latest');
                            if ($blog_reflection_future_main_post_choose_cat_or_latest == 'category') {
                                $blog_reflection_future_perfect_middle_category_id = get_theme_mod('select_future_perfect_main_post_cat', array(1));
                            }

                            $sticky_posts = get_option('sticky_posts');
                            if ($blog_reflection_future_main_post_choose_cat_or_latest == 'latest') {

                                $future_perfect_top_post_args = [
                                    'post_status' => 'publish',
                                    'posts_per_page' => 1,
                                    'post__not_in' => $sticky_posts, // Exclude sticky posts
                                ];
                                $blog_reflection_future_perfect_top_post_query = new WP_Query($future_perfect_top_post_args);
                            } else {
                                $future_perfect_top_post_args = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 1,
                                    'category__in' => $future_perfect_top_post_cat,
                                    'orderby' => 'post__in',
                                    'order' => 'ASC',
                                    'post__not_in' => $sticky_posts, // Exclude sticky posts
                                ];
                                $blog_reflection_future_perfect_top_post_query = new WP_Query($future_perfect_top_post_args);
                            }

                            // Fetch the posts
                            // Check if there are posts
                            if ($blog_reflection_future_perfect_top_post_query->have_posts()) :
                                // Loop through the posts
                                while ($blog_reflection_future_perfect_top_post_query->have_posts()) : $blog_reflection_future_perfect_top_post_query->the_post();
                                    $blog_reflection_future_perfect_top_post_categories = get_the_category();
                                    $blog_reflection_future_perfect_post_category_name = !empty($blog_reflection_future_perfect_top_post_categories) ? esc_html($blog_reflection_future_perfect_top_post_categories[0]->name) : 'Uncategorized';
                                    $blog_reflection_future_perfect_post_category_link = !empty($blog_reflection_future_perfect_top_post_categories) ? get_category_link($blog_reflection_future_perfect_top_post_categories[0]->term_id) : '#';
                                    $blog_reflection_future_perfect_top_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                    $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    if (get_the_post_thumbnail_url()) {
                                        $blog_reflection_future_perfect_top_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                    } else {
                                        $blog_reflection_future_perfect_top_image_alt_text = 'No Image';
                                    }
                                    if (strlen(get_the_title()) > 5) {
                                        // Trim to the first 5 characters and add ellipsis
                                        $blog_reflection_future_perfect_post_title = substr(get_the_title(), 0, 35) . '...';
                                    } else {
                                        // If the title is less than or equal to 5 characters, display it as is
                                        $blog_reflection_future_perfect_post_title = get_the_title();
                                    }
                                    ?>
                                    <div class="single-blog-post style-grid2">
                                        <a href="<?php the_permalink() ?>" class="post-img img-radius-5">
                                            <img style="height:250px; width:360px;"
                                                 src="<?php echo esc_url($blog_reflection_future_perfect_top_post_img) ?>"
                                                 alt="<?php echo esc_attr($blog_reflection_future_perfect_top_image_alt_text) ?>">
                                        </a>
                                        <div class="post-wrap-details">
                                            <a href="<?php echo esc_url($blog_reflection_future_perfect_post_category_link) ?>"
                                               class="post-category style-pink"><?php echo esc_html($blog_reflection_future_perfect_post_category_name) ?></a>
                                            <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))) ?>"
                                               class="post-date font-size-16 mt-15">
                                                <i class="far fa-clock"></i>
                                                <?php echo esc_html(get_the_date('M d, Y')) ?>
                                            </a>
                                            <h6 class="post-title mt-10 fw-medium font-size-20"><a class="text-title"
                                                                                                   href="<?php the_permalink(); ?>"><?php echo esc_html($blog_reflection_future_perfect_post_title) ?></a>
                                            </h6>
                                            <p class="post-content mt-15">
                                                <?php
                                                $excerpt = get_the_excerpt();
                                                $excerpt_words = explode(' ', $excerpt, 21);
                                                if (count($excerpt_words) > 20) {
                                                    array_pop($excerpt_words);
                                                    $excerpt = implode(' ', $excerpt_words) . '...';
                                                }
                                                echo esc_html($excerpt);
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                // Restore original Post Data
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                        <div class="row gy-40">
                            <?php
                            $blog_reflection_future_perfect_middle_post_cat = get_theme_mod('future_perfect_middle_post_choose_cat_or_latest', 'latest');
                            if ($blog_reflection_future_perfect_middle_post_cat == 'category') {
                                $blog_reflection_future_perfect_middle_category_id = get_theme_mod('future_perfect_middle_post_category', array(1));
                            }
                            $blog_reflection_future_perfect_middle_post_order = get_theme_mod('future_perfect_middle_post_order', 'DESC');
                            $blog_reflection_future_perfect_middle_post_order_by = get_theme_mod('future_perfect_middle_post_order_by', 'title');
                            $blog_reflection_future_perfect_display_middle_post_number = get_theme_mod('future_perfect_middle_display_post_number', 6);
                            $sticky_posts = get_option('sticky_posts');
                            if ($blog_reflection_future_perfect_middle_post_cat == 'latest') {
                                // The Query
                                $blog_reflection_future_perfect_middle_post_args = array(
                                    'post_status' => 'publish',
                                    'post_type' => 'post',
                                    'posts_per_page' => 6, // Only one post
                                    'orderby' => 'date', // Order by date
                                    'order' => 'desc', // Descending order (latest post first)
                                    'post__not_in' => $sticky_posts,
                                );
                                $blog_reflection_future_perfect_middle_post_query = new WP_Query($blog_reflection_future_perfect_middle_post_args);

                            } else {
                                // The Query
                                $blog_reflection_future_perfect_middle_post_args = array(
                                    'post_type' => 'post',
                                    'category__in' => $blog_reflection_future_perfect_middle_category_id, // Replace with your category ID
                                    'posts_per_page' => $blog_reflection_future_perfect_display_middle_post_number, // Number of posts to display
                                    'orderby' => $blog_reflection_future_perfect_middle_post_order_by, // Order by date
                                    'order' => $blog_reflection_future_perfect_middle_post_order, // Order descending
                                    'post__not_in' => $sticky_posts,
                                );
                                $blog_reflection_future_perfect_middle_post_query = new WP_Query($blog_reflection_future_perfect_middle_post_args);
                            }
                            // Execute the query
                            // The Loop
                            if ($blog_reflection_future_perfect_middle_post_query->have_posts()) {
                                while ($blog_reflection_future_perfect_middle_post_query->have_posts()) {
                                    $blog_reflection_future_perfect_middle_post_query->the_post();

                                    // Get the category color and link
                                    $blog_reflection_future_perfect_middle_post_category_name = get_the_category();
                                    if ($blog_reflection_future_perfect_middle_post_category_name !== false) {
                                        $blog_reflection_future_perfect_middle_custom_field_cat_color = get_term_meta($blog_reflection_future_perfect_middle_post_category_name[0]->term_id, 'term_color', true);
                                        $blog_reflection_future_perfect_middle_post_category_link = get_category_link($blog_reflection_future_perfect_middle_post_category_name[0]->term_id);
                                    }

                                    $blog_reflection_future_perfect_middle_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                    $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    if (get_the_post_thumbnail_url()) {
                                        $blog_reflection_future_perfect_middle_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                    } else {
                                        $blog_reflection_future_perfect_middle_image_alt_text = 'No Image';
                                    }
                                    $blog_reflection_future_perfect_middle_get_index_of_array = array_rand($blog_reflection_tag_color, 1);
                                    if (strlen(get_the_title()) > 5) {
                                        // Trim to the first 5 characters and add ellipsis
                                        $blog_reflection_future_perfect_middle_post_title = substr(get_the_title(), 0, 20) . '...';
                                    } else {
                                        // If the title is less than or equal to 5 characters, display it as is
                                        $blog_reflection_future_perfect_middle_post_title = get_the_title();
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="single-post-grid-wrap">

                                            <div class="single-blog-post style-grid">
                                                <a href="<?php the_permalink() ?>" class="post-img img-radius-5">
                                                    <img style="height:110px; width:110px;"
                                                         src="<?php echo esc_url($blog_reflection_future_perfect_middle_post_img) ?>"
                                                         alt="<?php echo esc_attr($blog_reflection_future_perfect_middle_image_alt_text) ?>">
                                                </a>
                                                <div class="post-wrap-details">
                                                    <a href="<?php echo esc_url($blog_reflection_future_perfect_middle_post_category_link) ?>"
                                                       class="post-category cat-name font-size-14 style-<?php echo esc_attr($blog_reflection_tag_color[$blog_reflection_future_perfect_middle_get_index_of_array]); ?>"
                                                       style="background-color: <?php echo esc_attr($blog_reflection_future_perfect_middle_custom_field_cat_color) ?>"><?php echo esc_html($blog_reflection_future_perfect_middle_post_category_name[0]->name) ?></a>
                                                    <h6 class="post-title mt-10 fw-medium font-size-16"><a
                                                                class="text-title"
                                                                href="<?php the_permalink() ?>"><?php echo esc_html($blog_reflection_future_perfect_middle_post_title); ?></a>
                                                    </h6>
                                                    <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))) ?>"
                                                       class="post-date font-size-14 mt-10"><i
                                                                class="far fa-clock"></i> <?php echo esc_html(get_the_date('M d, Y')) ?>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                }
                            }

                            wp_reset_postdata();
                            ?>

                        </div>
                        <div class="row">

                            <?php

                            $blog_reflection_future_perfect_bottom_post_cat = get_theme_mod('future_perfect_bottom_post_choose_cat_or_latest', 'latest');

                            if ($blog_reflection_future_perfect_bottom_post_cat == 'category') {
                                $blog_reflection_future_perfect_bottom_category_id = get_theme_mod('future_perfect_bottom_post_category', array(1));
                            }

                            $blog_reflection_future_perfect_bottom_post_order = get_theme_mod('future_perfect_bottom_post_order', 'DESC');
                            $blog_reflection_future_perfect_bottom_post_order_by = get_theme_mod('future_perfect_bottom_post_order_by', 'date');
                            $blog_reflection_future_perfect_display_bottom_post_number = get_theme_mod('future_perfect_bottom_display_post_number', 3);

                            $sticky_posts = get_option('sticky_posts');
                            if ($blog_reflection_future_perfect_bottom_post_cat == 'latest') {
                                // The Query
                                $blog_reflection_future_perfect_bottom_post_args = array(
                                    'post_status' => 'publish',
                                    'post_type' => 'post',
                                    'posts_per_page' => 3, // Only one post
                                    'orderby' => 'date', // Order by date
                                    'order' => 'desc', // Descending order (latest post first)
                                    'post__not_in' => $sticky_posts,
                                );
                                $blog_reflection_future_perfect_bottom_post_query = new WP_Query($blog_reflection_future_perfect_bottom_post_args);

                            } else {
                                // The Query
                                $blog_reflection_future_perfect_bottom_post_args = array(
                                    'post_type' => 'post',
                                    'category__in' => $blog_reflection_future_perfect_bottom_category_id, // Replace with your category ID
                                    'posts_per_page' => $blog_reflection_future_perfect_display_bottom_post_number, // Number of posts to display
                                    'orderby' => $blog_reflection_future_perfect_bottom_post_order_by, // Order by date
                                    'order' => $blog_reflection_future_perfect_bottom_post_order, // Order descending
                                    'post__not_in' => $sticky_posts,
                                );
                                $blog_reflection_future_perfect_bottom_post_query = new WP_Query($blog_reflection_future_perfect_bottom_post_args);
                            }
                            // Execute the query
                            // The Loop
                            if ($blog_reflection_future_perfect_bottom_post_query->have_posts()) {
                                while ($blog_reflection_future_perfect_bottom_post_query->have_posts()) {
                                    $blog_reflection_future_perfect_bottom_post_query->the_post();

                                    // Get the category color and link
                                    $blog_reflection_future_perfect_bottom_post_category_name = get_the_category();
                                    if ($blog_reflection_future_perfect_bottom_post_category_name !== false) {
                                        $blog_reflection_future_perfect_bottom_custom_field_cat_color = get_term_meta($blog_reflection_future_perfect_bottom_post_category_name[0]->term_id, 'term_color', true);
                                        $blog_reflection_future_perfect_bottom_post_category_link = get_category_link($blog_reflection_future_perfect_bottom_post_category_name[0]->term_id);
                                    }

                                    $blog_reflection_future_perfect_bottom_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                    $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    if (get_the_post_thumbnail_url()) {
                                        $blog_reflection_future_perfect_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                    } else {
                                        $blog_reflection_future_perfect_image_alt_text = 'No Image';
                                    }
                                    $blog_reflection_future_perfect_bottom_get_index_of_array = array_rand($blog_reflection_tag_color, 1);
                                    if (strlen(get_the_title()) > 5) {
                                        // Trim to the first 5 characters and add ellipsis
                                        $blog_reflection_future_perfect_bottom_post_title = substr(get_the_title(), 0, 20) . '...';
                                    } else {
                                        // If the title is less than or equal to 5 characters, display it as is
                                        $blog_reflection_future_perfect_bottom_post_title = get_the_title();
                                    }
                                    ?>
                                    <div class="col-lg-4 col-md-6 mt-4">
                                        <div class="single-blog-post style4">
                                            <a href="<?php echo esc_url($blog_reflection_future_perfect_bottom_post_category_link) ?>"
                                               class="post-category style-<?php echo esc_attr($blog_reflection_tag_color[$blog_reflection_future_perfect_bottom_get_index_of_array]) ?>"
                                               style="background-color: <?php echo esc_attr($blog_reflection_future_perfect_bottom_custom_field_cat_color) ?>"><?php echo esc_html($blog_reflection_future_perfect_bottom_post_category_name[0]->name) ?></a>
                                            <a href="<?php the_permalink() ?>" class="post-img">
                                                <img src="<?php echo esc_url($blog_reflection_future_perfect_bottom_post_img) ?>"
                                                     alt="<?php echo esc_attr($blog_reflection_future_perfect_image_alt_text); ?>">
                                            </a>
                                            <div class="post-wrap-details">
                                                <h4 class="post-title fw-medium mt-15 font-size-16"><a
                                                            class="text-title"
                                                            href="<?php the_permalink(); ?>"><?php echo esc_html($blog_reflection_future_perfect_bottom_post_title); ?></a>
                                                </h4>
                                                <div class="blog-post-meta mt-10 mb-n1">
                                                    <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))) ?>"
                                                       class="post-date">
                                                        <i class="far fa-clock"></i>
                                                        <?php echo esc_html(get_the_date('M d, Y')); ?>
                                                    </a>
                                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"
                                                       class="post-author">
                                                        <i class="far fa-user"></i>
                                                        <?php echo esc_html(get_the_author()); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php

                    $future_perfect_side_bar_enable_disable = get_theme_mod('enable_disable_future_perfect_sidebar', 'on');
                    if ($future_perfect_side_bar_enable_disable == 'on') {
                        ?>
                        <div class="col-xl-4 future-sidebar">
                            <?php if (is_active_sidebar('future-perfect-sidebar')) : ?>
                                <div class="sidebar-widget-area margin-80">
                                    <?php dynamic_sidebar('future-perfect-sidebar'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
    <!--==============================
         Future Perfect Area Ends
     ==============================-->
    <!--==============================
		Middle Bottom Ad Area
	==============================-->
    <?php
    $blog_reflection_middle_bottom_ads_options = get_theme_mod('middle_bottom_ads_enable', 'on');
    if ($blog_reflection_middle_bottom_ads_options == 'on') {
        ?>
        <div class=" ad-area text-center overflow-hidden space">
            <div class="container ad-banner-wrap">
                <?php
                $blog_reflection_middle_ad_image_bottom = get_theme_mod('middle_bottom_ads_two_image', get_template_directory_uri() . '/assets/images/ads/ad4.jpg');
                $blog_reflection_middle_bottom_ad_url = get_theme_mod('middle_bottom_ads_image_url', 'https://www.mycodecare.com/blog-reflection'); ?>
                <a class="middle-bottom-ads-banner-edit"
                   href="<?php echo esc_url_raw($blog_reflection_middle_bottom_ad_url); ?>" target="_blank"><img
                            src="<?php echo esc_url($blog_reflection_middle_ad_image_bottom); ?>"
                            alt="<?php the_title_attribute() ?>"></a>
            </div>
        </div>
        <?php
    }
    ?>

    <!--==============================
	Global Post Area start here
	==============================-->
    <?php
    $global_post_options = get_theme_mod('enable_disable_global_post_options', 'on');
    if ($global_post_options == 'on') {
        $global_post_section_title = get_theme_mod('global_post_section_title', 'Global Post');
        ?>
        <div class="space-bottom overflow-hidden">
            <div class="container">
                <div class="row gx-40 gy-30">
                    <?php
                    $global_post_side_bar_enable_disable = get_theme_mod('enable_disable_global_post_sidebar', 'on');
                    if ($global_post_side_bar_enable_disable == 'on') {
                        $global_post_class = 'col-xl-8';
                    } else {
                        $global_post_class = 'col-xl-12';
                    }
                    ?>
                    <div class="<?php echo esc_attr($global_post_class) ?>">
                        <div class="row align-items-center justify-content-sm-between justify-content-center">
                            <div class="col-auto global-post">
                                <h2 class="sec-title h3 text-center more_news_title_color"><?php echo esc_html($global_post_section_title); ?></h2>
                            </div>
                            <div class="col d-sm-block d-none">
                                <hr class="title-line">
                            </div>
                        </div>
                        <div class=" overflow-hidden">
                            <!-- Global post Looping Code -->
                            <?php
                            // Get the selected category ID for global post
                            $blog_reflection_global_news_category_id = get_theme_mod('select_global_post_category', 1);
                            $blog_reflection_global_news_post_order = get_theme_mod('global_post_order', 'desc');
                            $blog_reflection_global_news_post_order_by = get_theme_mod('global_post_order_by', 'date');
                            $blog_reflection_global_news_post_number = get_theme_mod('global_post_display_post_number', '5');
                            // Convert category ID to slug
                            $blog_reflection_global_news_category_slug = '';
                            $blog_reflection_global_news_category = get_category($blog_reflection_global_news_category_id);
                            if (!$blog_reflection_global_news_category) {
                                $blog_reflection_global_news_category = get_category(1);
                            }
                            if ($blog_reflection_global_news_category) {
                                $blog_reflection_global_news_category_slug = $blog_reflection_global_news_category->slug;
                            }
                            $blog_reflection_global_news_get_latest_post_only = get_theme_mod('global_post_cat_or_latest', 'latest');
                            if ($blog_reflection_global_news_get_latest_post_only == 'latest') {
                                // Define query arguments
                                $global_news_args = array(
                                    'post_status' => 'publish',
                                    'posts_per_page' => 5,
                                    'order' => 'desc', // Use the selected order
                                    'orderby' => 'date', // Use the selected order by
                                    'ignore_sticky_posts' => 1,
                                );
                                $global_news_query = new WP_Query($global_news_args);
                            } else {
                                // The Query for global news
                                $global_news_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => $blog_reflection_global_news_post_number,
                                    'order' => $blog_reflection_global_news_post_order,
                                    'orderby' => $blog_reflection_global_news_post_order_by,
                                    'category_name' => $blog_reflection_global_news_category_slug,
                                    'ignore_sticky_posts' => 1,
                                );
                                $global_news_query = new WP_Query($global_news_args);
                            }

                            $global_news_post_counter = 0;
                            if ($global_news_query->have_posts()) {
                                while ($global_news_query->have_posts()) {
                                    $global_news_query->the_post();

                                    // Get category details by slug
                                    $global_news_category = get_category_by_slug($blog_reflection_global_news_category_slug);

                                    if ($global_news_category !== false) {
                                        $global_news_custom_field_cat_color = get_term_meta($global_news_category->term_id, 'term_color', true);
                                        $global_news_cat_url = get_category_link($global_news_category->term_id);
                                    } else {
                                        $global_news_custom_field_cat_color = '';
                                        $global_news_cat_url = '';
                                    }

                                    // Get post image URL
                                    $global_news_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                    $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    if (get_the_post_thumbnail_url()) {
                                        $blog_reflection_global_post_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                    } else {
                                        $blog_reflection_global_post_image_alt_text = 'No Image';
                                    }
                                    $tag_colors = array(
                                        'style-dark-green',
                                        'style-red',
                                        'style-blue'
                                    );
                                    $random_color = $tag_colors[array_rand($tag_colors)];
                                    if (strlen(get_the_title()) > 5) {
                                        // Trim to the first 5 characters and add ellipsis
                                        $blog_reflection_global_post_title = substr(get_the_title(), 0, 30) . '...';
                                    } else {
                                        // If the title is less than or equal to 5 characters, display it as is
                                        $blog_reflection_global_post_title = get_the_title();
                                    }
                                    ?>
                                    <div class="single-blog-post style-grid2" style="margin-bottom:25px;">
                                        <a href="<?php the_permalink(); ?>" class="post-img img-radius-5">
                                            <img class="global-post-img"
                                                 src="<?php echo esc_url($global_news_post_img); ?>"
                                                 alt="<?php echo esc_attr($blog_reflection_global_post_image_alt_text); ?>">
                                            <div class="blog-reflection-global-post-overlay"></div>
                                        </a>
                                        <div class="post-wrap-details">

                                            <a href="<?php echo esc_url($global_news_cat_url) ?>"
                                               class="post-category <?php echo esc_attr($random_color); ?>"
                                               style="background-color: <?php echo esc_attr($global_news_custom_field_cat_color) ?> ;">
                                                <?php echo esc_html($global_news_category->name); ?>
                                            </a>
                                            <a href="<?php the_permalink(); ?>" class="post-date font-size-16 mt-15">
                                                <i class="far fa-clock margin-right-10"></i><?php echo esc_html(get_the_date('F j, Y')); ?>
                                            </a>
                                            <h6 class="post-title mt-10 fw-medium font-size-20"><a class="text-title"
                                                                                                   href="<?php the_permalink(); ?>"><?php echo esc_html($blog_reflection_global_post_title); ?></a>
                                            </h6>
                                            <p class="post-content mt-15"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?></p>
                                        </div>
                                    </div>
                                    <?php

                                    $global_news_post_counter++;
                                }
                                wp_reset_postdata();
                            }
                            ?>
                            <?php if ($global_news_query->have_posts() && $global_news_post_counter > 5) { ?>
                                <div class="btn-wrap">
                                    <a class="btn style-small"
                                       href="<?php echo esc_url($global_news_cat_url) ?>"><?php echo esc_html_e('Read More', 'blog-reflection'); ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    $global_post_side_bar_enable_disable = get_theme_mod('enable_disable_global_post_sidebar', 'on');
                    if ($global_post_side_bar_enable_disable == 'on') {
                        ?>
                        <!-- Related Widget start here  -->
                        <div class="col-xl-4 global-sidebar">

                            <?php if (is_active_sidebar('global-post-sidebar')) : ?>
                                <div class="sidebar-widget-area">
                                    <?php dynamic_sidebar('global-post-sidebar'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

    <!--==============================
	Global News Area ends here
	==============================-->


    <!--=============================
         Start Weekend Top
    ==========================-->

    <?php
    $blog_reflection_weekend_top_options = get_theme_mod('enable_weekend_top_post', 'on');
    if ($blog_reflection_weekend_top_options == 'on') {
        // Get the weekend top title
        $blog_reflection_weekend_top_title = get_theme_mod('weekend_top_post_section_title', 'Weekend Top');
        ?>
        <!-- Weekend Top Area -->
        <div class="space-bottom overflow-hidden">
            <div class="container">
                <div class="row align-items-center justify-content-sm-between justify-content-center">
                    <div class="col-auto weekend-post-edit">
                        <!-- Display Weekend Top Title -->
                        <h2 class="sec-title weekend-title-color h3 text-center"><?php echo esc_html($blog_reflection_weekend_top_title); ?></h2>
                    </div>
                    <div class="col d-sm-block d-none">
                        <hr class="title-line">
                    </div>
                </div>
                <div class="row gx-20 global-carousel weekend-top-slider" data-slide-show="4" data-lg-slide-show="3"
                     data-md-slide-show="2" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true"
                     data-md-dots="true" data-sm-dots="true" data-xs-dots="true">
                    <!-- Weekend Top Looping Code -->
                    <?php
                    // Get the selected category IDs for Weekend Top
                    $blog_reflection_weekend_top_category_id = get_theme_mod('weekend_top_post_category', 1); // Default to category ID 1 if not set
                    $blog_reflection_weekend_top_post_order = get_theme_mod('weekend_top_post_order', 'asc'); // Default to category ID 1 if not set
                    $blog_reflection_weekend_top_post_order_by = get_theme_mod('weekend_top_post_order_by', 'date'); // Default to category ID 1 if not set
                    $blog_reflection_weekend_top_get_latest_post_only = get_theme_mod('weekend_post_cat_or_latest', 'latest');
                    // Get the category object
                    $blog_reflection_weekend_top_category = get_category($blog_reflection_weekend_top_category_id);
                    if (!$blog_reflection_weekend_top_category) {
                        $blog_reflection_weekend_top_category = get_category(1);
                    }
                    // Get the category slug
                    $blog_reflection_weekend_top_category_slug = $blog_reflection_weekend_top_category->slug;

                    if ($blog_reflection_weekend_top_get_latest_post_only == 'latest') {
                        // Define query arguments
                        $weekend_top_args_latest = array(
                            'post_status' => 'publish',
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'order' => $blog_reflection_weekend_top_post_order, // Use the selected order
                            'orderby' => $blog_reflection_weekend_top_post_order_by, // Use the selected order by
                            'ignore_sticky_posts' => 1,

                        );
                        $weekend_top_query = new WP_Query($weekend_top_args_latest);
                    } else {

                        // The Query for Weekend Top
                        $weekend_top_args_category = array(
                            'post_type' => 'post',
                            'posts_per_page' => 15,
                            'order' => $blog_reflection_weekend_top_post_order, // Use the selected order
                            'orderby' => $blog_reflection_weekend_top_post_order_by, // Use the selected order by
                            'category_name' => $blog_reflection_weekend_top_category_slug,
                            'ignore_sticky_posts' => 1,
                        );
                        $weekend_top_query = new WP_Query($weekend_top_args_category);
                    }


                    if ($weekend_top_query->have_posts()) {
                        while ($weekend_top_query->have_posts()) {
                            $weekend_top_query->the_post();
                            // Get the categories of the specific post
                            $weekend_top_categories = get_the_category();
                            if (!empty($weekend_top_categories)) {
                                // Assuming only one category per post
                                $weekend_top_category = $weekend_top_categories[0]; // Selecting the first category
                                // Get category link and color
                                $blog_reflection_weekend_top_category_link = get_category_link($weekend_top_category->term_id);
                                $weekend_top_custom_field_cat_color = get_term_meta($weekend_top_category->term_id, 'term_color', true);

                                // Example: Get random color for post tag
                                $tag_colors = array(
                                    'style-dark-green',
                                    'style-red',
                                    'style-blue'
                                );
                                $random_color = $tag_colors[array_rand($tag_colors)];
                                $weekend_top_post_categories = $weekend_top_category->name;
                            } else {
                                $blog_reflection_weekend_top_category_link = '';
                                $weekend_top_custom_field_cat_color = '';
                                $weekend_top_post_categories = '';
                            }

                            // Get post image URL
                            $weekend_top_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                            $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            if (get_the_post_thumbnail_url()) {
                                $blog_reflection_weekend_top_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                            } else {
                                $blog_reflection_weekend_top_image_alt_text = 'No Image';
                            }
                            if (strlen(get_the_title()) > 5) {
                                // Trim to the first 5 characters and add ellipsis
                                $blog_reflection_weekend_top_post_title = substr(get_the_title(), 0, 25) . '...';
                            } else {
                                // If the title is less than or equal to 5 characters, display it as is
                                $blog_reflection_weekend_top_post_title = get_the_title();
                            }
                            ?>
                            <div class="col-lg-3">
                                <div class="single-blog-post style3">
                                    <a href="<?php echo esc_url($blog_reflection_weekend_top_category_link); ?>"
                                       class="post-category <?php echo esc_attr($random_color); ?>"
                                       style="background-color: <?php echo esc_attr($weekend_top_custom_field_cat_color) ?> ;"><?php echo esc_html($weekend_top_post_categories); ?></a>
                                    <div class="post-img">
                                        <!-- Display Post Thumbnail if available -->
                                        <img style="height:220px;" src="<?php echo esc_url($weekend_top_post_img); ?>"
                                             alt="<?php echo esc_attr($blog_reflection_weekend_top_image_alt_text); ?>">
                                        <!-- Overlay -->
                                        <div class="blog-reflection-weekend-post-overlay"></div>
                                    </div>
                                    <div class="post-wrap-details">
                                        <h2 class="post-title font-size-16">
                                            <a class="text-title" href="<?php the_permalink(); ?>">
                                                <?php echo esc_html($blog_reflection_weekend_top_post_title); ?>
                                            </a>
                                        </h2>
                                        <div class="blog-post-meta blog-date mt-20 mb-n1">
                                            <a href="<?php the_permalink(); ?>" class="post-date">
                                                <i class="far fa-clock"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
                                            </a>
                                            <a href="<?php the_permalink(); ?>" class="post-author">
                                                <i class="far fa-user"></i>
                                                <?php echo esc_html(get_the_author()); ?> <!-- Added author name -->
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata(); // Reset Post Data
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
<?php
get_footer();
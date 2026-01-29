<?php
// Breadcrumb function for WordPress
function blog_reflection_breadcrumb() {
	// Settings
	$separator  = '>';
	$home_title = 'Home';
	// Get the query & post information
	global $post, $wp_query;
	// Do not display on the homepage
	if ( ! is_front_page() ) {
		echo '<div class="breadcrumb-space-bottom">';
		echo '<ul class="breadcrumb">';
		echo '<li class="breadcrumb-item"><a href="' . get_home_url() . '">' . esc_html( $home_title ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
		if ( is_archive() ) {
			if ( ! is_tax() && ! is_category() && ! is_tag() ) {
				echo '<li class="breadcrumb-item">' . post_type_archive_title( '', false ) . '</li>';
			} else {
				$post_type = get_post_type();
				if ( $post_type != 'post' ) {
					$post_type_object  = get_post_type_object( $post_type );
					$post_type_archive = get_post_type_archive_link( $post_type );
					echo '<li class="breadcrumb-item"><a href="' . esc_url( $post_type_archive ) . '">' . esc_html( $post_type_object->labels->name ) . '</a></li>';
					echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
				}
				echo '<li class="breadcrumb-item">' . single_term_title( '', false ) . '</li>';
			}
		} elseif ( is_single() ) {
			$post_type = get_post_type();
			if ( $post_type != 'post' ) {
				$post_type_object  = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );
				echo '<li class="breadcrumb-item 343434"><a href="' . esc_url( $post_type_archive . '">' . esc_html( $post_type_object->labels->name ) ) . '</a></li>';
				echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			}
			$category = get_the_category();
			if ( ! empty( $category ) ) {
				$last_category = end( $category );
				$cat_parents   = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
				$cat_parents   = explode( ',', $cat_parents );
				foreach ( $cat_parents as $parent ) {
					echo '<li class="breadcrumb-item t55t334t">' .  $parent . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
				}
			}
			echo '<li class="breadcrumb-item g5tynh">' . get_the_title() . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_page() ) {
			if ( $post->post_parent ) {
				$ancestors = get_post_ancestors( $post->ID );
				$ancestors = array_reverse( $ancestors );
				foreach ( $ancestors as $ancestor ) {
					echo '<li class="breadcrumb-item 5t5t5t5"><a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
				}
			}
			echo '<li class="breadcrumb-item fff">' . get_the_title() . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_category() ) {
			echo '<li class="breadcrumb-item">' . single_cat_title( '', false ) . '</li>';
		} elseif ( is_tag() ) {
			echo '<li class="breadcrumb-item ggg">' . single_tag_title( '', false ) . '</li>';
		} elseif ( is_day() ) {
			echo '<li class="breadcrumb-item ttt"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			echo '<li class="breadcrumb-item uuuu"><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';/// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			echo '<li class="breadcrumb-item 555">' . get_the_time( 'jS' ) . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_month() ) {
			echo '<li class="breadcrumb-item 7u7u"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			echo '<li class="breadcrumb-item 8ii87">' . get_the_time( 'F' ) . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_year() ) {
			echo '<li class="breadcrumb-item h6767">' . get_the_time( 'Y' ) . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo '<li class="breadcrumb-item">Author: ' . esc_html( $userdata->display_name ) . '</li>';
		} elseif ( is_search() ) {
			echo '<li class="breadcrumb-item">Search results for: ' . get_search_query() . '</li>';
		} elseif ( is_404() ) {
			echo '<li class="breadcrumb-item">Error 404</li>';
		}
		echo '</ul>';
		echo '</div>';
	}
}

// Add breadcrumb action
add_action( 'blog_reflection_breadcrumb', 'blog_reflection_breadcrumb' );

// Post pagination function
function blog_reflection_post_pagination() {
	the_posts_pagination( array(
		'screen_reader_text' => '',
		'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
		'next_text'          => '<i class="fas fa-angle-double-right"></i>',
		'type'               => 'list',
		'mid_size'           => 1,
	) );
}

//Dark logo
function blog_reflection_dark_logo_customize_register($wp_customize) {
	// Add a setting for the dark mode logo
	$wp_customize->add_setting('dark_mode_logo', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'blog_reflection_sanitize_image_url',
	));
	// Add the control for the dark mode logo
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'dark_mode_logo', array(
		'label'      => __('Dark Mode Logo', 'blog-reflection'),
		'section'    => 'title_tagline',
		'settings'   => 'dark_mode_logo',
	)));
}
add_action('customize_register', 'blog_reflection_dark_logo_customize_register');
// Sanitization callback function for the dark mode logo URL
function blog_reflection_sanitize_image_url($url) {
	return esc_url_raw($url);
}

//Add custom menu
function blog_reflection_menu_page() {
    add_menu_page(// phpcs:ignore WPThemeReview.PluginTerritory.NoAddAdminPages.add_menu_pages_add_menu_page
        'Blog Reflection', // Page title
        'Blog Reflection',       // Menu title
        'manage_options',    // Capability
        'blog-reflection',  // Menu slug
        'blog_reflection_menu_page_content', // Function to display page content
        'dashicons-format-aside', // Icon URL (dashicons for WP icons)
        6                    // Position
    );
}
add_action( 'admin_menu', 'blog_reflection_menu_page' );

function blog_reflection_menu_page_content() {
    if(class_exists('Advanced_Import')) {
        $blog_reflection_home_url = home_url().'/wp-admin/themes.php?page=advanced-import';
    }
    else{
        $blog_reflection_home_url = home_url().'/wp-admin/themes.php?page=tgmpa-install-plugins&plugin_status=install';
    }
    ?>
        <style>
            div#wpcontent {
                padding-left: 0 !important;
            }
        </style>
    <div id="wpcontent" style="margin-left: 0!important; padding-left: 0!important;">
        <div id="wpbody" role="main">
            <div id="wpbody-content">
                <div class="privacy-settings-header">
                    <div class="privacy-settings-title-section">
                        <h1><?php echo esc_html__('Welcome to Blog Reflection Theme','blog-reflection'); ?></h1>
                    </div>

                    <nav class="privacy-settings-tabs-wrapper hide-if-no-js" aria-label="Secondary menu">
                        <a href="<?php echo esc_url($blog_reflection_home_url); ?>" class="privacy-settings-tab active" aria-current="true">
                            <?php echo esc_html__('Import Demo','blog-reflection'); ?></a>
                        <a href="http://mycodecare.com/blog-reflection" target="_blank" class="privacy-settings-tab">
                            <?php echo esc_html__('Theme Website','blog-reflection'); ?></a>
                    </nav>
                </div>
                <hr class="wp-header-end">
                <div class="privacy-settings-body hide-if-no-js">
                    <h2><?php echo esc_html__('Demo Content Import for Blog Reflection','blog-reflection'); ?></h2>
                    <p>

                        <?php echo esc_html__("Before importing demo content, please ensure that ",'blog-reflection'); ?>
                        <strong>
                        <?php echo esc_html__("you have installed and activated the recommended plugins first. ",'blog-reflection'); ?>
                            </strong>
                        <?php echo esc_html__("Once that's done, get your Blog Reflection theme up and running in minutes with
                        our one-click demo content import feature! Instantly populate your site with sample posts, pages,
                        and widgets to see the full potential of your theme. Click the button below to import demo content
                        and start customizing your stunning blog today!",'blog-reflection'); ?>

                    </p>
                    <a href="<?php echo esc_url($blog_reflection_home_url); ?>" class="button button-primary" ><?php echo esc_html__('Import Demo Content'); ?><a>
                </div>
                </div>
            </div><!-- wpbody -->
        <div class="clear"></div></div>

<?php
}

/**
* Blog Reflection Video Hook 
*/
if ( ! function_exists( 'blog_reflection_video_post_hook' ) ) :
	/**
	* Video Post
	*
	* @since 1.0.0
	*/
	function blog_reflection_video_post_hook() { 
		$video_section_title = get_theme_mod('video_section_title', 'Trending Videos');
        // Another loop to display videos in the sidebar
        $blog_reflection_video_post_category = get_theme_mod('select_video_category', array(1));
        $blog_reflection_video_order = get_theme_mod('video_post_order', 'desc');
        $blog_reflection_video_orderby = get_theme_mod('video_post_orderby', 'date');
        $blog_reflection_video_post_number = get_theme_mod('video_display_number', '4');
        $blog_reflection_video_post_args = array(
            'meta_query' => array(
                array(
                    'key' => 'video_url',
                    'value' => '', // Checks for a non-empty value
                    'compare' => '!=' // Not equal to an empty string
                )
            ),
            'category__in' => $blog_reflection_video_post_category,
            'order' => $blog_reflection_video_order,
            'orderby' => $blog_reflection_video_orderby,
            'posts_per_page' => $blog_reflection_video_post_number,
        );
        $blog_reflection_video_post_query = new WP_Query($blog_reflection_video_post_args);
        if ($blog_reflection_video_post_query->have_posts()){
        ?>
        <!--==============================
        Video Area
        ==============================-->
        <div class="space overflow-hidden bg-black">
        <div class="container container2">
            <div class="row align-items-center justify-content-sm-between justify-content-center">
                <div class="col-auto">
					<h2 class="sec-title h3 text-center text-white video-edit"><?php echo esc_html($video_section_title); ?></h2>
                </div>
                <div class="col d-sm-block d-none">
                    <hr class="title-line style2">                   
                </div>
            </div>

            <div class="row gx-40 gy-40">
                <div class="col-xl-8">
                    <div class="blog-tab-slide global-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1" data-adaptive-height="true">
					<?php
                        if ($blog_reflection_video_post_query->have_posts()) :
                            while ($blog_reflection_video_post_query->have_posts()) : $blog_reflection_video_post_query->the_post();
                                $blog_reflection_video_post_get_video_url = get_post_meta(get_the_ID(), 'video_url', true);
                                $blog_reflection_video_post_categories = get_the_category();
                                $blog_reflection_video_post_img = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                // Get post date
                                $blog_reflection_video_post_date = get_the_date('Y-m-d');
                                // Get the post thumbnail ID
                                $blog_reflection_video_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                if (get_the_post_thumbnail_url()) {
                                    $video_post_image_alt_text = get_post_meta($blog_reflection_video_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                } else {
                                    $video_post_image_alt_text = 'No Image';
                                }
                                // Extract year, month, and day
                                $blog_reflection_video_post_year = get_the_date('Y');
                                $blog_reflection_video_post_month = get_the_date('m');
                                $blog_reflection_video_post_day = get_the_date('d');

                                // Get date URL
                                $blog_reflection_video_date_url = get_day_link($blog_reflection_video_post_year, $blog_reflection_video_post_month, $blog_reflection_video_post_day);
                                if (strlen(get_the_title()) > 5) {
                                    // Trim to the first 5 characters and add ellipsis
                                    $blog_reflection_video_main_title = substr(get_the_title(), 0, 48) . '...';
                                } else {
                                    // If the title is less than or equal to 5 characters, display it as is
                                    $blog_reflection_video_main_title = get_the_title();
                                }
                            ?>
                        <div class="">
                            <div class="single-blog-post style4">
                                <div class="post-img video-wrap">
                                    <img class="vid-h-w" style="height:500px; width:100%;" src="<?php echo esc_url($blog_reflection_video_post_img) ?>" alt="<?php echo esc_attr($video_post_image_alt_text); ?>">
                                    <a href="<?php echo esc_url($blog_reflection_video_post_get_video_url); ?>" class="play-btn popup-video"><i class="fa-solid fa-circle-play video-play-button"></i></a>
								</div>
                                <div class="post-wrap-details">
                                    <h4 class="post-title fw-medium h2 mt-30"><a class="text-white" href="<?php the_permalink(); ?>"><?php echo esc_html($blog_reflection_video_main_title); ?> </a></h4>
                                    <a href="<?php echo esc_url($blog_reflection_video_date_url); ?>" class="post-date mt-35">
                                        <i class="far fa-clock"></i>
										<?php echo esc_html(get_the_date()); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
						<?php
                            endwhile;
                                wp_reset_postdata(); // Restore original Post Data
                            endif;
                        ?>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="blog-tab" data-asnavfor=".blog-tab-slide">
					<?php
                        if ($blog_reflection_video_post_query->have_posts()) :
                             while ($blog_reflection_video_post_query->have_posts()) : $blog_reflection_video_post_query->the_post();
                                $blog_reflection_get_video_url = get_post_meta(get_the_ID(), 'video_url', true);
                                $blog_reflection_video_post_category = get_the_category();
                                $cat_url = get_category_link($blog_reflection_video_post_category[0]->term_id);
                                $blog_reflection_tag_color = array('style-dark-green', 'style-red', 'style-blue'); // Example colors, adjust as needed
                                // Get the categories of the specific post

                                if (!empty($blog_reflection_video_post_category)) {
                                    $custom_field_cat_color = get_term_meta($blog_reflection_video_post_category[0]->term_id, 'term_color', true);
                                    $random_color = $blog_reflection_tag_color[array_rand($blog_reflection_tag_color)];
                                } else {
                                    $custom_field_cat_color = '';
                                }

                                $blog_reflection_video_post_img = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                $blog_reflection_get_video_icon = get_template_directory_uri() . '/assets/images/wave.svg';
                                // Get the post thumbnail ID
                                $video_post_image_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                if (get_the_post_thumbnail_url()) {
                                    $video_post_image_alt_text = get_post_meta($video_post_image_thumbnail_id, '_wp_attachment_image_alt', true);
                                } else {
                                    $video_post_image_alt_text = 'No Image';
                                }
                                // Get post date
                                $post_date = get_the_date('Y-m-d');

                                // Extract year, month, and day
                                $blog_reflection_video_post_year = get_the_date('Y');
                                $blog_reflection_video_post_month = get_the_date('m');
                                $blog_reflection_video_post_day = get_the_date('d');

                                // Get date URL
                                $date_url = get_day_link($blog_reflection_video_post_year, $blog_reflection_video_post_month, $blog_reflection_video_post_day);
                                if (strlen(get_the_title()) > 5) {
                                    // Trim to the first 5 characters and add ellipsis
                                    $blog_reflection_video_right_title = substr(get_the_title(), 0, 20) . '...';
                                } else {
                                    // If the title is less than or equal to 5 characters, display it as is
                                    $blog_reflection_video_right_title = get_the_title();
                                }
                                ?>
                        <div class="tab-btn active">
                            <div class="single-blog-post style-grid">
                                <div class="post-img img-radius-5 video-wrap">
									<img class="post-img-wh" src="<?php echo esc_url($blog_reflection_video_post_img); ?>" style="height:110px; width:125px;" alt="<?php echo esc_attr($video_post_image_alt_text) ?>">
                                    <div class="icon wave-icon">
                                        <img src="<?php echo esc_url($blog_reflection_get_video_icon); ?>" alt="<?php echo esc_attr($video_post_image_alt_text) ?>">
                                    </div>
                                    <a href="<?php echo esc_url($blog_reflection_get_video_url); ?>" class="play-btn style2 popup-video"><i class="fas fa-play"></i></a>
								</div>
                                <div class="post-wrap-details">
                                    <a href="<?php echo esc_url($cat_url); ?>" class="post-category vid-cat style-underline-none <?php echo esc_attr($random_color); ?>" style="background : <?php echo esc_attr($custom_field_cat_color); ?>"><?php echo esc_html($blog_reflection_video_post_category[0]->name); ?></a>
                                    <h6 class="post-title mt-15 fw-medium"><a class="text-white" href="<?php the_permalink(); ?>"><?php echo esc_html($blog_reflection_video_right_title); ?></a></h6>
                                </div>
                            </div>
                        </div>
						<?php
                            endwhile;
                                wp_reset_postdata(); // Restore original Post Data
                            endif;
                        ?>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <?php
        }
    }
    endif;
add_action( 'blog_reflection_video_post', 'blog_reflection_video_post_hook' );


// Demo Code ==============================
function blog_reflection_prefix_demo_import_lists(){
    $demo_image_link = 'https://mediumspringgreen-goose-758213.hostingersite.com/demo/blog-reflection';
    $live_preview_demo = 'https://blog-reflection.mycodecare.com';

    $blog_reflection_demo_lists = array(
        'demo1' =>array(
            'title' => __( 'Default Demo One', 'blog-reflection' ),/*Title*/
            'is_pro' => false,/*Is Premium*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Default 1' ),/*Search keyword*/
            'categories' => array( 'default'),/*Categories*/
            'template_url' => array(
                'content' => $demo_image_link.'/default-demo-content.json',/*Full URL Path to content.json*/
                'options' => $demo_image_link.'/default-demo-options.json',/*Full URL Path to options.json*/
                'widgets' => $demo_image_link.'/default-demo-widgets.json'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/default-demo.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/',/*Full URL Path to Live Demo*/

        ),
        'demo2' =>array(
            'title' => __( 'Default Demo Two', 'blog-reflection' ),/*Title*/
            'is_pro' => false,/*Is Premium*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Default 2'),/*Search keyword*/
            'categories' => array( 'default'),/*Categories*/
            'template_url' => array(
                'content' => $demo_image_link.'/default-demo-two-content.json',/*Full URL Path to content.json*/
                'options' => $demo_image_link.'/default-demo-two-options.json',/*Full URL Path to options.json*/
                'widgets' => $demo_image_link.'/default-demo-two-widgets.json'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/default-demo-two.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/default-demo',/*Full URL Path to Live Demo*/

        ),

        'pro-demo1' =>array(
            'title' => __( 'Business Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Business' ),/*Search keyword*/
            'categories' => array( 'business' ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/business-demo.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-business',/*Full URL Path to Live Demo*/
        ),
        'pro-demo2' =>array(
            'title' => __( 'Fashion Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Fashion', ),/*Search keyword*/
            'categories' => array( 'fashion' ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/fashion.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-fashion',/*Full URL Path to Live Demo*/
        ),
        'pro-demo3' =>array(
            'title' => __( 'Fashion Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Fashion'),/*Search keyword*/
            'categories' => array( 'fashion' ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/fashion-two.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-fashion-two',/*Full URL Path to Live Demo*/
        ),
        'pro-demo4' =>array(
            'title' => __( 'Fitness Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Fitness'),/*Search keyword*/
            'categories' => array( 'fitness' ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/fitness.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-fitness',/*Full URL Path to Live Demo*/
        ),
        'pro-demo5' =>array(
            'title' => __( 'Food Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Food',  ),/*Search keyword*/
            'categories' => array( 'food'),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/food-demo.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/food',/*Full URL Path to Live Demo*/
        ),
        'pro-demo6' =>array(
            'title' => __( 'Lifestyle Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Lifestyle', ),/*Search keyword*/
            'categories' => array( 'lifestyle', ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/lifestyle.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-lifestyle',/*Full URL Path to Live Demo*/
        ),
        'pro-demo7' =>array(
            'title' => __( 'Lifestyle Two Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Lifestyle',  ),/*Search keyword*/
            'categories' => array( 'lifestyle', ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/lifestyle-two.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-lifestyle-two',/*Full URL Path to Live Demo*/
        ),
        'pro-demo8' =>array(
            'title' => __( 'Technology Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Technology',  ),/*Search keyword*/
            'categories' => array( 'technology', ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' =>$demo_image_link.'/technology.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/technology',/*Full URL Path to Live Demo*/
        ),
        'pro-demo9' =>array(
            'title' => __( 'Technology Two Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Technology', ),/*Search keyword*/
            'categories' => array( 'technology', ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/technology-two.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-technology-two',/*Full URL Path to Live Demo*/
        ),
        'pro-demo10' =>array(
            'title' => __( 'Technology Three Demo Pro', 'blog-reflection' ),/*Title*/
            'is_pro' => true,/*Is Premium : Support Premium Version*/
            'pro_url' => 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/',/*Premium version/Pricing Url*/
            'author' => __( 'MyCodeCare', 'blog-reflection' ),/*Author Name*/
            'keywords' => array( 'Technology',  ),/*Search keyword*/
            'categories' => array( 'technology', ),/*Categories*/
            'template_url' => array(/* Optional for premium theme, you can add your own logic by hook*/
                'content' => '#',/*Full URL Path to content.json*/
                'options' => '#',/*Full URL Path to options.json*/
                'widgets' => '#'/*Full URL Path to widgets.json*/
            ),
            'screenshot_url' => $demo_image_link.'/technology-three.jpg',/*Full URL Path to demo screenshot image*/
            'demo_url' => $live_preview_demo.'/demo-technology-three',/*Full URL Path to Live Demo*/
        ),
    );
    return $blog_reflection_demo_lists;
}

if (!class_exists('Blog_Reflection_Pro')) {
    add_filter('advanced_import_demo_lists','blog_reflection_prefix_demo_import_lists');
}


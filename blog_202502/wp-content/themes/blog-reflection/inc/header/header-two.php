<?php
$blog_reflection_sticky_header = get_theme_mod('sticky_header_enable', 'on');
if ($blog_reflection_sticky_header == 'on') {
    ?>
    <header id="masthead" class="site-header nav-header header-layout1">
        <?php
        $blog_reflection_enable_top_header = get_theme_mod('enable_top_header', 'on');
        if ($blog_reflection_enable_top_header == 'on') {
            ?>
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <?php
                        $blog_reflection_enable_top_right = get_theme_mod('enable_right_top_section', 'on');
                        if ($blog_reflection_enable_top_right == 'on') {
                            ?>
                            <div class="col-auto d-none d-lg-block">
                                <div class="header-links">
                                    <ul>
                                        <li class="header-two-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <?php echo esc_attr(current_time('l-F j, Y')); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                            <div class="col-xl-8 col-lg-7">
                             <?php
                        $blog_reflection_icon_settings = get_theme_mod('header_social_enable', 'on');
                        if ($blog_reflection_icon_settings == 'on') {
                            $blog_reflection_social_defaults = [
                                [
                                    'social_icon' => 'fab fa-facebook-f',
                                    'link_url' => '#',
                                ],
                            ];
                            // Theme_mod settings to check.
                            $blog_reflection_icon_settings = get_theme_mod('repeater_top_section_icon', $blog_reflection_social_defaults);
                            ?>
                            <div class="col-auto">
                                <div class="header-links">
                                    <ul>
                                        <li class="d-md-block d-none">
                                            <div class="social-btn style3">
                                                <?php foreach ($blog_reflection_icon_settings as $blog_reflection_icon_setting) : ?>
                                                    <a href="<?php echo esc_url($blog_reflection_icon_setting['link_url']); ?>"
                                                       tabindex="0">
                                                        <i class="<?php echo esc_attr($blog_reflection_icon_setting['social_icon']); ?>"></i>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                         </div>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
<!-- middle header code  -->

        <?php
        $blog_reflection_enable_middle = get_theme_mod('header_middle_enable', 'on');
        if ($blog_reflection_enable_middle == 'on') {
            ?>
            <div class="header-middle header-two">
                <div class="container">
                    <div class="row align-items-center header-middle-middle">
                        <div class="col-lg-4 col-md-4 col-sm-6 d-lg-block d-none">
                            <div class="header-middle-logo site-branding">
                                <?php
                                if (has_custom_logo()) {
                                    // Display custom logo with specified size
                                    $custom_logo_id = get_theme_mod('custom_logo');
                                    $custom_dark_logo_url = get_theme_mod('dark_mode_logo');
                                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                    if($custom_dark_logo_url){
                                        $darkLogoUrl = $custom_dark_logo_url;
                                    }
                                    else{
	                                    $darkLogoUrl = $logo[0];
                                    }
                                    if ($logo) {
                                        $logo_width = $logo[1];
                                        $logo_height = $logo[2];

                                        // Check if the logo dimensions are both 80px
                                        if ($logo_width <= 80 && $logo_height <= 80) {
                                            $width = '80px';
                                            $height = '80px';
                                        } else {
                                            // Default to 185x60 if not both 80px
                                            $width = '185px';
                                            $height = '60px';
                                        }
                                        ?>
                                        <a class="light-logo" href="<?php echo esc_url(home_url()); ?>">
                                            <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                        </a>
                                        <a class="dark-logo" href="<?php echo esc_url(home_url()); ?>">
                                            <img src="<?php echo esc_url($darkLogoUrl); ?>" alt="<?php echo esc_url(get_bloginfo('name')); ?>">
                                        </a>
                                        <?php

                                    }
                                } else {
                                    if (is_front_page() && is_home()) {
                                        ?>
                                        <h2 class="site-title">
                                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                <?php echo esc_html(get_bloginfo('name')); ?>
                                            </a>
                                        </h2>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h2 class="site-title">
                                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                <?php echo esc_html(get_bloginfo('name'));?>
                                            </a>
                                        </h2>
                                        <?php
                                    }
                                }

                                $blog_reflection_description = get_bloginfo('description', 'display');
                                if ($blog_reflection_description || is_customize_preview()) {
                                    echo '<p class="site-description">' . esc_html($blog_reflection_description) . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        $blog_reflection_header_ad_enable_section = get_theme_mod('home_one_header_ad_enable', 'on');
                        if ($blog_reflection_header_ad_enable_section == 'on') {
                            ?>
                            <div class="col-lg-5 col-md-5 col-sm-6">
                                <div class="ad-banner-wrap">
                                    <?php
                                    $blog_reflection_top_ad_image = get_theme_mod('home_one_header_ad_image', get_template_directory_uri() . '/assets/images/ads/ad1.jpg');
                                    $blog_reflection_top_ad_url = get_theme_mod('home_one_header_ad_image_url', 'https://www.mycodecare.com/blog-reflection');
                                    ?>
                                    <a class="header-ads-top" href="<?php echo esc_url_raw($blog_reflection_top_ad_url); ?>"
                                       target="_blank"><img
                                                src="<?php echo esc_url($blog_reflection_top_ad_image); ?>" alt="<?php the_title_attribute() ?>"></a>
                                </div>
                            </div>
                            <?php
                        }
                            ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 top-search-col">
                            <?php
                            $blog_reflection_enable_search = get_theme_mod('enable_middle_search_section', 'on');
                             if ($blog_reflection_enable_search == 'on') {
                                get_search_form(); 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $blog_reflection_enable_bottom = get_theme_mod('header_two_bottom_enable', 'on');
        if ($blog_reflection_enable_bottom == 'on') {
            ?>
            <div class="sticky-wrapper">
                <!-- Main Menu Area -->
                <div class="header-bottom">
                    <div class="menu-area">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-8 col-sm-8 col-md-6 col-lg-4 col-xl-4 header-logo">
                                    <div>
                                        <?php
                                        the_custom_logo();
                                        if (is_front_page() && is_home()) :
                                            ?>
                                            <h2 class="site-title">
                                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                    <?php bloginfo('name'); ?>
                                                </a>
                                            </h2>
                                        <?php
                                        else :
                                            ?>
                                            <h2 class="site-title">
                                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                    <?php bloginfo('name'); ?>
                                                </a>
                                            </h2>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-3 col-md-2 col-lg-11 col-xl-11 text-align-r">
                                    <nav class="main-menu d-none d-lg-inline-block">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'container' => false,
                                                'theme_location' => 'primary-menu',
                                                'menu_id' => 'primary-menu',
                                                'fallback_cb' => 'blog_reflection_primary_navigation_fallback',
                                            )
                                        );
                                        ?>
                                    </nav>
                                    <div class="navbar-right d-inline-flex d-lg-none">
                                        <div class="theme-switcher">
                                            <button>
                                                <i class="fas fa-sun icon-sun"></i>
                                                <i class="fas fa-moon icon-moon"></i>
                                            </button>
                                        </div>
                                        <button type="button" class="menu-toggle icon-btn"><i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                     <!--==============================
                                        Mobile Menu
                                        ============================== -->
                                        <div class="mobile-menu-wrapper">
                                        <div class="mobile-menu-area text-center">
                                            <button class="menu-toggle"><i class="fas fa-times"></i></button>
                                            <div class="mobile-logo">
                                                <?php
                                                if (has_custom_logo()) {
                                                    // Display custom logo with specified size
                                                    $custom_logo_id = get_theme_mod('custom_logo');
                                                    $custom_dark_logo_url = get_theme_mod('dark_mode_logo');
                                                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                                    if ($custom_dark_logo_url) {
                                                        $darkLogoUrl = $custom_dark_logo_url;
                                                    } else {
                                                        $darkLogoUrl = $logo[0];
                                                    }
                                                    if ($logo) {
                                                        $logo_width = $logo[1];
                                                        $logo_height = $logo[2];

                                                        // Check if the logo dimensions are both 80px
                                                        if ($logo_width <= 80 && $logo_height <= 80) {
                                                            $width = '80px';
                                                            $height = '80px';
                                                        } else {
                                                            // Default to 185x60 if not both 80px
                                                            $width = '185px';
                                                            $height = '60px';
                                                        }
                                                        ?>
                                                            <a class="light-logo remove-text-decoration" href="<?php echo esc_url(home_url()); ?>">
                                                                <img class="mobile-menu-logo" src="<?php echo esc_url($logo[0]) ?>"
                                                                    alt="<?php bloginfo('name') ?>"
                                                                    style="width: <?php echo esc_attr($width) ?>; height: <?php esc_attr($height) ?>;">
                                                            </a>
                                                            <a class="dark-logo remove-text-decoration" href="<?php echo esc_url(home_url()); ?>">
                                                            <img class="mobile-menu-logo" src="<?php echo esc_url($darkLogoUrl) ?>" alt="<?php bloginfo('name') ?>"
                                                                style="width: <?php echo esc_attr($width) ?>; height: <?php esc_attr($height) ?>;">
                                                            </a>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                        <h2 class="site-title">
                                                            <a class="remove-text-decoration" href="<?php echo esc_url(home_url('/')) ?>" rel="home">
                                                                <?php bloginfo('name'); ?>
                                                            </a>
                                                        </h2>
                                                    <?php
                                                }

                                                $blog_reflection_description = get_bloginfo('description', 'display');
                                                if ($blog_reflection_description || is_customize_preview()) {
                                                    echo '<p class="site-description">' . esc_html($blog_reflection_description) . '</p>';
                                                }
                                                ?>
                                            </div>
                                            <div class="mobile-menu">
                                                <?php
                                                wp_nav_menu(
                                                    array(
                                                        'container' 		  => false,
                                                        'theme_location' 	=> 'primary-menu',
                                                        'menu_id'        	=> 'primary-menu',
                                                        'menu_class'      => 'sf-menu',
                                                        'fallback_cb'     => 'blog_reflection_primary_navigation_fallback',
                                                    )
                                                );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Mobile menu  toggle ends -->
                                </div>
                                <div class="col-4 col-sm-12 col-md-1 col-lg-1 col-xl-1  d-none d-lg-block">
                                    <div class="header-button">
                                        <?php
                                        $blog_reflection_light_dark = get_theme_mod('enable_light_dark_section', 'on');
                                        if ($blog_reflection_light_dark == 'on') {
                                            ?>
                                            <div class="theme-switcher">
                                            <button>
                                                <i class="fas fa-sun icon-sun"></i>
                                                <i class="fas fa-moon icon-moon"></i>
                                            </button>
                                            </div>
                                            <?php
                                        }
                                        $blog_reflection_theme_mod = get_theme_mod('select_setting_theme_mode', 'light');
                                        if ($blog_reflection_theme_mod == 'dark-mode') {
                                            // Add your custom JavaScript code
                                            $custom_js = "jQuery(document).ready(function($) {
                                                                // Your custom JavaScript code here
                                                                console.log('This is my custom JavaScript code. dark');
                                                            });";
                                            // Enqueue the custom JavaScript code with a high priority for the front end
                                            add_action('wp_enqueue_scripts', function () use ($custom_js) {
                                                wp_add_inline_script('jquery', $custom_js);
                                            }, PHP_INT_MAX);
                                            // Enqueue the custom JavaScript code with a high priority for the admin area
                                            add_action('admin_enqueue_scripts', function () use ($custom_js) {
                                                wp_add_inline_script('jquery', $custom_js);
                                            }, PHP_INT_MAX);
                                        } else {
                                            // Add your custom JavaScript code
                                            $custom_js = "jQuery(document).ready(function($) {
                                                                // Your custom JavaScript code here
                                                                console.log('This is my custom JavaScript code. light');
                                                            });";
                                            // Enqueue the custom JavaScript code with a high priority for the front end
                                            add_action('wp_enqueue_scripts', function () use ($custom_js) {
                                                wp_add_inline_script('jquery', $custom_js);
                                            }, PHP_INT_MAX);

                                            // Enqueue the custom JavaScript code with a high priority for the admin area
                                            add_action('admin_enqueue_scripts', function () use ($custom_js) {
                                                wp_add_inline_script('jquery', $custom_js);
                                            }, PHP_INT_MAX);
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
    </header><!-- #masthead -->
    <?php
}
?>
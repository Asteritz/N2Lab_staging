<?php
$blog_reflection_sticky_header = get_theme_mod('sticky_header_enable', 'on');
if ($blog_reflection_sticky_header == 'on') {
    ?>
    <header id="masthead" class="site-header nav-header header-layout1">
        <?php
        $blog_reflection_enable_top_header = get_theme_mod('header_top_enable', 'on');
        if ($blog_reflection_enable_top_header == 'on') {
            ?>
            <div class="header-one header-top">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                        
                            <div class="col-12 col-auto d-none d-lg-block">
                                <div class="container header-one header-links header-address">
                                    <div class="row align-items-center">
                                    <?php
                                        $blog_reflection_enable_top_right = get_theme_mod('enable_header_one_right_top_section', 'on');
                                        if ($blog_reflection_enable_top_right == 'on') {

                                            $blog_reflection_email_address = get_theme_mod('blog_reflection_email', 'info@mycodecare.com');
                                            $blog_reflection_office_address = get_theme_mod('blog_reflection_office_address', '5 Oliver St, New York, NY 10038, USA');
                                            $blog_reflection_phone_number = get_theme_mod('blog_reflection_phone_number', '+1-212-456-7890');
                                            $enable_disable_header_search_btn = get_theme_mod('enable_bottom_search_section', 'on');
                                            if ($enable_disable_header_search_btn == 'on') {
                                            
                                                $dynamic_cols = 'col-md-8';
                                            }else{
                                                $dynamic_cols = 'col-md-12 text-center';         
                                            }  
                                            ?>
                                        <div class="<?php echo esc_attr($dynamic_cols); ?>">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-phone"></i>
                                                    <a class="top-icon-link"
                                                       href="tel:<?php echo esc_attr($blog_reflection_phone_number); ?>">
                                                        <?php echo esc_html($blog_reflection_phone_number); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fas fa-envelope"></i>
                                                    <a class="top-icon-link"
                                                       href="mailto:<?php echo esc_attr($blog_reflection_email_address); ?>">
                                                        <?php echo esc_html($blog_reflection_email_address); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-location-dot fa-fw"></i>
                                                    <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($blog_reflection_office_address); ?>"
                                                       target="_blank">
                                                        <?php echo esc_html($blog_reflection_office_address); ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php
                                        
                                        }
                                        
                                        $enable_disable_header_search_btn = get_theme_mod('enable_bottom_search_section', 'on');
                                        if ($enable_disable_header_search_btn == 'on') {
                                            $blog_reflection_enable_top_right = get_theme_mod('enable_header_one_right_top_section', 'on');
                                            if ($blog_reflection_enable_top_right == 'on') {
                                                $dynamic_col = 'col-md-4';
                                            }else{
                                                $dynamic_col = 'col-md-12';
                                                $justify_content_center= 'justify-content-center';
                                            }    
                                            ?>
                                            <div class="<?php echo esc_attr($dynamic_col); ?>">
                                                <div class="top-search <?php echo esc_attr($justify_content_center); ?>">
                                                    <?php get_search_form(); ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                           
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
        $blog_reflection_enable_middle_header = get_theme_mod('enable_middle_header', 'on');
        if ($blog_reflection_enable_middle_header == 'on') {
            ?>
            <div class="header-one header-middle">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                        <?php
                        $blog_reflection_enable_middle_right = get_theme_mod('enable_right_section_new', 'on');
                        if ($blog_reflection_enable_middle_right == 'on') {
                            ?>
                            <div class="col-md-3">
                                <div class="header-one header-links">
                                    <p>
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo esc_attr(current_time('l-F j, Y')); ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        
                            $blog_reflection_enable_middle_right = get_theme_mod('enable_right_section_new', 'on');
                            if ($blog_reflection_enable_middle_right == 'on') {
                                $text_left ='text-center';
                            }else{
                                $text_left ='text-left';
                            }
                            ?>
                        <div class="col-md-6  <?php echo esc_attr($text_left); ?>">
                            
                            <div class="header-middle-logo site-branding ">
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
                                        <h2 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a></h2>
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
                        <div class="col-md-3">
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
                                $blog_reflection_icon_settings = get_theme_mod('repeater_middle_section_icon', $blog_reflection_social_defaults);
                                ?>
                                <div class="col-auto">
                                    <div class="header-one header-links">
                                        <ul>
                                            <li class="d-md-block d-none">
                                                <div class="social-btn style3">
                                                    <?php foreach ($blog_reflection_icon_settings as $blog_reflection_icon_setting) : ?>
                                                        <a class="social-icon-head"
                                                           href="<?php echo esc_url($blog_reflection_icon_setting['link_url']); ?>"
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
        <!-- Header Bottom  -->
        <?php
        $blog_reflection_enable_bottom = get_theme_mod('header_bottom_enable', 'on');
        if ($blog_reflection_enable_bottom == 'on') {
            ?>
            <div class="header-one sticky-wrapper">
                <!-- Main Menu Area -->
                <div class="header-bottom">
                    <div class="menu-area">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-6 d-sm-none d-md-none header-logo">
                                    <div>
                                        <?php
                                        if (empty (the_custom_logo())) {
                                            if (is_front_page() && is_home()) {
                                                ?>
                                                <h2 class="site-title">
                                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                        <?php bloginfo('name'); ?>
                                                    </a>
                                                </h2>
                                            <?php }
                                        } else {
                                            ?>
                                            <h2 class="site-title">
                                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                    <?php bloginfo('name'); ?>
                                                </a>
                                            </h2>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-lg-10 col-xl-10 mt-0">
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
                                    <div class="d-flex justify-content-sm-end justify-content-end">
                                        <div class="navbar-right d-inline-flex d-lg-none">
                                            <div class="theme-switcher">
                                                <button>
                                                    <i class="fas fa-sun icon-sun"></i>
                                                    <i class="fas fa-moon icon-moon"></i>
                                                </button>
                                            </div>
                                            <button type="button" class="menu-toggle icon-btn"><i
                                                        class="fas fa-bars"></i>
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
                                                            <a class="light-logo remove-text-decoration"
                                                               href="<?php echo esc_url(home_url()); ?>">
                                                                <img class="mobile-menu-logo"
                                                                     src="<?php echo esc_url($logo[0]) ?>"
                                                                     alt="<?php bloginfo('name') ?>"
                                                                     style="width: <?php echo esc_attr($width) ?>; height: <?php esc_attr($height) ?>;">
                                                            </a>
                                                            <a class="dark-logo remove-text-decoration"
                                                               href="<?php echo esc_url(home_url()); ?>">
                                                                <img class="mobile-menu-logo"
                                                                     src="<?php echo esc_url($darkLogoUrl) ?>"
                                                                     alt="<?php bloginfo('name') ?>"
                                                                     style="width: <?php echo esc_attr($width) ?>; height: <?php esc_attr($height) ?>;">
                                                            </a>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <h2 class="site-title">
                                                            <a class="remove-text-decoration"
                                                               href="<?php echo esc_url(home_url('/')) ?>" rel="home">
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
                                                            'container' => false,
                                                            'theme_location' => 'primary-menu',
                                                            'menu_id' => 'primary-menu',
                                                            'menu_class' => 'sf-menu',
                                                            'fallback_cb' => 'blog_reflection_primary_navigation_fallback',
                                                        )
                                                    );
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Mobile menu  toggle ends -->
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1 col-lg-2 col-xl-2  d-none d-lg-block">
                                    <div class="header-button">
                                        <?php
                                        $blog_reflection_light_dark = get_theme_mod('enable_header_one_light_dark_section', 'on');
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
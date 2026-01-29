<?php
// Add a section for Blog Reflection Ads
Kirki::add_section('blog_reflection_ads', array(
    'title'    => esc_html__('Blog Reflection Ads', 'blog-reflection'),
    'panel'    => 'front-page-settings',
));

// Middle Top Ads Section
// Enable/Disable Middle Top Ad
new \Kirki\Field\Checkbox_Switch([
    'settings'    => 'middle_top_ad_enable',
    'label'       => esc_html__('Enable Middle Top Ads', 'blog-reflection'),
    'section'     => 'blog_reflection_ads',
    'default'     => 'on',
    'choices'     => [
        'on'  => esc_html__('Enable', 'blog-reflection'),
        'off' => esc_html__('Disable', 'blog-reflection'),
    ],
]);

// Middle Top Ad Image
new \Kirki\Field\Image([
    'settings'    => 'middle_top_ad_image',
    'label'       => esc_html__('Middle Top Ad Image', 'blog-reflection'),
    'description' => esc_html__('Ad images recommended size (615 x 69 Px)', 'blog-reflection'),
    'section'     => 'blog_reflection_ads',
    'active_callback' => [
        [
            'setting'  => 'middle_top_ad_enable',
            'operator' => '==',
            'value'    => true,
        ],
    ],
    'default'     => get_template_directory_uri() . '/assets/images/ads/ad2.jpg',
]);

// Middle Top Ad URL for Pro Version
new \Kirki\Field\Radio_Image([
    'settings'    => 'middle_top_ad_image_url_pro',
    'label'       => esc_html__('Middle Top Ads URL (Pro Version Only)', 'blog-reflection'),
    'description' => blogreflection_purchase_link(),
    'section'     => 'blog_reflection_ads',
    'default'     => '',
    'transport'   => 'auto',
    'choices'     => [
        'sticker_pro_img' => get_template_directory_uri() . '/assets/images/pro/middle-top-url.jpg',
    ],
    'active_callback' => [
        [
            'setting'  => 'middle_ad_enable',
            'operator' => '==',
            'value'    => true,
        ],
    ],
]);

// Middle Ads Section
// Enable/Disable Middle Ads
new \Kirki\Field\Checkbox_Switch([
    'settings'    => 'middle_ad_enable',
    'label'       => esc_html__('Enable Middle Ads Section', 'blog-reflection'),
    'section'     => 'blog_reflection_ads',
    'default'     => 'on',
    'choices'     => [
        'on'  => esc_html__('Enable', 'blog-reflection'),
        'off' => esc_html__('Disable', 'blog-reflection'),
    ],
]);

// Middle Ad Image
new \Kirki\Field\Image([
    'settings'    => 'middle_ad_image',
    'label'       => esc_html__('Home One Middle Ad Image', 'blog-reflection'),
    'description' => esc_html__('Ad images recommended size (615 x 69 Px)', 'blog-reflection'),
    'section'     => 'blog_reflection_ads',
    'active_callback' => [
        [
            'setting'  => 'middle_ad_enable',
            'operator' => '==',
            'value'    => true,
        ],
    ],
    'default'     => get_template_directory_uri() . '/assets/images/ads/ad3.jpg',
]);

// Middle Ad URL for Pro Version
new \Kirki\Field\Radio_Image([
    'settings'    => 'middle_ad_image_url_pro',
    'label'       => esc_html__('Middle Ads URL (Pro Version Only)', 'blog-reflection'),
    'description' => blogreflection_purchase_link(),
    'section'     => 'blog_reflection_ads',
    'default'     => '',
    'transport'   => 'auto',
    'choices'     => [
        'sticker_pro_img' => get_template_directory_uri() . '/assets/images/pro/middle-ads-url.jpg',
    ],
    'active_callback' => [
        [
            'setting'  => 'middle_ad_enable',
            'operator' => '==',
            'value'    => true,
        ],
    ],
    'partial_refresh' => [
        'middle_ads_title_refresh' => [
            'selector'        => '.middle-ads-banner-edit',
            'render_callback' => 'blog_reflection_customizer_middle_top_ads_quick_edit',
        ],
    ],
]);

// Middle Bottom Ads Section
// Enable/Disable Middle Bottom Ads
new \Kirki\Field\Checkbox_Switch([
    'settings'    => 'middle_bottom_ads_enable',
    'label'       => esc_html__('Enable Middle Bottom Ads', 'blog-reflection'),
    'section'     => 'blog_reflection_ads',
    'default'     => 'on',
    'choices'     => [
        'on'  => esc_html__('Enable', 'blog-reflection'),
        'off' => esc_html__('Disable', 'blog-reflection'),
    ],
]);

// Middle Bottom Ad Image
new \Kirki\Field\Image([
    'settings'    => 'middle_bottom_ads_two_image',
    'label'       => esc_html__('Middle Bottom Ad Image', 'blog-reflection'),
    'description' => esc_html__('Ad images recommended size (615 x 69 Px)', 'blog-reflection'),
    'section'     => 'blog_reflection_ads',
    'active_callback' => [
        [
            'setting'  => 'middle_bottom_ads_enable',
            'operator' => '==',
            'value'    => true,
        ],
    ],
    'default'     => get_template_directory_uri() . '/assets/images/ads/ad4.jpg',
]);

// Middle Bottom Ad URL for Pro Version
new \Kirki\Field\Radio_Image([
    'settings'    => 'middle_bottom_ads_image_url_pro',
    'label'       => esc_html__('Middle Bottom Ads URL (Pro Version Only)', 'blog-reflection'),
    'description' => blogreflection_purchase_link(),
    'section'     => 'blog_reflection_ads',
    'default'     => '',
    'transport'   => 'auto',
    'choices'     => [
        'sticker_pro_img' => get_template_directory_uri() . '/assets/images/pro/middle-bottom-url.jpg',
    ],
    'active_callback' => [
        [
            'setting'  => 'middle_bottom_ads_enable',
            'operator' => '==',
            'value'    => true,
        ],
    ],
    'partial_refresh' => [
        'middle_bottom_ads_title_refresh' => [
            'selector'        => '.middle-bottom-ads-banner-edit',
            'render_callback' => 'blog_reflection_customizer_middle_bottom_ads_quick_edit',
        ],
    ],
]);

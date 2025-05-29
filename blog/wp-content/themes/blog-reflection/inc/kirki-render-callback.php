<?php
function blog_reflection_customizer_discover_post_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('discover_post_section_title', 'Discover Post');

    // Return the updated title.
    return esc_html($news_title_content).'</h2>';
}
function blog_reflection_customizer_latest_blog_post_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('latest_blog_post_section_title', 'Latest Blog Post');

    // Return the updated title.
    return esc_html($news_title_content).'</h2>';
}
function blog_reflection_customizer_future_perfect_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('future_perfect_post_section_title', 'Future Perfect');

    // Return the updated title.
    return esc_html($news_title_content);
}

function blog_reflection_customizer_global_post_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('global_post_section_title', __('Global Post', 'blog-reflection'));

    // Return the updated title.
    return esc_html($news_title_content).'</h2>';
}

function blog_reflection_customizer_most_popular_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('most_popular_post_section_title', __('Most Popular Post', 'blog-reflection'));

    // Return the updated title.
    return '<h2 class="sec-title h3 text-center">'.esc_html($news_title_content).'</h2>';
}

function blog_reflection_customizer_top_post_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('top_post_section_title', __('Today Top Post', 'blog-reflection'));

    // Return the updated title.
    return '<h2 class="sec-title h3 text-center">'.esc_html($news_title_content);
}

function blog_reflection_customizer_tranding_stories_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('trending_stories_section_title', __('Today Trending Stories', 'blog-reflection'));

    // Return the updated title.
    return esc_html($news_title_content);
}

function blog_reflection_customizer_video_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('video_section_title', __('Trending Video', 'blog-reflection'));

    // Return the updated title.
    return esc_html($news_title_content);
}
function blog_reflection_weekend_post_customizer_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('weekend_top_post_section_title', __('Weekend Top', 'blog-reflection'));

    // Return the updated title.
    return esc_html($news_title_content);
}


function blog_reflection_customizer_what_new_quick_edit() {
    // Retrieve the updated title from the Customizer setting.
    $news_title_content = get_theme_mod('home_one_whats_new_title', __('Whats New Title', 'blog-reflection'));

    // Return the updated title.
    return esc_html($news_title_content);
}
function blog_reflection_copyright_customizer_quick_edit() {
    // Retrieve the updated title from the Customizer setting.

    $copyRight = get_theme_mod('copyright_setting', __('© Copyright 2014-[Y] Blog Reflection. All rights reserved.', 'blog-reflection'));
    $copyRight = str_replace("[Y]",date("Y"),$copyRight);

    // Return the updated title.
    return esc_html($copyRight);
}

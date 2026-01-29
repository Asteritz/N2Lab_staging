<?php
// Register Recent and Trending Post widget
require_once BLOG_REFLECTION_INC_DIR . 'widget/recent-post-trending-post.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound


// social media widget register 
require_once BLOG_REFLECTION_INC_DIR . 'widget/social-follow.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound


// social follow widget register 
require_once BLOG_REFLECTION_INC_DIR . 'widget/social-media-widget.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound


// Advertising widget register 
require_once BLOG_REFLECTION_INC_DIR . 'widget/advertising-widget.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound



// Register and load the widget
function blogreflection_recent_trending_post_load_widget()
{   
    
    // Register Tranding Post the widget
    register_widget('blogreflection_recent_trending_post');
   

    // Register social media widget

    register_widget('blogreflection_social_media_widget'); 


     // Register social media follow widget

    register_widget('blogreflection_social_follow_widget');


    // Register Advertising widget

    register_widget('blogreflection_advertising_widget');

    
}

add_action('widgets_init', 'blogreflection_recent_trending_post_load_widget');
<?php
Kirki::add_config( 'theme_config', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );
//Free version code
if (!class_exists('Blog_Reflection_Pro')) {

// free theme code
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/front-page-settings.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/blog-hero.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/latest-blog-post.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/trending-stories.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/most-popular-news.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/blog-reflection-ads.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/blog-post.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/tending-video.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/whats-new.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/trend-slider-post.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/future-perfect.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/global-post.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/free/front-page/weekend-post.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

}

/**
 * General Options for header
 */
// Assuming BLOG_REFLECTION_INC_DIR is defined and points to the includes directory.
if (!class_exists('Blog_Reflection_Pro')) {
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/header/header-one/header-settings.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/header/header-one/header-top.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/header/header-one/header-middle.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/header/header-one/header-bottom.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

}
/**
 * General Options for footer
 */
if (!class_exists('Blog_Reflection_Pro')) {
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/footer/footer-settings.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
}
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/footer/footer-typography.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
if (!class_exists('Blog_Reflection_Pro')) {
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/footer/footer-copyright.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
}
/**
 * Theme setting Options
 */
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/options-kirki/options-kirki.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/options-kirki/theme-typography.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/options-kirki/theme-general.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/options-kirki/blog-options.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound


/**
 * Page layout settings
 */
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-page-layout-settings.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound


/**
 * Page layout Options
 */
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-blog-options.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-page-options.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-archive-options.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-error-options.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-page-layout-settings.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-search-options.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require BLOG_REFLECTION_INC_DIR . 'kirki-customize/page-layout/blog-reflection-single-page-options.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

/**
 * Theme setting Options
 */
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/shop/shop.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/shop/shop-page.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once BLOG_REFLECTION_INC_DIR . 'kirki-customize/shop/single-shop.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
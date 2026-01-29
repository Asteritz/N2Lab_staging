<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BLOG_REFLECTION
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
<?php
$body_typography = get_theme_mod('body_typography', array('font-family' => 'Outfit'));

if (is_array($body_typography) && isset($body_typography['font-family'])) {
    $font_family = esc_attr($body_typography['font-family']);
} else {
    $font_family = 'Outfit'; // Provide a default font family if not set
}
$blog_reflection_body_font = 'font-family:' . esc_attr($font_family);
?>
<body <?php body_class(); ?> style="<?php echo esc_attr($blog_reflection_body_font); ?>">
<?php
$blog_reflection_loder_enable_disable = get_theme_mod('preloader_options', 'off');
if ($blog_reflection_loder_enable_disable == 'on') {
    ?>
    <div class="preloader ">
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div>
    <?php
}
?>
    <!-- Preloader code  Ends-->
    <!-- subscribs popup start  -->
<?php
$blog_reflection_subscribe_popup_form_enable_disable = get_theme_mod('popup_subscribe_options', 'off');

if ($blog_reflection_subscribe_popup_form_enable_disable == 'on') {

    $blog_reflection_subscribe_popup_form_title = get_theme_mod('popup_subscribe_form_title', 'Subscribe');
    $blog_reflection_subscribe_form_description = get_theme_mod('popup_subscribe_form_text', 'Sign up to get update about us. Dont be hasitate your email is safe.');
    $blog_reflection_subscribe_form_check_text = get_theme_mod('popup_subscribe_form_checkbox_text', 'I dont want to see this popup again.');
    $popup_newsletter_shortcode = get_theme_mod('popup_newsletter_shortcode', '[contact-form-7 id="58d" title="Contact form 1"]');
    ?>
    <div class="popup-subscribe-area">
        <div class="container">
            <div class="popup-subscribe">
                <div class="box-content">
                    <button class="simple-icon popupClose"><i class="fas fa-times"></i></button>
                    <div class="widget newsletter-widget footer-widget">
                        <h3 class="widget_title"><?php echo esc_html($blog_reflection_subscribe_popup_form_title) ?></h3>
                        <p class="footer-text"> <?php echo esc_html($blog_reflection_subscribe_form_description) ?></p>
                        <form class="newsletter-form">
                            <?php
                            if (!empty($popup_newsletter_shortcode)) {
                                echo wp_kses_post(do_shortcode($popup_newsletter_shortcode));
                            }
                            ?>
                            <button type="submit" class="icon-btn"><i class="fas fa-paper-plane"></i></button>
                        </form>
                        <div class="mt-30">
                            <input type="checkbox" id="destroyPopup">
                            <label for="destroyPopup"><?php echo esc_html($blog_reflection_subscribe_form_check_text) ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- subscribs popup ends  -->
<?php $blog_reflection_theme_color_mode = get_theme_mod('default_color_mode', 'light'); ?>
<?php
if ($blog_reflection_theme_color_mode == 'dark') {
    blog_reflection_call_dark_mode();
    ?>
<?php } ?>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#primary"><?php esc_html_e('Skip to content', 'blog-reflection'); ?></a>
<?php
do_action('blog_reflection_mobile_menu_hook');
get_template_part('inc/header/header-' . '' . get_theme_mod('select_header', 'one') . '');
?>


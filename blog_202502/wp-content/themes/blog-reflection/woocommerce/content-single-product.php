<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;
global $product;
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo esc_html(get_the_password_form()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    return;
}
$blog_reflection_enable_single_product_summary = get_theme_mod('enable_single_product_summary_section', 'on');
$blog_reflection_enable_product_about = get_theme_mod('enable_product_about_section', 'on');
$blog_reflection_single_product_details_class = 'col-xl-5';
$blog_reflection_product_about_class = 'col-xl-7';
if ($blog_reflection_enable_single_product_summary == true & $blog_reflection_enable_product_about == false) {
    $blog_reflection_single_product_details_class = 'col-xl-7';
} elseif ($blog_reflection_enable_single_product_summary == false & $blog_reflection_enable_product_about == true) {
    $blog_reflection_product_about_class = 'col-xl-5';
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="row mt-5">
        <div class="<?php echo esc_attr($blog_reflection_single_product_details_class); ?>">
            <?php $attachment_ids = $product->get_gallery_image_ids();
            if (!empty($attachment_ids)) : ?>
                <div class="woo-product-big-img">
                    <?php foreach ($attachment_ids as $woo_pro_large) : ?>
                        <div class="woo-spimg">
                            <a href="<?php echo esc_url(wp_get_attachment_image_url($woo_pro_large, 'large'));
                             // Get the post thumbnail ID
                            $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            if(get_the_post_thumbnail_url()){
                                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                            }
                            else{
                                $alt_text = 'No Image';
                            }
                            ?>">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url($woo_pro_large, 'large')); ?>"
                                     alt="<?php echo esc_attr($alt_text); ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="woo-product-small-img">
                    <?php foreach ($attachment_ids as $woo_pro_small) : ?>
                        <div class="woo-sspimg">
                            <img src="<?php echo esc_html(wp_get_attachment_image_url($woo_pro_small, 'thumbnail'));
                             // Get the post thumbnail ID
                            $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            if(get_the_post_thumbnail_url()){
                                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                            }
                            else{
                                $alt_text = 'No Image';
                            }
                            ?>" alt="<?php echo esc_attr($alt_text); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : the_post_thumbnail('large'); endif; ?>
        </div>
        <div class="<?php echo esc_attr($blog_reflection_product_about_class); ?>">
            <div class="product-about">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action('woocommerce_single_product_summary');
                ?>
            </div>
        </div>
        <div class="product-tab-area">
            <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action('woocommerce_after_single_product_summary');
            ?>
        </div>
    </div>
</div>
<?php do_action('woocommerce_after_single_product');
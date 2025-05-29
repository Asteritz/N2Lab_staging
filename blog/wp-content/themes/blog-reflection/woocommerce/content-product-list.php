<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<li <?php wc_product_class('', $product); ?>>
    <div class="product-card list-view">
        <div class="product-img">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
        </div>
        <div class="product-content">
            <span class="price"><?php woocommerce_template_loop_price(); ?></span>
            <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
            </div>
            <p class="product-text">
                <?php the_excerpt(); ?>
            </p>
            <div class="btn-wrap">
                <?php woocommerce_template_loop_add_to_cart(); ?>
            </div>
        </div>
    </div>

</li>

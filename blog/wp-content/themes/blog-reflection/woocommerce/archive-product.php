<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

?>
    <div class="container">
    </div>
    </div>
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
$blog_reflection_enable_shop_page_slider= get_theme_mod('shop_page_layout', 'rtl');
?>
    <div class="shop-area space-extra-bottom">
        <div class="container">
            <div class="row gx-40 ml-5">
            <?php
            /**
             * Hook: woocommerce_sidebar.
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            ?>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $blog_reflection_enable_shop_page_slider == 'ltl'  ) : ?>
                <div class="col-md-4 col-xl-4 col-lg-4 mt-3">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            <?php endif; ?>

            <?php
                if($blog_reflection_enable_shop_page_slider == 'no-sidebar'){
                    ?>
                        <div class="col-12">
                    <?php
                }
                else{
                    ?>
                        <div class="col-xxl-8 col-lg-7">
                    <?php
                }
            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="shop-sort-bar">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md">
                                    <?php
                                    /**
                                     * Hook: woocommerce_before_shop_loop.
                                     *
                                     * @hooked woocommerce_output_all_notices - 10
                                     * @hooked woocommerce_result_count - 20
                                     * @hooked woocommerce_catalog_ordering - 30
                                     */
                                    do_action('woocommerce_before_shop_loop');
                                    ?>
                                </div>

                                <div class="col-md-auto">
                                    <div class="nav shop-navbar">
                                        <a href="#" class="active" id="tab-shop-grid" data-bs-toggle="tab"
                                        data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid"
                                        aria-selected="true">
                                            <i class="fas fa-th"></i>
                                        </a>
                                        <a href="#" id="tab-shop-list" data-bs-toggle="tab" data-bs-target="#tab-list"
                                        role="tab" aria-controls="tab-grid" aria-selected="false">
                                            <i class="fas fa-list"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="tab-content mb-30" id="nav-tabContent">
                    <!-- Grid -->
                    <div class="tab-pane fade show active" id="tab-grid" role="tabpanel"
                         aria-labelledby="tab-shop-grid">
                        <div class="shop-grid-area">
                            <div class="row gy-30">
                                <?php
                                if (woocommerce_product_loop()) {
                                    woocommerce_product_loop_start();
                                    if (wc_get_loop_prop('total')) {
                                        while (have_posts()) {
                                            the_post();
                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action('woocommerce_shop_loop');

                                            wc_get_template_part('content', 'product');
                                        }
                                    }
                                    woocommerce_product_loop_end();
                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action('woocommerce_after_shop_loop');
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action('woocommerce_no_products_found');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- List -->
                    <style>
                        .shop-list-area .row ul.products > li {
                            width: 100%;
                        }
                    </style>
                    <div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">
                        <div class="shop-list-area">
                            <div class="row gy-30">
                                <?php
                                if (woocommerce_product_loop()) {
                                    woocommerce_product_loop_start();
                                    if (wc_get_loop_prop('total')) {
                                        while (have_posts()) {
                                            the_post();
                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action('woocommerce_shop_loop');

                                            wc_get_template_part('content', 'product-list');
                                        }
                                    }
                                    woocommerce_product_loop_end();

                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action('woocommerce_after_shop_loop');
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action('woocommerce_no_products_found');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            /**
            * Hook: woocommerce_sidebar.
            *
            * @hooked woocommerce_get_sidebar - 10
            */
            ?>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $blog_reflection_enable_shop_page_slider == 'rtl' ) : ?>
                <div class="col-md-4 col-xl-4 col-lg-4 mt-3">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer('shop');

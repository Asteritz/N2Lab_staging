<?php $blog_reflection_footer = get_theme_mod('footer_enable', 'on');
if ($blog_reflection_footer == 'on') {
    ?>
    </div>
    <footer id="colophon" class="footer-wrapper footer-layout2 overflow-hidden"
            data-bg-src="<?php echo esc_url(get_template_directory_uri() . "/assets/images/footer-bg.png"); ?>">
        <div class="container">
            <div class="widget-area partial-refresh-footer">
                <div class="row justify-content-between">
                    <?php if (is_active_sidebar('footer-one')) : ?>
                        <div class="col-md-3 col-lg-3 col-xl-3 text-color-changer">
                            <?php dynamic_sidebar('footer-one'); ?>
                        </div><!-- .widget-area -->
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-two')) : ?>
                        <div class="col-md-3 col-xl-3 col-lg-3 text-color-changer">
                            <?php dynamic_sidebar('footer-two'); ?>
                        </div><!-- .widget-area -->
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-three')) : ?>
                        <div class="col-md-3 col-xl-3 col-lg-3 text-color-changer">
                            <?php dynamic_sidebar('footer-three'); ?>
                        </div><!-- .widget-area -->
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-four')) : ?>
                        <div class="col-md-3 col-xl-3 col-lg-3 text-color-changer">
                            <?php dynamic_sidebar('footer-four'); ?>
                        </div><!-- .widget-area -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
        // footer bottom
        require_once BLOG_REFLECTION_INC_DIR . 'footer/footer-bottom/footer-bottom-two.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        ?>
    </footer>
    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                  style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>
    <?php
}
?>



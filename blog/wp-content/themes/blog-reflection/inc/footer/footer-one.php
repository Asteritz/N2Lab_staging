<?php
    do_action('blog_reflection_subscribe');
?>
</div>
<?php $blog_reflection_footer = get_theme_mod('footer_enable', 'on');
if ($blog_reflection_footer == 'on') {
    ?>
    <footer id="colophon" class="site-footer footer-wrapper footer-typography-settings footer-layout1 overflow-hidden">
        <?php if (is_active_sidebar('footer-one') || is_active_sidebar('footer-two') || is_active_sidebar('footer-three') || is_active_sidebar('footer-four')) : ?>
            <div class="container">
                <div class="widget-area partial-refresh-footer">
                    <div class="row justify-content-between">
                        <?php if (is_active_sidebar('footer-one')) : ?>
                            <div class="col-md-3 col-xl-3 col-lg-3 text-color-changer">
                                <?php dynamic_sidebar('footer-one'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (is_active_sidebar('footer-two')) : ?>
                            <div class="col-md-3 col-xl-3 col-lg-3 text-color-changer">
                                <?php dynamic_sidebar('footer-two'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (is_active_sidebar('footer-three')) : ?>
                            <div class="col-md-3 col-xl-3 col-lg-3 text-color-changer">
                                <?php dynamic_sidebar('footer-three'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (is_active_sidebar('footer-four')) : ?>
                            <div class="col-md-3 col-xl-3 col-lg-3 text-color-changer">
                                <?php dynamic_sidebar('footer-four'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        // footer bottom
        require_once BLOG_REFLECTION_INC_DIR . 'footer/footer-bottom/footer-bottom-one.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        ?>
    </footer>
    <?php
    $blog_reflection_scroll_top_enable_disable = get_theme_mod('bottom_to_top', 'on');
    if ($blog_reflection_scroll_top_enable_disable == 'on') {
        ?>
        <div class="scroll-top">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                      style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
            </svg>
        </div>
        <?php
    }
}
?>
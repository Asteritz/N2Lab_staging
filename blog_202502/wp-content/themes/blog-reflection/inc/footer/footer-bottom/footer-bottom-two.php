<div class="copyright-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto align-self-center">
                <p class="copyright-text text-center">
                    <?php
                        $blog_reflection_powered_by =  sprintf( esc_html__( '| Blog Reflection Theme by %s', 'blog-reflection' ),
                            '<a target="_blank" rel="dofollow" href="'. esc_url( 'https://mycodecare.com/blog-reflection' ) .'">MyCodeCare</a>' );
                        $blog_reflection_copyright = get_theme_mod( 'copyright_setting', 'Proudly powered by WordPress ');
                        $blog_reflection_copyright = str_replace('[Y]', date("Y"), $blog_reflection_copyright);
                        echo esc_html($blog_reflection_copyright);

						$powerby_hide_show_control = get_theme_mod('powerby_hide_show_control' , 'on');
						if($powerby_hide_show_control == 'on'){
                        echo wp_kses_post( $blog_reflection_powered_by );
						}
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
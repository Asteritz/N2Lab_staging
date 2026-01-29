<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blog_Reflection
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blog_reflection_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'blog_reflection_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blog_reflection_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'blog_reflection_pingback_header' );


/** 
 *  Fallback for primary navigation.
 */
if( ! function_exists( 'blog_reflection_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function blog_reflection_primary_navigation_fallback() {
		echo '<ul>';
			echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' .esc_html__( 'Home', 'blog-reflection' ). '</a></li>';
			wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
			) );
		echo '</ul>';
	}
endif;


/**
 * Purchase Link
 */

 if ( ! function_exists( 'blogreflection_purchase_link' ) ) {
    function blogreflection_purchase_link() {
        $blogreflection_purchase = 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/';
        $blog_reflection_description = sprintf(
            __( 'Purchase the Pro Version for More Features. <a href="%s" target="_blank" class="Purchase-links">Purchase Now</a>', 'blog-reflection' ),
            esc_url( $blogreflection_purchase )
        );
        return $blog_reflection_description;
    }
}


// get letest post function
function blog_reflection_get_latest_posts() {
    $blog_reflection_args = array(
        'numberposts' => -1, // Fetch all posts
        'post_type'   => 'post'
    );
    $blog_reflection_posts = get_posts( $blog_reflection_args );

    $blog_reflection_choices = array();
    foreach ( $blog_reflection_posts as $blog_reflection_post ) {
        $blog_reflection_choices[ $blog_reflection_post->ID ] = get_the_title( $blog_reflection_post->ID );
    }
    return $blog_reflection_choices;
}


//Admin notice
function blog_reflection_admin_notice() {
    // Check if the notification should be hidden
    $hide_notice = isset($_COOKIE['blog_reflection_admin_notice']) ? intval($_COOKIE['blog_reflection_admin_notice']) : 0;
    $blog_reflection_ads_banner_img =  get_template_directory_uri() . '/assets/images/ads/upgrade-pro.jpg';
  // Get current admin page URL
  $current_screen = get_current_screen();
  $blog_reflection_ad_url = home_url() . '/wp-admin/admin.php?page=blog-reflection-addons';
  
  // Check if we are on the 'blog-reflection-addons' page
  $is_blog_reflection_addons_page = isset($_GET['page']) && $_GET['page'] === 'blog-reflection-addons';

    $pro_plan_link = 'https://checkout.freemius.com/mode/dialog/plugin/16758/plan/27963/';
    if (!$hide_notice && !$is_blog_reflection_addons_page) {
        ?>
        <div id="blog-reflection-admin-notice" class="notice is-dismissible">
            <br>
            <a href="<?php echo esc_url($pro_plan_link);?>"><img src="<?php echo esc_url($blog_reflection_ads_banner_img); ?>" width="100%" alt="Blog Reflection"></a>
            <br>
        </div>
        <?php
    }
}

if (!class_exists('Blog_Reflection_Pro')) {
    add_action('admin_notices', 'blog_reflection_admin_notice');
    add_action('admin_footer', 'blog_reflection_admin_notice_script');
}

function blog_reflection_admin_notice_script() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#blog-reflection-admin-notice').on('click', '.notice-dismiss', function() {
                // Set a cookie to hide the notice for 3 days
                var date = new Date();
                date.setTime(date.getTime() + (3 * 24 * 60 * 60 * 1000));// 3 days in milliseconds
                document.cookie = "blog_reflection_admin_notice=1; expires=" + date.toUTCString() + "; path=/";
            });
        });
    </script>
    <?php
}

    
function blog_reflection_before_content_import( $selected_import ) {
    // Get the list of demos from blog_reflection_demo_import_lists
    $demo_lists = blog_reflection_demo_import_lists();

    // Loop through the demo list to match the selected import demo
    foreach ( $demo_lists as $demo_key => $demo_data ) {
        if ( isset( $selected_import['import_file_name'] ) && $selected_import['import_file_name'] === $demo_data['title'] ) {
            // Check if the post with slug 'hello-world' exists and delete it
            $post = get_page_by_path( 'hello-world', OBJECT, 'post' );
            if ( $post ) {
                wp_delete_post( $post->ID, true ); // True to bypass trash and delete permanently
            }
            break; // Break once the match is found and action is performed
        }
    }
}
add_action( 'advanced_import_demo_lists/before_content_import', 'blog_reflection_before_content_import' );


function blog_reflection_custom_post_format_script() {
    ?>
    <script>
        jQuery(document).ready(function($){
            // Function to show/hide elements based on selected post format
            function showHideElements() {
                var selectedFormat = $('#post-format-select').val(); // Get selected post format
                // Show or hide elements based on selected format
                if (selectedFormat == 'video') {
                    $('.video-fields').show(); // Show video fields
                    $('.image-gallery-fields').hide(); // Hide image gallery fields
                } else if (selectedFormat == 'gallery') {
                    $('.video-fields').hide(); // Hide video fields
                    $('.image-gallery-fields').show(); // Show image gallery fields
                } else {
                    $('.video-fields').hide(); // Hide video fields
                    $('.image-gallery-fields').hide(); // Hide image gallery fields
                }
            }
            // Call the function initially to set the initial state
            showHideElements();

            // Call the function whenever the post format select option changes
            $('#post-format-select').on('change', function(){
                showHideElements();
            });
        });
    </script>
    <?php
}


/**
 * Add span tag in archive list count number
 */
function blog_reflection_span_archive_count( $blog_reflection_links ) {
    $blog_reflection_links = str_replace( '</a>&nbsp;(', '</a> <span class="post-count-number">(', $blog_reflection_links );
    $blog_reflection_links = str_replace( ')', ')</span>', $blog_reflection_links );
    return $blog_reflection_links;
}

add_filter( 'get_archives_link', 'blog_reflection_span_archive_count' );

/**
 * Add span tag in category list count number
 */
function blog_reflection_span_category_count( $blog_reflection_links ) {
    $blog_reflection_links = str_replace( '</a> (', '</a> <span class="post-count-number">(', $blog_reflection_links );
    $blog_reflection_links = str_replace( ')', ')</span>', $blog_reflection_links );
    return wp_kses_post($blog_reflection_links);
}
add_filter( 'wp_list_categories', 'blog_reflection_span_category_count' );

// author social media share code
function blog_reflection_custom_social_media_share() {
    global $post;
    $blog_reflection_post_url = urlencode(get_permalink($post->ID));
    $blog_reflection_post_title = urlencode(get_the_title($post->ID));
    $blog_reflection_fb_url= "https://www.facebook.com/sharer.php?u=".$blog_reflection_post_url;
    $blog_reflection_tw_url= "https://twitter.com/share?url=".$blog_reflection_post_url."&text=".$blog_reflection_post_title;
    $blog_reflection_in_url= "https://www.linkedin.com/shareArticle?mini=true&url=".$blog_reflection_post_url."&title=".$blog_reflection_post_title;
    $blog_reflection_inst_url= "https://www.instagram.com/?url=".$blog_reflection_post_url;
    ?>
    <div class="social-media-share">
        <ul>
            <li>
                <a href="<?php echo esc_url($blog_reflection_fb_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
                <a href="<?php echo esc_url($blog_reflection_tw_url); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
            </li>
            <li><a href="<?php echo esc_url($blog_reflection_in_url); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="<?php echo esc_url($blog_reflection_inst_url); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
    <?php
}

// get the user role 
function get_user_role($blog_reflection_user_id) {
    $blog_reflection_user = get_userdata($blog_reflection_user_id);
    return $blog_reflection_user ? $blog_reflection_user->roles : array();
}

// Mobile Menu Register
function blog_reflection_register_mobile_menu() {
    register_nav_menu('mobile-menu',__( 'Mobile Menu', 'blog-reflection' ));
}
add_action( 'init', 'blog_reflection_register_mobile_menu' );

function blog_reflection_text_domain_theme_setup() {
    load_theme_textdomain('blog-reflection', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'blog_reflection_text_domain_theme_setup');


function blog_reflection_call_dark_mode()
{
    ?>
    <script>
        //  light and dark theme changer js code

        jQuery("html").addClass("dark-theme").attr("data-theme", "dark");
        jQuery('.theme-switcher').addClass('active');

    </script>
    <?php
}

function blog_reflection_search_form_with_icon( $form ) {
    $form = '<form method="get" class="search-form" action="' . home_url( '/' ) . '">
            <div class="form-div">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                </label>
                <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
            </div>
        </form>';
    return $form;
}
add_filter( 'get_search_form', 'blog_reflection_search_form_with_icon' );
<?php
/**
 * Blog Reflection functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog_Reflection
 */


if ( ! function_exists( 'blog_reflection_br_fs' ) ) {
    // Create a helper function for easy SDK access.
    function blog_reflection_br_fs() {
        global $blog_reflection_br_fs;

        if ( ! isset( $blog_reflection_br_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $blog_reflection_br_fs = fs_dynamic_init( array(
                'id'                  => '16757',
                'slug'                => 'blog-reflection',
                'premium_slug'        => 'blog-reflection-add-ons-premium',
                'type'                => 'theme',
                'public_key'          => 'pk_85d6822bc7e73a689caeadce6213f',
                'is_premium'          => false,
                'has_addons'          => true,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'blog-reflection',
                    'support'        => false,
                ),
            ) );
        }

        return $blog_reflection_br_fs;
    }

    // Init Freemius.
    blog_reflection_br_fs();
    // Signal that SDK was initiated.
    do_action( 'blog_reflection_br_fs_loaded' );
}



 if ( !defined( 'BLOG_REFLECTION_VERSION' ) ) {
    $blog_reflection_theme = wp_get_theme();
    define( 'BLOG_REFLECTION_VERSION', $blog_reflection_theme->get( 'Version' ) );
}

// Inc folder directory
define( 'BLOG_REFLECTION_INC_DIR', get_template_directory() . '/inc/' );

/*
 * Customizer Pro
 */
require_once get_template_directory() . '/customize-pro/class-customize.php';


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blog_reflection_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Blog Reflection, use a find and replace
		* to change 'blog-reflection' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blog-reflection', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );


	// This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu', 'blog-reflection'),
            // Add more menu locations as needed
            'footer' => esc_html__( 'Footer Menu', 'blog-reflection' ),
        )
    );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'blog_reflection_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

    add_theme_support(
        'post-formats',
        array(
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio')
    );

}

add_action( 'after_setup_theme', 'blog_reflection_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_reflection_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blog_reflection_content_width', 640 );
}
add_action( 'after_setup_theme', 'blog_reflection_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_reflection_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'blog-reflection' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add sidebar widgets here.', 'blog-reflection' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
		array(
			'name'          => esc_html__( 'Whatnew Sidebar', 'blog-reflection' ),
			'id'            => 'whatnew-sidebar',
			'description'   => esc_html__( 'Add sidebar widgets here.', 'blog-reflection' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Future Perfect Sidebar', 'blog-reflection' ),
			'id'            => 'future-perfect-sidebar',
			'description'   => esc_html__( 'Add sidebar widgets here.', 'blog-reflection' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Global Post Sidebar', 'blog-reflection' ),
			'id'            => 'global-post-sidebar',
			'description'   => esc_html__( 'Add sidebar widgets here.', 'blog-reflection' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'blog-reflection' ),
			'id'            => 'footer-one',
			'description'   => esc_html__( 'Add Footer widgets here.', 'blog-reflection' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'blog-reflection' ),
			'id'            => 'footer-two',
			'description'   => esc_html__( 'Add Footer widgets here.', 'blog-reflection' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'blog-reflection' ),
			'id'            => 'footer-three',
			'description'   => esc_html__( 'Add Footer widgets here.', 'blog-reflection' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'blog-reflection' ),
			'id'            => 'footer-four',
			'description'   => esc_html__( 'Add Footer widgets here.', 'blog-reflection' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'blog_reflection_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blog_reflection_scripts() {

    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri().'/assets/css/bootstrap.min.css',
        BLOG_REFLECTION_VERSION );

        // fontawesome 
    wp_enqueue_style(
        'all-min',
        get_template_directory_uri().'/assets/fontawesome/css/all.min.css',
        BLOG_REFLECTION_VERSION
    );

    wp_enqueue_style(
        'magnific-popup-min',
        get_template_directory_uri().'/assets/css/magnific-popup.min.css',
        BLOG_REFLECTION_VERSION
    );

    wp_enqueue_style(
        'owl-carousel-min',
        get_template_directory_uri().'/assets/css/owl.carousel.min.css',
        BLOG_REFLECTION_VERSION
    );
    wp_enqueue_style(
        'owl-theme-default-min',
        get_template_directory_uri().'/assets/css/owl.theme.default.min.css',
        BLOG_REFLECTION_VERSION
    );
    wp_enqueue_style(
        'slick-min',
        get_template_directory_uri().'/assets/css/slick.min.css',
        BLOG_REFLECTION_VERSION
    );
    wp_enqueue_style(
        'blog-reflection-asset-style',
        get_template_directory_uri().'/assets/css/style.css',
        BLOG_REFLECTION_VERSION
    );

	wp_enqueue_style(
        'blog-reflection-style',
        get_stylesheet_uri(),
        BLOG_REFLECTION_VERSION
    );

	wp_style_add_data(
        'blog-reflection-style',
        'rtl',
        'replace'
    );
    wp_enqueue_style( 
        'blog-reflection-fonts', 
        blog_reflection_fonts_url(),
        null 
    );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_script(
        'all-min',
        get_template_directory_uri() . '/assets/js/all.min.js', array("jquery"),
        BLOG_REFLECTION_VERSION,
        true
    );
    wp_enqueue_script(
        'slick-min',
        get_template_directory_uri() . '/assets/js/slick.min.js', array("jquery"),
        BLOG_REFLECTION_VERSION,
        true
    );

    wp_enqueue_script(
        'bootstrap-min',
        get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(),
        BLOG_REFLECTION_VERSION,
        true );

    wp_enqueue_script(
        'magnific-popup-min',
        get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js',
        array("jquery"),
        BLOG_REFLECTION_VERSION,
        true );

    wp_enqueue_script(
        'counterup-min',
        get_template_directory_uri() . '/assets/js/jquery.counterup.min.js',
        array("jquery"), BLOG_REFLECTION_VERSION,
        true );

    wp_enqueue_script(
        'jquery-marquee-min',
        get_template_directory_uri() . '/assets/js/jquery.marquee.min.js',
        array("jquery"),
        BLOG_REFLECTION_VERSION,
        true );

    wp_enqueue_script( 'imagesloaded-pkgd-min',
        get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js',
        array("jquery"),
        BLOG_REFLECTION_VERSION,
        true );

    wp_enqueue_script(
        'owl-carousel-min',
        get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
        array("jquery"),
        BLOG_REFLECTION_VERSION,
        true );
    wp_enqueue_script(
        'isotope-pkgd-min',
        get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js',
        array("jquery"),
        BLOG_REFLECTION_VERSION,
        true );


    wp_enqueue_script(
        'blog-reflection-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array("jquery"),
        BLOG_REFLECTION_VERSION,
        true );

}
add_action( 'wp_enqueue_scripts', 'blog_reflection_scripts' );


if ( !function_exists( 'blog_reflection_fonts_url' ) ) {
    function blog_reflection_fonts_url(){
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';
        if ( 'off' !== _x( 'on', 'Jost: on or off', 'blog-reflection' ) ) {
            $fonts[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600';
        }
        $query_args = array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        );
        if ( $fonts ) {
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
        return esc_url_raw( $fonts_url );
    }

}


function blog_reflection_scripts_matabox()
{
    wp_enqueue_script( 'blog-reflection-matabox',
        get_template_directory_uri() . '/assets/js/metabox.js',
        array("jquery"),
        BLOG_REFLECTION_VERSION,
        false );
}
add_action( 'admin_enqueue_scripts', 'blog_reflection_scripts_matabox' );


add_action('admin_footer', 'blog_reflection_custom_post_format_script');




/**
 * kirki partial refresh
 */
require BLOG_REFLECTION_INC_DIR . 'kirki-render-callback.php';


/**
 * Implement the Custom Header feature.
 */
require BLOG_REFLECTION_INC_DIR . 'custom-header.php';


/**
 * Implement the Custom Hook feature.
 */
require BLOG_REFLECTION_INC_DIR . 'hook/custom-hook.php';


/**
 * Custom template tags for this theme.
 */
require BLOG_REFLECTION_INC_DIR . 'template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BLOG_REFLECTION_INC_DIR . 'template-functions.php';


/**
 * Customizer additions.
 */
require BLOG_REFLECTION_INC_DIR . 'meta-box/video-meta-box.php';


/**
 * Customizer additions.
 */
require BLOG_REFLECTION_INC_DIR . 'customizer.php';


/**
 * Kirki
 */
 require_once BLOG_REFLECTION_INC_DIR . 'kirki/kirki.php';


/**
 * Kirki Customizer.
 */

if (class_exists('Kirki')) {
	require BLOG_REFLECTION_INC_DIR . 'kirki-customizer.php';
}

/**
 * TGM.
 */
require_once BLOG_REFLECTION_INC_DIR . 'recommendation-plugin.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require BLOG_REFLECTION_INC_DIR . 'jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require BLOG_REFLECTION_INC_DIR . 'woocommerce.php';
}


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
        echo '<ul class="sf-menu" id="primary-menu">';
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
 * Custom widgets
 */
require BLOG_REFLECTION_INC_DIR . 'widget/widgets-init.php';


// Add this code for custo woocommerce pagination.
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'blog_reflection_custom_woocommerce_pagination', 10);

function blog_reflection_custom_woocommerce_pagination() {
    // Use paginate_links() to generate pagination.
    $blog_reflection_paginate_links = paginate_links(array(
        'prev_text' => '<i class="fas fa-angle-double-left"></i>',
        'next_text' => '<i class="fas fa-angle-double-right"></i>',
        'type' => 'array', // Set type to array to customize the output.
    ));

    if ($blog_reflection_paginate_links) {
        echo '<div class="pagination">';
        echo '<ul>';

        foreach ($blog_reflection_paginate_links as $blog_reflection_link) {
            ?>
            <li> <?php echo esc_html($blog_reflection_link); ?></li>
            <?php
        }
        echo '</ul>';
        echo '</div>';
    }
}



// Add support for block styles
add_theme_support( 'wp-block-styles' );
// Add support for responsive embeds
add_theme_support( 'responsive-embeds' );
// Add support for wide alignment
add_theme_support( 'align-wide' );


// Enqueue editor styles
function blog_reflection_editor_styles() {
    add_editor_style( 'asset/css/gutenberg.css' ); // Replace 'editor-style.css' with the path to your editor stylesheet
}
add_action( 'admin_init', 'blog_reflection_editor_styles' );



function blog_reflection_deactivate_plugin_on_theme_switch() {
    // Check if the plugin is active
    if (is_plugin_active('blog-reflection-add-ons/blog-reflection-add-ons.php')) {
        deactivate_plugins('blog-reflection-add-ons/blog-reflection-add-ons.php');
    }
}
// Hook into the theme switch action
add_action('switch_theme', 'blog_reflection_deactivate_plugin_on_theme_switch');
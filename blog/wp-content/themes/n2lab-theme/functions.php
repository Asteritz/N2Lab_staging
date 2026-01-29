<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
   wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

add_action('wp_enqueue_scripts', 'add_normalize_CSS');

// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );

// Register a new navigation menu
function add_Main_Nav() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
// Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
        add_theme_support( 'post-thumbnails' );

// Post pagination function
function blog_reflection_post_pagination() {
	the_posts_pagination( array(
		'screen_reader_text' => '',
		'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
		'next_text'          => '<i class="fas fa-angle-double-right"></i>',
		'type'               => 'list',
		'mid_size'           => 1,
	) );
}
// // Hook to the init action hook, run our navigation menu function
add_action( 'blog_reflection_post_pagination', 'blog_reflection_post_pagination' );

// Breadcrumb function for WordPress
function blog_reflection_breadcrumb() {
	// Settings
	$separator  = ' > ';
	$home_title = 'Blog Main';
	// Get the query & post information
	global $post, $wp_query;
	// Do not display on the homepage
	if ( ! is_front_page() ) {
		echo '<div class="breadcrumb-space-bottom">';
		echo '<ul class="breadcrumb">';
		echo '<li class="breadcrumb-item"><a href="' . get_home_url() . '">' . esc_html( $home_title ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
		if ( is_archive() ) {
			if ( ! is_tax() && ! is_category() && ! is_tag() ) {
				echo '<li class="breadcrumb-item">' . post_type_archive_title( '', false ) . '</li>';
			} else {
				$post_type = get_post_type();
				if ( $post_type != 'post' ) {
					$post_type_object  = get_post_type_object( $post_type );
					$post_type_archive = get_post_type_archive_link( $post_type );
					echo '<li class="breadcrumb-item"><a href="' . esc_url( $post_type_archive ) . '">' . esc_html( $post_type_object->labels->name ) . '</a></li>';
					echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
				}
				echo '<li class="breadcrumb-item">' . single_term_title( '', false ) . '</li>';
			}
		} elseif ( is_single() ) {
			$post_type = get_post_type();
			if ( $post_type != 'post' ) {
				$post_type_object  = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );
				echo '<li class="breadcrumb-item 343434"><a href="' . esc_url( $post_type_archive . '">' . esc_html( $post_type_object->labels->name ) ) . '</a></li>';
				echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			}
			$category = get_the_category();
			if ( ! empty( $category ) ) {
				$last_category = end( $category );
				$cat_parents   = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
				$cat_parents   = explode( ',', $cat_parents );
				foreach ( $cat_parents as $parent ) {
					echo '<li class="breadcrumb-item t55t334t">' .  $parent . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
				}
			}
			echo '<li class="breadcrumb-item g5tynh">' . get_the_title() . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_page() ) {
			if ( $post->post_parent ) {
				$ancestors = get_post_ancestors( $post->ID );
				$ancestors = array_reverse( $ancestors );
				foreach ( $ancestors as $ancestor ) {
					echo '<li class="breadcrumb-item 5t5t5t5"><a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
				}
			}
			echo '<li class="breadcrumb-item fff">' . get_the_title() . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_category() ) {
			echo '<li class="breadcrumb-item">' . single_cat_title( '', false ) . '</li>';
		} elseif ( is_tag() ) {
			echo '<li class="breadcrumb-item ggg">' . single_tag_title( '', false ) . '</li>';
		} elseif ( is_day() ) {
			echo '<li class="breadcrumb-item ttt"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			echo '<li class="breadcrumb-item uuuu"><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';/// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			echo '<li class="breadcrumb-item 555">' . get_the_time( 'jS' ) . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_month() ) {
			echo '<li class="breadcrumb-item 7u7u"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<li class="separator"><i class="fas fa-caret-right"></i></li>';
			echo '<li class="breadcrumb-item 8ii87">' . get_the_time( 'F' ) . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_year() ) {
			echo '<li class="breadcrumb-item h6767">' . get_the_time( 'Y' ) . '</li>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo '<li class="breadcrumb-item">Author: ' . esc_html( $userdata->display_name ) . '</li>';
		} elseif ( is_search() ) {
			echo '<li class="breadcrumb-item">Search results for: ' . get_search_query() . '</li>';
		} elseif ( is_404() ) {
			echo '<li class="breadcrumb-item">Error 404</li>';
		}
		echo '</ul>';
		echo '</div>';
	}
}

// Add breadcrumb action
add_action( 'blog_reflection_breadcrumb', 'blog_reflection_breadcrumb' );

// *** start blog excerpt on homepage

// Register AJAX action for logged-in users
add_action('wp_ajax_get_blog_snippet', 'get_blog_snippet_callback');

// Register AJAX action for visitors (not logged in)
add_action('wp_ajax_nopriv_get_blog_snippet', 'get_blog_snippet_callback');

function get_blog_snippet_callback() {
    // Custom query for latest posts
    $latest_posts = new WP_Query(array(
        'posts_per_page' => 4,
        'post_status'    => 'publish'
    ));

    if ($latest_posts->have_posts()) :
        while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
				<div class="single_blog mb-30">
					<div class="single_blog_thumb pb-4">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<div class="single_blog_content pl-4 pr-4">
						<div class="">
							<span class="techno_blog_meta"><?php the_category(' '); ?></span>
							<span class="techno_blog_meta_date pl-0"><?php the_date(); ?></span>
						</div>
						<div class="blog_page_title ">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<div class="text_clamp">
							<p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
						</div>
					</div>
				</div>
			</div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;

    wp_die(); // important to stop execution
}

// *** end blog excerpt on homepage 

// start blog excerpt on homepage style


// end blog excerpt on homepage style

// Change default excerpt length
function custom_excerpt_length( $length ){
	return 10; // Number of words
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

?>
  


<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Reflection
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="col-xxl-4 col-lg-5 sidebar-widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

<?php

if ( ! is_active_sidebar( 'whatnew-sidebar' ) ) {
	return;
}
?>
<aside id="second-sidebar" class="col-xxl-4 col-lg-5 sidebar-widget-area">
	<?php dynamic_sidebar( 'whatnew-sidebar' ); ?>
</aside><!-- #second-sidebar -->

<?php

if ( ! is_active_sidebar( 'future-perfect-sidebar' ) ) {
	return;
}
?>

<aside id="third-sidebar" class="col-xxl-4 col-lg-5 sidebar-widget-area">
	<?php dynamic_sidebar( 'future-perfect-sidebar' ); ?>
</aside><!-- #third-sidebar -->

<?php

if ( ! is_active_sidebar( 'global-post-sidebar' ) ) {
	return;
}
?>

<aside id="fourth-sidebar" class="col-xxl-4 col-lg-5 sidebar-widget-area">
	<?php dynamic_sidebar( 'global-post-sidebar' ); ?>
</aside><!-- #fourth-sidebar -->
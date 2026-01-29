<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Reflection
 */
    $blog_reflection_footer_select = get_theme_mod('select_footer', 'one');
    get_template_part('inc/footer/footer-'.$blog_reflection_footer_select);
?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
<?php
Kirki::add_section( 'shop_options', array(
	'title' => esc_html__( 'Shop Page Options', 'blog-reflection' ),
	'panel' => 'blog_reflection_theme_shop',
) );

new \Kirki\Field\Select(
	[
		'settings' => 'shop_page_layout',
		'label'    => esc_html__( 'Select Shop Page Layout', 'blog-reflection' ),
		'section'  => 'shop_options',
		'default'  => 'rtl',
		'choices'  => [
			'no-sidebar'    => esc_html__( 'No Sidebar', 'blog-reflection' ),
			'ltl'  => esc_html__( 'Left Sidebar', 'blog-reflection' ),
			'rtl' => esc_html__( 'Right Sidebar', 'blog-reflection' ),
		],
	]
);
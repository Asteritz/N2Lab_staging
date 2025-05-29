<?php
new \Kirki\Section(
	'blog_options',
	[
		'title'       => esc_html__( 'Blog options', 'blog-reflection' ),
		'panel'       => 'page_layout_settings',
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'blog_layout',
		'label'       => esc_html__( 'Select a Option', 'blog-reflection' ),
		'section'     => 'blog_options',
		'default'     => 'rtl',
		'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
		'choices'     => [
			'rtl' => esc_html__( 'Right Sidebar', 'blog-reflection' ),
			'ltl' => esc_html__( 'Left Sidebar', 'blog-reflection' ),
			'no-sidebar' => esc_html__( 'No Sidebar', 'blog-reflection' ),
		],
	]
);
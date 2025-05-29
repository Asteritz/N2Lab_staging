<?php
new \Kirki\Section(
	'page_options',
	[
		'title'       => esc_html__( 'Page options', 'blog-reflection' ),
		'panel'       => 'page_layout_settings',
		'priority'    => 1,
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'page_layout',
		'label'       => esc_html__( 'Select a Option', 'blog-reflection' ),
		'section'     => 'page_options',
		'default'     => 'rtl',
		'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
		'choices'     => [
			'rtl' => esc_html__( 'Right Sidebar', 'blog-reflection' ),
			'ltl' => esc_html__( 'Left Sidebar', 'blog-reflection' ),
			'no-sidebar' => esc_html__( 'No Sidebar', 'blog-reflection' ),
		],
	]
);
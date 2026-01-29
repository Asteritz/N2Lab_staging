<?php
new \Kirki\Section(
	'archive_options',
	[
		'title'       => esc_html__( 'Archive options', 'blog-reflection' ),
		'panel'       => 'page_layout_settings',

	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'archive_layout',
		'label'       => esc_html__( 'Select an Option', 'blog-reflection' ),
		'section'     => 'archive_options',
		'default'     => 'rtl',
		'placeholder' => esc_html__( 'Choose an Option', 'blog-reflection' ),
		'choices'     => [
			'rtl' => esc_html__( 'Right Sidebar', 'blog-reflection' ),
			'ltl' => esc_html__( 'Left Sidebar', 'blog-reflection' ),
			'no-sidebar' => esc_html__( 'No Sidebar', 'blog-reflection' ),
		],
	]
);
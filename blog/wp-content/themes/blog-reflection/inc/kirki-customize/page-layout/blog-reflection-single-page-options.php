<?php
new \Kirki\Section(
	'singe_page_options',
	[
		'title'       => esc_html__( 'Single page options', 'blog-reflection' ),
		'panel'       => 'page_layout_settings',
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'singe_page_layout',
		'label'       => esc_html__( 'Select a Option', 'blog-reflection' ),
		'section'     => 'singe_page_options',
		'default'     => 'rtl',
		'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
		'choices'     => [
			'rtl' => esc_html__( 'Right Sidebar', 'blog-reflection' ),
			'ltl' => esc_html__( 'Left Sidebar', 'blog-reflection' ),
			'no-sidebar' => esc_html__( 'No Sidebar', 'blog-reflection' ),
		],
	]
);
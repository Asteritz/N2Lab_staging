<?php
Kirki::add_section( 'single_shop_options', array(
	'title' => esc_html__( 'Single Shop Page', 'blog-reflection' ),
	'panel' => 'blog_reflection_theme_shop',
) );

// enable_single_product_summary_section


new \Kirki\Field\Checkbox_Switch(
    [
        'label'       => esc_html__( 'Enable Single Product Summary', 'blog-reflection' ),
        'section'     => 'single_shop_options',
        'settings' => 'enable_single_product_summary_section',
        'default'     => 'on',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'blog-reflection' ),
            'off' => esc_html__( 'Disable', 'blog-reflection' ),
        ],
    ]
);

// enable_product_about_section

new \Kirki\Field\Checkbox_Switch(
    [
        'label'       => esc_html__( 'Enable Single Product About', 'blog-reflection' ),
        'section'     => 'single_shop_options',
        'settings' => 'enable_product_about_section',
        'default'     => 'on',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'blog-reflection' ),
            'off' => esc_html__( 'Disable', 'blog-reflection' ),
        ],
    ]
);

new \Kirki\Field\Select(
	[
		'settings' => 'single_shop_page_layout',
		'label'    => esc_html__( 'Select Single Shop Page Layout', 'blog-reflection' ),
		'section'  => 'single_shop_options',
		'default'  => 'rtl',
		'choices'  => [
			'no-sidebar'    => esc_html__( 'No Sidebar', 'blog-reflection' ),
			'ltl'  => esc_html__( 'Left Sidebar', 'blog-reflection' ),
			'rtl' => esc_html__( 'Right Sidebar', 'blog-reflection' ),
		],
	]
);

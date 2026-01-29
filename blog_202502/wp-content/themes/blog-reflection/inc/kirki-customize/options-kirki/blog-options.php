<?php
Kirki::add_section( 'Blog_options', array(
	'title' => esc_html__( 'Blog Options', 'blog-reflection' ),
	'panel' => 'blog_reflection_option_layout',
) );

new \Kirki\Field\Select(
	[
		'settings' => 'blog_layout',
		'label'    => esc_html__( 'Select Blog Page Layout', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'right-sidebar',
		'choices'  => [
			'full-width'    => esc_html__( 'Full Width', 'blog-reflection' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'blog-reflection' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'blog-reflection' ),
			'grid'          => esc_html__( 'Grid Full', 'blog-reflection' ),
			'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'blog-reflection' ),
			'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'blog-reflection' ),
		],
	]
);


new \Kirki\Field\Select(
	[
		'settings' => 'blog_title_tag',
		'label'    => esc_html__( 'Select Blog Title Tag', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'h2',
		'choices'  => [
			'h1'    => esc_html__( 'H1', 'blog-reflection' ),
			'h2'    => esc_html__( 'H2', 'blog-reflection' ),
			'h3'    => esc_html__( 'H3', 'blog-reflection' ),
			'h4'    => esc_html__( 'H4', 'blog-reflection' ),
			'h5'    => esc_html__( 'H5', 'blog-reflection' ),
			'h6'    => esc_html__( 'H6', 'blog-reflection' ),
			'p'    	=> esc_html__( 'p', 'blog-reflection' ),
			'span'  => esc_html__( 'Span', 'blog-reflection' ),
		],
	]
);

// Select Category 
new \Kirki\Field\Select(
    [
        'settings'    => 'blog_post_category',
        'label'       => esc_html__( 'Select Category ', 'blog-reflection' ),
        'section'     => 'Blog_options',
        'default'     => array(1),
        'placeholder' => esc_html__( 'Choose an Category', 'blog-reflection' ),
        'multiple'    => -1,
        'choices'     => Kirki\Util\Helper::get_terms(array('taxonomy' => 'category')),
        'active_callback' => [
            [
                'setting'  => 'enable_blog_post',
                'operator' => '==',
                'value'    => true,
            ],
           
        ]
    ]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_image',
		'label'    => esc_html__( 'Enable Image', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_title',
		'label'    => esc_html__( 'Enable Title', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);
new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_dec',
		'label'    => esc_html__( 'Enable Content', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_author',
		'label'    => esc_html__( 'Enable Author Name', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_date',
		'label'    => esc_html__( 'Enable Date', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_comment',
		'label'    => esc_html__( 'Enable Comment', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_cats',
		'label'    => esc_html__( 'Enable Category', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_tags',
		'label'    => esc_html__( 'Enable Tag', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_btn',
		'label'    => esc_html__( 'Enable Read More', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Text(
	[
		'settings'        => 'btn_text',
		'label'           => esc_html__( 'Button Text', 'blog-reflection' ),
		'section'         => 'Blog_options',
		'default'         => esc_html__( 'Continue reading', 'blog-reflection' ),
		'active_callback' => [
			[
				'setting'  => 'enable_btn',
				'operator' => '==',
				'value'    => true,
			],
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_pagination',
		'label'    => esc_html__( 'Enable Pagination', 'blog-reflection' ),
		'section'  => 'Blog_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);

new \Kirki\Field\Radio_Buttonset(
	[
		'settings'        => 'pagination_alignment',
		'label'           => esc_html__( 'Pagination Alignment', 'blog-reflection' ),
		'section'         => 'Blog_options',
		'default'         => 'left',
		'choices'         => [
			'left'   => esc_html__( 'Left', 'blog-reflection' ),
			'center' => esc_html__( 'Center', 'blog-reflection' ),
			'right'  => esc_html__( 'Right', 'blog-reflection' ),
		],
		'active_callback' => [
			[
				'setting'  => 'enable_pagination',
				'operator' => '==',
				'value'    => true,
			],
		],
		'transport'       => 'auto',
		'output'          => array(
			array(
				'element'  => 'nav.navigation.pagination',
				'property' => 'text-align',
			),
		),
	]
);
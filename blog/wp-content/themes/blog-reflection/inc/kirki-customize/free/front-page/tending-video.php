<?php 
/**
 * Trending News  Setting
 */
Kirki::add_section( 'trending_video_section', array(
	'title'    => esc_html__( 'Video Post', 'blog-reflection' ),
	'panel'    => 'front-page-settings',
) );

Kirki::add_field( 'theme_config', [
	'type'        => 'switch',
	'settings'    => 'enable_disable_video_section',
	'label'       => esc_html__( 'Enable Video Section', 'blog-reflection' ),
	'section'     => 'trending_video_section',
	'default'     => 'off',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'blog-reflection' ),
		'off' => esc_html__( 'Disable', 'blog-reflection' ),
	],
] );

new \Kirki\Field\Text(
	[
		'settings' => 'video_section_title',
		'label'    => esc_html__( 'Video Section Title', 'blog-reflection' ),
		'section'  => 'trending_video_section',
		'default'  => esc_html__( 'Trending Video', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_video_section',
                'operator' => '===',
                'value'    => true,
            ],
        ], 
		'partial_refresh'    => [
			'home_one_video_section_title_refresh' => [
				'selector'        => '.video-edit',
				'render_callback' => 'blog_reflection_customizer_video_quick_edit',
			],
		],
		
	]
);


// pro fature Category for Video Post
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'select_video_category_pro',
        'label'       => esc_html__( 'Select Unlimited Category for video Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'trending_video_section',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/video-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_video_section',
                'operator' => '==',
                'value'    => true,
            ],
           
        ],
    ]
);

Kirki::add_field( 'theme_config', [
	'type'        => 'switch',
	'settings'    => 'enable_video_post_filter',
	'label'       => esc_html__( 'Enable Video Post Filter', 'blog-reflection' ),
	'section'     => 'trending_video_section',
	'default'     => 'off',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'blog-reflection' ),
		'off' => esc_html__( 'Disable', 'blog-reflection' ),
	],
	'active_callback' => [
		[
			'setting'  => 'enable_disable_video_section',
			'operator' => '===',
			'value'    => true,
		],
	], 
] );

new \Kirki\Field\Select(
	[
		'settings'        => 'video_post_order',
		'label'           => esc_html__( 'Post Order', 'blog-reflection' ),
		'section'         => 'trending_video_section',
		'default'         => 'DESC',
		'placeholder'     => esc_html__( 'Choose an option', 'blog-reflection' ),
		'choices'         => [
			'ASC'  => esc_html__( 'ASC', 'blog-reflection' ),
			'DESC' => esc_html__( 'DESC', 'blog-reflection' ),
		],
		'active_callback' => [
			[
				'setting'  => 'enable_disable_video_section',
				'operator' => '===',
				'value'    => true,
			],
			[
				'setting'  => 'enable_video_post_filter',
				'operator' => '===',
				'value'    => true,
			],
		], 
	]
);

new \Kirki\Field\Select(
	[
		'settings'        => 'video_post_orderby',
		'label'           => esc_html__( 'Post Order By', 'blog-reflection' ),
		'section'         => 'trending_video_section',
		'default'         => 'title',
		'placeholder'     => esc_html__( 'Choose an option', 'blog-reflection' ),
		'choices'         => [
			'none'          => esc_html__( 'None', 'blog-reflection' ),
			'ID'            => esc_html__( 'ID', 'blog-reflection' ),
			'date'          => esc_html__( 'Date', 'blog-reflection' ),
			'name'          => esc_html__( 'Name', 'blog-reflection' ),
			'title'         => esc_html__( 'Title', 'blog-reflection' ),
			'comment_count' => esc_html__( 'Comment count', 'blog-reflection' ),
			'rand'          => esc_html__( 'Random', 'blog-reflection' ),
		],
		'active_callback' => [
			[
				'setting'  => 'enable_disable_video_section',
				'operator' => '===',
				'value'    => true,
			],
			[
				'setting'  => 'enable_video_post_filter',
				'operator' => '===',
				'value'    => true,
			],
		],
	]
);

new \Kirki\Field\Number(
	[
		'settings' => 'video_display_number',
		'label'    => esc_html__( 'Display Item', 'blog-reflection' ),
		'section'  => 'trending_video_section',
		'default'  => 5,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'enable_disable_video_section',
				'operator' => '===',
				'value'    => true,
			],
			[
				'setting'  => 'enable_video_post_filter',
				'operator' => '===',
				'value'    => true,
			],
		],
	]
);
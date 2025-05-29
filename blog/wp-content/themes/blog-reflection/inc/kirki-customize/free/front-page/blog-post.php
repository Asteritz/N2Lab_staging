<?php
/**
* Start Select blog post
*/

kirki::add_section( 'blog_post_options', array(
'title'    => esc_html__( 'Blog Post ', 'blog-reflection' ),
'panel'    => 'front-page-settings',
) );

// pro fature Blog  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_blog_post_pro',
        'label'       => esc_html__( 'Enable Disable Blog Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'blog_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/blog-post-enable.jpg',
        ],
    ]
);

// post Color overlay

new \Kirki\Field\Color(
	[
		'label'       => __( 'Blog Post Overlay', 'blog-reflection' ),
		'description' => esc_html__( 'Blog Post Overlay Settings', 'blog-reflection' ),
		'section'     => 'blog_post_options',
		'default'     => 'rgba(0, 0, 0, 0.5)',
        'choices'     => [
			'alpha' => true,
		],
        'active_callback' => [
            [
                'setting'  => 'enable_blog_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'output' => array(
			array(
				'element'  => '.post-img > .blog-reflection-blog-overlay',
				'property' => 'background-color',
			),
		),
	]
);


// Select Post order
new \Kirki\Field\Select(
    [
        'settings'        => 'blog_post_order',
        'label'           => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'         => 'blog_post_options',
        'default'         => 'asc',
        'placeholder'     => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_blog_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_blog_post_filter',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'choices'         => [
            'asc'  => esc_html__( 'Ascending', 'blog-reflection' ),
            'desc' => esc_html__( 'Descending', 'blog-reflection' ),
        ],
    ]
);


//Select Post order by
new \Kirki\Field\Select(
    [
        'settings'    => 'blog_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'blog_post_options',
        'default'     => 'date',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_blog_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_blog_post_filter',
                'operator' => '==',
                'value'    => true,
            ],

        ],
        'choices'         => [
            'none'          => esc_html__( 'None', 'blog-reflection' ),
            'ID'            => esc_html__( 'ID', 'blog-reflection' ),
            'date'          => esc_html__( 'Date', 'blog-reflection' ),
            'name'          => esc_html__( 'Name', 'blog-reflection' ),
            'title'         => esc_html__( 'Title', 'blog-reflection' ),
            'comment_count' => esc_html__( 'Comment count', 'blog-reflection' ),
            'rand'          => esc_html__( 'Random', 'blog-reflection' ),
        ],
    ]
);
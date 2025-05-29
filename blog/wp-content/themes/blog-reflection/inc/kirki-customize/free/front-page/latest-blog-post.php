<?php
kirki::add_section( 'blog_reflection_latest_blog_post_options', array(
'title'    => esc_html__( 'Latest Blog Post ', 'blog-reflection' ),
'panel'    => 'front-page-settings',
) );

//  enable disable
new \Kirki\Field\Checkbox_Switch(
    [
        'label'       => esc_html__( 'Enable Disable Latest Blog Post', 'blog-reflection' ),
        'section'     => 'blog_reflection_latest_blog_post_options',
        'settings' => 'enable_disable_latest_blog_post_options',
        'default'     => 'on',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'blog-reflection' ),
            'off' => esc_html__( 'Disable', 'blog-reflection' ),
        ],
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'latest_blog_post_section_title',
        'label'    => esc_html__( 'Latest Blog Post Section Title', 'blog-reflection' ),
        'default'     => 'Latest Blog Post',
        'section'  => 'blog_reflection_latest_blog_post_options',
        'active_callback' => [
            [
                'setting'  => 'enable_disable_latest_blog_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
			'latest_blog_post_section_title_refresh' => [
				'selector'        => '.latest-blog-post > h2',
				'render_callback' => 'blog_reflection_customizer_latest_blog_post_quick_edit',
			],
		],
    ]
);




// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'latest_blog_post_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'blog_reflection_latest_blog_post_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_latest_blog_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);
// Select Category 

new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'select_latest_blog_post_category_pro',
        'label'       => esc_html__( 'Select Latest Blog Post Category Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'blog_reflection_latest_blog_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/latest-blog-post-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_latest_blog_post_options',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'latest_blog_post_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
        ],
    ]
);

//Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'latest_blog_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'blog_reflection_latest_blog_post_options',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_latest_blog_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'choices'     => [
            'asc' => esc_html__( 'ASE', 'blog-reflection' ),
            'desc' => esc_html__( 'DESC', 'blog-reflection' ),
        ],
    ]
);

//Select Post order by
new \Kirki\Field\Select(
    [
        'settings'    => 'latest_blog_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'blog_reflection_latest_blog_post_options',
        'default'     => 'date',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_latest_blog_post_options',
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


// visible items
new \Kirki\Field\Number(
    [
        'settings' => 'latest_blog_post_display_post_number',
        'label'    => esc_html__( 'Visible Number of Post', 'blog-reflection' ),
        'section'  => 'blog_reflection_latest_blog_post_options',
        'default'  => 6,
        'choices'  => [
            'min'  => 1,
            'max'  => 6,
            'step' => 1,
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_latest_blog_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],

       
    ]
);
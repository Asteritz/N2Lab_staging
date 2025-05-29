<?php
kirki::add_section( 'blog_reflection_global_post_options', array(
'title'    => esc_html__( 'Global Post ', 'blog-reflection' ),
'panel'    => 'front-page-settings',
) );

// pro fature Global Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_disable_global_post_options_pro',
        'label'       => esc_html__( 'Enable Disable Global Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'blog_reflection_global_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/global-enable.jpg',
        ],
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'global_post_section_title',
        'label'    => esc_html__( 'Global Post Section Title', 'blog-reflection' ),
        'default'     => 'Global Post',
        'section'  => 'blog_reflection_global_post_options',
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
			'global_post_section_title_refresh' => [
				'selector'        => '.global-post > h2',
				'render_callback' => 'blog_reflection_customizer_global_post_quick_edit',
			],
		],
    ]
);

// post Color overlay
new \Kirki\Field\Color(
	[
		'label'       => __( 'Global Post Image Overlay', 'blog-reflection' ),
		'description' => esc_html__( 'Global Post Image Overlay Settings', 'blog-reflection' ),
		'section'     => 'blog_reflection_global_post_options',
		'default'     => 'rgba(0, 0, 0, 0.5)',
        'choices'     => [
			'alpha' => true,
		],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'output' => array(
			array(
				'element'  => '.post-img>.blog-reflection-global-post-overlay',
				'property' => 'background-color',
			),
		),
	]
);



// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'global_post_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'blog_reflection_global_post_options',
        'default'     => 'latest',

        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

// pro fature select Category 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'select_global_post_category_pro',
        'label'       => esc_html__( 'Select an Category Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'blog_reflection_global_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/global-post-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'global_post_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);

//Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'global_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'blog_reflection_global_post_options',
        'default'     => 'dese',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'choices'     => [
            'asc' => esc_html__( 'ASE', 'blog-reflection' ),
            'dese' => esc_html__( 'DESE', 'blog-reflection' ),
        ],
    ]
);

//Select Post order by
new \Kirki\Field\Select(
    [
        'settings'    => 'global_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'blog_reflection_global_post_options',
        'default'     => 'title',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
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
        'settings' => 'global_post_display_post_number',
        'label'    => esc_html__( 'Visible Number of Post', 'blog-reflection' ),
        'section'  => 'blog_reflection_global_post_options',
        'default'  => 4,
        'choices'  => [
            'min'  => 1,
            'max'  => 8,
            'step' => 1,
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
                'operator' => '==',
                'value'    => true,
            ],
        ],

       
    ]
);

// side bar enable disable code 

// pro fature side bar enable disable 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_disable_global_post_sidebar_pro',
        'label'       => esc_html__( 'Enable Disable Global Post Side Bar Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'blog_reflection_global_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/global-post-sidebar.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_global_post_options',
                'operator' => '==',
                'value'    => true,
            ],
           
        ],
    ]
);
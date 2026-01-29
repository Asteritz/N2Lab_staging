<?php
kirki::add_section( 'blog_reflection_discover_post_options', array(
'title'    => esc_html__( 'Discover Post ', 'blog-reflection' ),
'panel'    => 'front-page-settings',
) );

// pro fature Discover Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_disable_discover_post_pro',
        'label'       => esc_html__( 'Enable Disable Discover Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'blog_reflection_discover_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/discover-enable.jpg',
        ],
    ]
);
new \Kirki\Field\Text(
    [
        'settings' => 'discover_post_section_title',
        'label'    => esc_html__( 'Discover Post Section Title', 'blog-reflection' ),
        'default'     => 'Discover Post',
        'section'  => 'blog_reflection_discover_post_options',
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
			'discover_post_options_title_refresh' => [
				'selector'        => '.discover-post-edit>h2',
				'render_callback' => 'blog_reflection_customizer_discover_post_quick_edit',
			],
		],
    ]
);


// <-- ========================================================
//   Discover Left Side post Post
// =============================================================-->

// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'discover_left_post_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'blog_reflection_discover_post_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

new \Kirki\Field\Select(
    [
        'settings'        => 'select_left_discover_post_cat',
        'label'           => esc_html__( 'Select a Category for Left Side Slider Discover Post', 'blog-reflection' ),
        'section'         => 'blog_reflection_discover_post_options',
        'default'         => array(1), // Adjusted default value
        'placeholder'     => esc_html__( 'Choose a Category', 'blog-reflection' ), // Improved placeholder text
        'multiple'        => 15,
        'choices'         => Kirki\Util\Helper::get_terms(['taxonomy' => 'category']), // Ensure correct taxonomy
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'discover_left_post_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
        ]
    ]
);

//discover Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'discover_left_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'blog_reflection_discover_post_options',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
                'operator' => '==',
                'value'    => true,
            ],

        ],
        'choices'     => [
            'asc'  => esc_html__( 'Ascending', 'blog-reflection' ),  // Corrected label
            'desc' => esc_html__( 'Descending', 'blog-reflection' ), // Corrected key and label
        ],
    ]
);


//Select Post order by
new \Kirki\Field\Select(
    [
        'settings'    => 'discover_left_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'blog_reflection_discover_post_options',
        'default'     => 'title',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
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

// left post select option ends


// <-- ========================================================
//   Discover Right Side post Post
// =============================================================-->

// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'discover_right_post_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'blog_reflection_discover_post_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

new \Kirki\Field\Select(
    [
        'settings'        => 'select_right_discover_post_cat',
        'label'           => esc_html__( 'Select an Category for Discover Right Side Post', 'blog-reflection' ),
        'section'         => 'blog_reflection_discover_post_options',
        'default'         => array(1), // Adjusted default value
        'placeholder'     => esc_html__( 'Choose an Category', 'blog-reflection' ), // Improved placeholder text
        'multiple'        => 15,
        'choices'         => Kirki\Util\Helper::get_terms(['taxonomy' => 'category']), // Ensure correct taxonomy
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'discover_right_post_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
        ]
    ]
);
//discover Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'discover_right_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'blog_reflection_discover_post_options',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
                'operator' => '==',
                'value'    => true,
            ],

        ],
        'choices'     => [
            'asc'  => esc_html__( 'Ascending', 'blog-reflection' ),  // Corrected label
            'desc' => esc_html__( 'Descending', 'blog-reflection' ), // Corrected key and label
        ],
    ]
);

//Select Post order by
new \Kirki\Field\Select(
    [
        'settings'    => 'discover_right_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'blog_reflection_discover_post_options',
        'default'     => 'title',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_discover_post',
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
// right post select option ends
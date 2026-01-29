<?php
/**
 * Add Weekend Top Post
 */
kirki::add_section('weekend_top_post_options', array(
    'title' => esc_html__('Weekend Top Post', 'blog-reflection'),
    'panel' => 'front-page-settings',
));


// pro fature   Weekend Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_weekend_top_post_pro',
        'label'       => esc_html__( 'Enable Disable Weekend Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'weekend_top_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/weekend-enable.jpg',
        ],
    ]
);

// post Color overlay
new \Kirki\Field\Color(
	[
		'label'       => __( 'Weekend Top post Image Overlay', 'blog-reflection' ),
		'description' => esc_html__( 'Weekend Top post Image Overlay Settings', 'blog-reflection' ),
		'section'     => 'weekend_top_post_options',
		'default'     => 'rgba(0, 0, 0, 0.5)',
        'choices'     => [
			'alpha' => true,
		],
        'active_callback' => [
            [
                'setting'  => 'enable_weekend_top_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'output' => array(
			array(
				'element'  => '.post-img > .blog-reflection-weekend-post-overlay',
				'property' => 'background-color',
			),
		),
	]
);

// weekends post section Title
new \Kirki\Field\Text(
    [
        'settings' => 'weekend_top_post_section_title',
        'label'    => esc_html__( 'Weekend Top Post Section Title', 'blog-reflection' ),
        'default'     => 'Weekend Top',
        'section'  => 'weekend_top_post_options',
        'partial_refresh'    => [
			'weekend_post_title_refresh' => [
				'selector'        => '.weekend-post-edit > h2',
				'render_callback' => 'blog_reflection_weekend_post_customizer_quick_edit',
			],
		],
		'active_callback' => [
            [
                'setting'  => 'enable_weekend_top_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'weekend_post_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'weekend_top_post_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_weekend_top_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);
 


// pro fature Category for Trending Post
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'weekend_top_post_category_pro',
        'label'       => esc_html__( 'Select Multiple Category for Weekend Top Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'weekend_top_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/weekend-top-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_weekend_top_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'weekend_post_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);



// pro fature for Trend Post Filter
// new \Kirki\Field\Radio_Image(
//     [
//         'settings'    => 'weekend_top_post_filter_pro',
//         'label'       => esc_html__( 'Weekend Top Post filter Only Enable For Pro Version', 'blog-reflection' ),
//         'description' => blogreflection_purchase_link(),
//         'section'     => 'weekend_top_post_options',
//         'default'     => '',
//         'transport'   => 'auto',
//         'choices'     => [
//             'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/weekend-post-filter.jpg',
//         ],
//         'active_callback' => [
//             [
//                 'setting'  => 'enable_weekend_top_post',
//                 'operator' => '==',
//                 'value'    => true,
//             ],
           
//         ],
//     ]
// );
new \Kirki\Field\Select(
    [
        'settings'    => 'weekend_top_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'weekend_top_post_options',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_weekend_top_post',
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
        'settings'    => 'weekend_top_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'weekend_top_post_options',
        'default'     => 'date',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_weekend_top_post',
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
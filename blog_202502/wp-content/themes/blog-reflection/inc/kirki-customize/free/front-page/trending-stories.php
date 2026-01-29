<?php
/**
 * Start section 
 */
kirki::add_section('trending_stories_options', array(
    'title' => esc_html__('Trending Stories Section', 'blog-reflection'),
    'panel' => 'front-page-settings',
));


// pro fature  Trending Stories Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_trending_stories_pro',
        'label'       => esc_html__( 'Enable Disable  Trending Stories Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'trending_stories_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/trending-enable.jpg',
        ],
    ]
);

// trending stories title 
new \Kirki\Field\Text(
    [
        'settings' => 'trending_stories_section_title',
        'label'    => esc_html__( 'Trending Stories Section Title', 'blog-reflection' ),
        'default'     => 'Today Trending Stories',
        'section'  => 'trending_stories_options',
		'active_callback' => [
            [
                'setting'  => 'enable_trending_stories',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
			'trending_stories_options_title_refresh' => [
				'selector'        => '.trending-edit > h2',
				'render_callback' => 'blog_reflection_customizer_tranding_stories_quick_edit',
			],
		],
    ]
);

// post Color overlay
new \Kirki\Field\Color(
	[
		'label'       => __( 'Trending Post Image Overlay', 'blog-reflection' ),
		'description' => esc_html__( 'Trending Post Overlay Settings', 'blog-reflection' ),
		'section'     => 'trending_stories_options',
		'default'     => 'rgba(0, 0, 0, 0.5)',
        'choices'     => [
			'alpha' => true,
		],
        'active_callback' => [
            [
                'setting'  => 'enable_trending_stories',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'output' => array(
			array(
				'element'  => '.post-img > .trend-overlay',
				'property' => 'background-color',
			),
		),
	]
);



// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'trending_stories_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Tranding Stories Content Type', 'blog-reflection' ),
        'section'     => 'trending_stories_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_trending_stories',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

// pro fature Category for Trending Post
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'trending_stories_category_pro',
        'label'       => esc_html__( 'Select Multiple Category forTrending Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'trending_stories_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/trending-stories-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_trending_stories',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'trending_stories_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);

// pro fature for Trending Stories Post Filter
// new \Kirki\Field\Radio_Image(
//     [
//         'settings'    => 'enable_trending_stories_post_filter_pro',
//         'label'       => esc_html__( 'Trending Stories Post filter Only Enable For Pro Version', 'blog-reflection' ),
//         'description' => blogreflection_purchase_link(),
//         'section'     => 'trending_stories_options',
//         'default'     => '',
//         'transport'   => 'auto',
//         'choices'     => [
//             'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/trending-stories-filter.jpg',
//         ],
//         'active_callback' => [
//             [
//                 'setting'  => 'enable_trending_stories',
//                 'operator' => '==',
//                 'value'    => true,
//             ],
           
//         ],
//     ]
// );

new \Kirki\Field\Checkbox_Switch(
    [
        'label'       => esc_html__( 'Trending Stories Post filter', 'blog-reflection' ),
        'section'     => 'trending_stories_options',
        'settings'    => 'enable_trending_stories_post_filter',
        'default'     => 'on',
        'active_callback' => [
            [
                'setting'  => 'enable_trending_stories',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'blog-reflection' ),
            'off' => esc_html__( 'Disable', 'blog-reflection' ),
        ],
    ]
 );
 
 
 
 //  Select Post order
 new \Kirki\Field\Select(
     [
         'settings'    => 'trending_stories_post_order',
         'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
         'section'     => 'trending_stories_options',
         'default'     => 'desc',
         'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
         'active_callback' => [
             [
                 'setting'  => 'enable_trending_stories',
                 'operator' => '==',
                 'value'    => true,
             ],
             [
                 'setting'  => 'enable_trending_stories_post_filter',
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
         'settings'    => 'tranding_stories_post_order_by',
         'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
         'section'     => 'trending_stories_options',
         'default'     => 'title',
         'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
         'active_callback' => [
             [
                 'setting'  => 'enable_trending_stories',
                 'operator' => '==',
                 'value'    => true,
             ],
             [
                 'setting'  => 'enable_trending_stories_post_filter',
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

 //  visible items
 new \Kirki\Field\Number(
     [
         'settings' => 'tranding_stories_post_display_item_number',
         'label'    => esc_html__( 'Visible Number of items', 'blog-reflection' ),
         'section'  => 'trending_stories_options',
         'default'  => 5,
         'choices'  => [
             'min'  => 1,
             'max'  => 5,
             'step' => 1,
         ],
         'active_callback' => [
             [
                 'setting'  => 'enable_trending_stories',
                 'operator' => '==',
                 'value'    => true,
             ],
             [
                 'setting'  => 'enable_trending_stories_post_filter',
                 'operator' => '==',
                 'value'    => true,
             ],
         ],
 
        
     ]
 );
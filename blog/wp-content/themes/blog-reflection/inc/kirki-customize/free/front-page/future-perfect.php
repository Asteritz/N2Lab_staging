<?php
/**
*  add section
*/

kirki::add_section( 'future_perfect_section', array(
'title'    => esc_html__( 'Future Perfect Section', 'blog-reflection' ),
'panel'    => 'front-page-settings',
) );

// pro fature Future Perfect Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_disable_future_perfect_post_pro',
        'label'       => esc_html__( 'Enable Disable Future Perfect Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'future_perfect_section',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/future-perfect-enable.jpg',
        ],
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'future_perfect_post_section_title',
        'label'    => esc_html__( 'Future Perfect Post Section Title', 'blog-reflection' ),
        'default'     => 'Future Perfect',
        'section'  => 'future_perfect_section',
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
			'future_perfect_options_title_refresh' => [
				'selector'        => '.future-perfect-post',
				'render_callback' => 'blog_reflection_customizer_future_perfect_quick_edit',
			],
		],
    ]
);



// <-- ========================================================
//    Future perfect  Post 
// =============================================================-->

// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'future_main_post_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'future_perfect_section',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

new \Kirki\Field\Select(
    [
        'settings'        => 'select_future_perfect_main_post_cat',
        'label'           => esc_html__( 'Select an Category for Future Perfect Main Post', 'blog-reflection' ),
        'section'         => 'future_perfect_section',
        'default'         => array(1), // Adjusted default value
        'placeholder'     => esc_html__( 'Choose an Category', 'blog-reflection' ), // Improved placeholder text
        'choices'         => Kirki\Util\Helper::get_terms(['taxonomy' => 'category']), // Ensure correct taxonomy
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'future_main_post_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
        ]
    ]
);



// <-- ========================================================
//    Future Perfect Middle Post
// =============================================================-->

// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'future_perfect_middle_post_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'future_perfect_section',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

// pro fature select Category 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'future_perfect_middle_post_category_pro',
        'label'       => esc_html__( 'Select an Category for Future Perfect Middle Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'future_perfect_section',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/future-perfect-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'future_perfect_middle_post_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);

//Future Perfect enable disable post filter
new \Kirki\Field\Checkbox_Switch(
   [
       'label'       => esc_html__( 'Enable Post filter', 'blog-reflection' ),
       'section'     => 'future_perfect_section',
       'settings'    => 'enable_future_perfect_middle_post_filter',
       'default'     => 'on',
       'active_callback' => [
           [
               'setting'  => 'enable_disable_future_perfect_post',
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

// Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'future_perfect_middle_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'future_perfect_section',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_future_perfect_middle_post_filter',
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
        'settings'    => 'future_perfect_middle_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'future_perfect_section',
        'default'     => 'title',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_future_perfect_middle_post_filter',
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
        'settings' => 'future_perfect_middle_display_post_number',
        'label'    => esc_html__( 'Visible Number of items', 'blog-reflection' ),
        'section'  => 'future_perfect_section',
        'default'  => 6,
        'choices'  => [
            'min'  => 1,
            'max'  => 10,
            'step' => 1,
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_future_perfect_middle_post_filter',
                'operator' => '==',
                'value'    => true,
            ],
        ],

       
    ]
);


// <-- ========================================================
//     Future Perfect Bottom Post
// =============================================================-->


// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'future_perfect_bottom_post_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Content Type', 'blog-reflection' ),
        'section'     => 'future_perfect_section',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

// pro fature Category for future perfect
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'future_perfect_bottom_post_category_pro',
        'label'       => esc_html__( 'Select an Category for Future Perfect Middle Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'future_perfect_section',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/future-perfect-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'future_perfect_bottom_post_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);

// enable disable post filter
new \Kirki\Field\Checkbox_Switch(
   [
       'label'       => esc_html__( 'Enable Post filter', 'blog-reflection' ),
       'section'     => 'future_perfect_section',
       'settings'    => 'enable_future_perfect_bottom_post_filter',
       'default'     => 'on',
       'active_callback' => [
           [
               'setting'  => 'enable_disable_future_perfect_post',
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

//More News  Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'future_perfect_bottom_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'future_perfect_section',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_future_perfect_bottom_post_filter',
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
        'settings'    => 'future_perfect_bottom_post_order_by',
        'label'       => esc_html__( 'Select Post Order By', 'blog-reflection' ),
        'section'     => 'future_perfect_section',
        'default'     => 'title',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_future_perfect_bottom_post_filter',
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
        'settings' => 'future_perfect_bottom_display_post_number',
        'label'    => esc_html__( 'Visible Number of items', 'blog-reflection' ),
        'section'  => 'future_perfect_section',
        'default'  => 3,
        'choices'  => [
            'min'  => 1,
            'max'  => 6,
            'step' => 1,
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_future_perfect_bottom_post_filter',
                'operator' => '==',
                'value'    => true,
            ],
        ],

       
    ]
);

// side bar enable disable code 



// pro fature  side bar enable disable code 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_disable_future_perfect_sidebar_pro',
        'label'       => esc_html__( 'Enable Disable Sidebar Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'future_perfect_section',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/future-perfect-sidebar.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_disable_future_perfect_post',
                'operator' => '==',
                'value'    => true,
            ],
 
        ],
    ]
);
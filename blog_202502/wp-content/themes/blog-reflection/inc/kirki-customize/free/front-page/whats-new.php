<?php
/**
* Start What New
*/

kirki::add_section( 'home_one_whats_new_options', array(
'title'    => esc_html__( 'Whats New ', 'blog-reflection' ),
'panel'    => 'front-page-settings',
) );

// pro fature   What New Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'home_one_enable_whats_new_pro',
        'label'       => esc_html__( 'Enable Disable What New Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'home_one_whats_new_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/what-new-enable.jpg',
        ],
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'home_one_whats_new_title',
        'label'    => esc_html__( 'Whats New Title', 'blog-reflection' ),
        'default'     => 'Whats New',
        'section'  => 'home_one_whats_new_options',
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
			'home_one_whats_new_options_title_refresh' => [
				'selector'        => '.what-new-edit',
				'render_callback' => 'blog_reflection_customizer_what_new_quick_edit',
			],
		],
    ]
);



// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'home_one_what_new_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Top Content Type', 'blog-reflection' ),
        'section'     => 'home_one_whats_new_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);


// pro fature Category for What New Post
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'home_one_what_new_category_pro',
        'label'       => esc_html__( 'Select Multiple Category for What New Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'home_one_whats_new_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/what-new-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'home_one_what_new_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);



//Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'home_one_whats_new_order',
        'label'       => esc_html__( 'Select Whats New Order', 'blog-reflection' ),
        'section'     => 'home_one_whats_new_options',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_whats_new_filter',
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
        'settings'    => 'home-one_whats_new_order_by',
        'label'       => esc_html__( 'Select whats new Order By', 'blog-reflection' ),
        'section'     => 'home_one_whats_new_options',
        'default'     => 'date',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_whats_new_post_filter',
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


// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'home_one_what_new_bottom_cat_or_latest',
        'label'       => esc_html__( 'Select Bottom Content Type', 'blog-reflection' ),
        'section'     => 'home_one_whats_new_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);


// pro fature Category for What New Post
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'home_one_what_new_post_category_pro',
        'label'       => esc_html__( 'Select Multiple Category for What New Bottom Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'home_one_whats_new_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/what-new-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'home_one_what_new_bottom_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);



// Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'home_one_whats_new_post_order',
        'label'       => esc_html__( 'Select Whats New Order', 'blog-reflection' ),
        'section'     => 'home_one_whats_new_options',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_whats_new_filter',
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
        'settings'    => 'home_one_whats_new_post_order_by',
        'label'       => esc_html__( 'Select whats new Order By', 'blog-reflection' ),
        'section'     => 'home_one_whats_new_options',
        'default'     => 'date',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'enable_whats_new_post_filter',
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




// pro fature // side bar enable disable code 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'what_new_sidebar_enable_disable_pro',
        'label'       => esc_html__( 'Enable Disable Sidebar Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'home_one_whats_new_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/what-new-sidebar.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'home_one_enable_whats_new',
                'operator' => '==',
                'value'    => true,
            ],
 
        ],
    ]
);
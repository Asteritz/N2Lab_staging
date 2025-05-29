<?php
/**
* Add section
*/

kirki::add_section( 'most_popular_post_options', array(
'title'    => esc_html__( 'Most Popular Post ', 'blog-reflection' ),
'panel'    => 'front-page-settings',
) );

// pro fature  Most Popular Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_most_popular_post_pro',
        'label'       => esc_html__( 'Enable Disable  Most Popular Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'most_popular_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/trending-enable.jpg',
        ],
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'most_popular_post_title',
        'label'    => esc_html__( 'Most Popular Post Title', 'blog-reflection' ),
        'default'     => 'Most Popular Post',
        'section'  => 'most_popular_post_options',
        'active_callback' => [
            [
                'setting'  => 'enable_most_popular_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
            'home_one_most_options_title_refresh' => [
                'selector'        => '.most-popular',
                'render_callback' => 'blog_reflection_customizer_most_popular_quick_edit',
            ],
        ],
    ]
);

// post Color overlay
new \Kirki\Field\Color(
	[
		'label'       => esc_html__( 'Popular Post Overlay', 'blog-reflection' ),
		'description' => esc_html__( 'Popular Post Overlay Settings', 'blog-reflection' ),
		'section'     => 'most_popular_post_options',
		'default'     => 'rgba(0, 0, 0, 0.5)',
        'choices'     => [
			'alpha' => true,
		],
        'active_callback' => [
            [
                'setting'  => 'enable_most_popular_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'output' => array(
			array(
				'element'  => '.post-img .blog-reflection-popular-overlay',
				'property' => 'background-color',
			),
		),
	]
);


// Select Category 
new \Kirki\Field\Select(
    [
        'settings'    => 'popular_post_categorys',
        'label'       => esc_html__( 'Select Category ', 'blog-reflection' ),
        'section'     => 'most_popular_post_options',
        'default'     => array(1),
        'placeholder' => esc_html__( 'Choose an Category', 'blog-reflection' ),
        'multiple'    => 2,
        'choices'     => Kirki\Util\Helper::get_terms(array('taxonomy' => 'category')),
        'active_callback' => [
            [
                'setting'  => 'enable_most_popular_post',
                'operator' => '==',
                'value'    => true,
            ],
           
        ]
    ]
);



// popular post category number
new \Kirki\Field\Number(
    [
        'settings' => 'popular_post_category_number',
        'label'    => esc_html__( 'Visible Number of Category', 'blog-reflection' ),
        'section'  => 'most_popular_post_options',
        'default'  => 3,
        'choices'  => [
            'min'  => 1,
            'max'  => 3,
            'step' => 1,
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_most_popular_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],

       
    ]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'popular_post_category_number_pro',
		'label'       => esc_html__( 'Purchase Pro For Unlimited Dispaly Category', 'blog-reflection' ),
		'description' => blogreflection_purchase_link(),
		'section'     => 'most_popular_post_options',
		'default'     => '',
		'transport'   => 'auto',
		'active_callback' => [
			[
				'setting'  => 'enable_most_popular_post',
				'operator' => '===',
				'value'    => true,
			],
		],
	]
);
<?php
kirki::add_section('trend_slider_post_options', array(
    'title' => esc_html__('Trend Slider Post Section', 'blog-reflection'),
    'panel' => 'front-page-settings',
));

// pro fature  Trend Slider Post  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'enable_trend_slider_post_pro',
        'label'       => esc_html__( 'Enable Disable  Trend Slider Post Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'trend_slider_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/trend-slider-enable.jpg',
        ],
    ]
);


// Toggle Field: Choose between Category or Latest Post
new \Kirki\Field\Radio(
    [
        'settings'    => 'trand_slider_post_choose_cat_or_latest',
        'label'       => esc_html__( 'Select Hero two tranding post content type', 'blog-reflection' ),
        'section'     => 'trend_slider_post_options',
        'default'     => 'latest',
        'choices'     => [
            'latest'     => esc_html__( 'Latest Post', 'blog-reflection' ),
            'category' => esc_html__( 'Category', 'blog-reflection' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_trend_slider_post',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ]
);

// pro fature Category for  Trend Slider
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'trend_slider_post_category_pro',
        'label'       => esc_html__( 'Select Multiple Category for Trend Slider Post Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'trend_slider_post_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/trend-slider-cat.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_trend_slider_post',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'trand_slider_post_choose_cat_or_latest',
                'operator' => '==',
                'value'    => 'category',
            ],
           
        ],
    ]
);



// pro fature for Trend Post Filter
// new \Kirki\Field\Radio_Image(
//     [
//         'settings'    => 'trend_post_filter_pro',
//         'label'       => esc_html__( 'Trend Post filter Only Enable For Pro Version', 'blog-reflection' ),
//         'description' => blogreflection_purchase_link(),
//         'section'     => 'trend_slider_post_options',
//         'default'     => '',
//         'transport'   => 'auto',
//         'choices'     => [
//             'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/trend-post-filter.jpg',
//         ],
//         'active_callback' => [
//             [
//                 'setting'  => 'enable_trend_slider_post',
//                 'operator' => '==',
//                 'value'    => true,
//             ],
           
//         ],
//     ]
// );


//Slider Select Post order
new \Kirki\Field\Select(
    [
        'settings'    => 'blog_reflection_trend_slider_post_order',
        'label'       => esc_html__( 'Select Post Order', 'blog-reflection' ),
        'section'     => 'trend_slider_post_options',
        'default'     => 'desc',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_trend_slider_post',
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
        'settings'    => 'blog_reflection_trend_slider_post_order_by',
        'label'       => esc_html__( 'Selec Post Order By', 'blog-reflection' ),
        'section'     => 'trend_slider_post_options',
        'default'     => 'title',
        'placeholder' => esc_html__( 'Choose an option', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'enable_trend_slider_post',
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
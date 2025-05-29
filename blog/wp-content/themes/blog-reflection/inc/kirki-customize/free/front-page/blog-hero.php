<?php
new \Kirki\Section( 'hero_section_options', array(
    'title'    => esc_html__( 'Hero Selection Section', 'blog-reflection' ),
    'panel'    => 'front-page-settings',
    
    ) );

new \Kirki\Field\Checkbox_Switch(
    [
        'description'       => esc_html__( 'Enable Hero Main Section', 'blog-reflection' ),
        'section'     => 'hero_section_options',
        'settings'    => 'enable_news_main',
        'default'     => 'on',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'blog-reflection' ),
            'off' => esc_html__( 'Disable', 'blog-reflection' ),
        ],
    ]
);

// pro fature Blog  Section enable disable
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'select_hero_pro',
        'label'       => esc_html__( 'Hero Selection Section Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'hero_section_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/select-hero.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_news_main',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        'partial_refresh'    => [
			'blog_reflection_home_options_title_refresh' => [
				'selector'        => '.blog_reflection_hero',
				'render_callback' => 'blog_reflection_customizer_quick_edit',
			],
		],
    ]
);
/*
================================================================
Hero One design code start
================================================================
*/



// pro fature  Hero One Slider full width or container 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'hero_one_container_or_full_width_pro',
        'label'       => esc_html__( 'Hero Slider Full Width or Container Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'hero_section_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/fulwidth-container.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_news_main',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'select_hero',
                'operator' => '==',
                'value'    => 'one',
            ],
           
        ],
    ]
);


// pro fature  Hero One Slider Post and Image 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'hero_one_slider_repeater_pro',
        'label'       => esc_html__( 'Add Slider Post and Image Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'hero_section_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/slider-repeter.jpg',
        ],
        'active_callback' => [
            [
                'setting'  => 'enable_news_main',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'select_hero',
                'operator' => '==',
                'value'    => 'one',
            ],
           
        ],
    ]
);


// hero one repeter slider code Ends 


/*
================================================================
Hero One design code Ends
================================================================
*/
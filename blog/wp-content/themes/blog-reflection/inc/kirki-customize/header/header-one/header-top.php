<?php
Kirki::add_section( 'header_top_section', array(
	'title'    => esc_html__( 'Header Top', 'blog-reflection' ),
	'panel'    => 'header_options',
) );

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'header_top_enable',
		'description'       => esc_html__( 'Enable/Disable Top Header', 'blog-reflection' ),
		'section'     => 'header_top_section',
		'default'     => 'on',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
		],
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);


new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'enable_header_one_right_top_section',
		'description'       => esc_html__( 'Enable/Disable Top Header Left', 'blog-reflection' ),
		'section'     => 'header_top_section',
		'default'     => 'on',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
                'setting'  => 'header_top_enable',
                'operator' => '==',
                'value'    => true,
            ],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
		],
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);
// Phone Number Add
new \Kirki\Field\Text(
    [
        'settings' => 'blog_reflection_phone_number',
        'label'    => esc_html__( 'Add Your Phone Number', 'blog-reflection' ),
        'default'     => '+1-212-456-7890',
        'section'  => 'header_top_section',
		'active_callback' => [
            [
                'setting'  => 'sticky_header_enable',
                'operator' => '==',
                'value'    => true,
            ],
			[
                'setting'  => 'header_top_enable',
                'operator' => '==',
                'value'    => true,
            ],
			[
                'setting'  => 'enable_header_one_right_top_section',
                'operator' => '==',
                'value'    => true,
            ],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
        ],
    ]
);
// Email address Add
new \Kirki\Field\Text(
    [
        'settings' => 'blog_reflection_email',
        'label'    => esc_html__( 'Add Your Email', 'blog-reflection' ),
        'default'     => 'info@mycodecare.com',
        'section'  => 'header_top_section',
		'active_callback' => [
            [
                'setting'  => 'sticky_header_enable',
                'operator' => '==',
                'value'    => true,
            ],
			[
                'setting'  => 'header_top_enable',
                'operator' => '==',
                'value'    => true,
            ],
			[
                'setting'  => 'enable_header_one_right_top_section',
                'operator' => '==',
                'value'    => true,
            ],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
        ],
    ]
);
// Address Add code
new \Kirki\Field\Text(
    [
        'settings' => 'blog_reflection_office_address',
        'label'    => esc_html__( 'Add Your Office Address', 'blog-reflection' ),
        'default'     => '5 Oliver St, New York, NY 10038, USA',
        'section'  => 'header_top_section',
		'active_callback' => [
            [
                'setting'  => 'sticky_header_enable',
                'operator' => '==',
                'value'    => true,
            ],
			[
                'setting'  => 'header_top_enable',
                'operator' => '==',
                'value'    => true,
            ],
			[
                'setting'  => 'enable_header_one_right_top_section',
                'operator' => '==',
                'value'    => true,
            ],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
        ],
    ]
);

// Content color
new \Kirki\Field\Color(
	[
		'label'       => __( 'Content Color', 'blog-reflection' ),
		'description' => esc_html__( 'Add Content Color', 'blog-reflection' ),
		'section'     => 'header_top_section',
		'transport' => 'auto',
		'default'   => '',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'header_top_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
                'setting'  => 'enable_header_one_right_top_section',
                'operator' => '==',
                'value'    => true,
            ],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
		],
		'output' => array(
			array(
				'element'  => '.header-links.header-address li, .header-links.header-address a ',
				'property' => 'color',
			),
		),
	]
);
// Content color on hover
new \Kirki\Field\Color(
	[
		'label'       => __( 'Content Color On Hover', 'blog-reflection' ),
		'description' => esc_html__( 'Add Content Color Hover', 'blog-reflection' ),
		'section'     => 'header_top_section',
		'transport' => 'auto',
		'default'   => '',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'header_top_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
                'setting'  => 'enable_header_one_right_top_section',
                'operator' => '==',
                'value'    => true,
            ],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
		],
		'output' => array(
			array(
				'element'  => '.header-links.header-address li:hover, .header-links.header-address a:hover',
				'property' => 'color',
			),
		),
	]
);
//Right Section Start
//Search Hide/Show
new \Kirki\Field\Checkbox_Switch(
	[

		'label'       => esc_html__( 'Enable Search Button', 'blog-reflection' ),
		'section'     => 'header_top_section',
		'settings' => 'enable_bottom_search_section',
		'default'     => 'on',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'header_top_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
		],
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'blog-reflection' ),
			'off' => esc_html__( 'Disable', 'blog-reflection' ),
		],
	]
);
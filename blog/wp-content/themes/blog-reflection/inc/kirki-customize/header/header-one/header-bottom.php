<?php
Kirki::add_section( 'header_bottom_section', array(
	'title'    => esc_html__( 'Header Bottom', 'blog-reflection' ),
	'panel'    => 'header_options',
) );

//Active or deactive header bottom

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'header_bottom_enable',
		'description'       => esc_html__( 'Enable/Disable Bottom Header', 'blog-reflection' ),
		'section'     => 'header_bottom_section',
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


new \Kirki\Field\Color(
	[
		'label'       => __( 'Header Bottom Background', 'blog-reflection' ),
		'description' => esc_html__( 'Add Header Bottom Background Color', 'blog-reflection' ),
		'section'     => 'header_bottom_section',
		'transport' => 'auto',
		'default'   => '',
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
		'output' => array(
			array(
				'element'  => '.header-one .header-bottom',
				'property' => 'background',
                'suffix'   => ' !important',
			),
		),
	]
);

// pro fature Select Header 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'default_color_mode_pro',
        'label'       => esc_html__( 'Select Default Color Mode Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'header_bottom_section',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/dark-light-mode.jpg',
        ],
		'active_callback' => [
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			],
			[
				'setting'  => 'header_bottom_enable',
				'operator' => '==',
				'value'    => true,
			],
		],
    ]
);

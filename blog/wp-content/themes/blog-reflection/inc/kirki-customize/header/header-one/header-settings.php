<?php
Kirki::add_panel( 'header_options', array(
	'title'    => esc_html__( 'Header Options', 'blog-reflection' ),
	'priority' => 1
) );

/**
 * Start Select Header
 */
Kirki::add_section( 'select_header_options', array(
	'title'    => esc_html__( 'Header Select', 'blog-reflection' ),
	'panel'    => 'header_options',
) );

// pro fature Select Header 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'select_header_pro',
        'label'       => esc_html__( 'Select Header Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'select_header_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/header-selct.jpg',
        ],
    ]
);


// Sticky Wrapper Header Bg Color
new \Kirki\Field\Color(
	[
		'label'       => __( 'Sticky Header Background', 'blog-reflection' ),
		'description' => esc_html__( 'Add Sticky Header Background Color', 'blog-reflection' ),
		'section'     => 'select_header_options',
		'transport' => 'auto',
		'default'   => '',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
		],
		'output' => array(
			array(
				'element'  => '.sticky-wrapper.sticky .header-bottom',
				'property' => 'background',
                'suffix'   => ' !important',
			),
		),
	]
);
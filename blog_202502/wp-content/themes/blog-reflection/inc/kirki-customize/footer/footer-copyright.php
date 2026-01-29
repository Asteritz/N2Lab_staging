<?php
Kirki::add_section( 'footer_copyright_section', array(
    'title'    => esc_html__( 'Copyright', 'blog-reflection' ),
    'panel'    => 'footer_options',
) );

new \Kirki\Field\Text(
    [
        'settings' => 'copyright_setting',
        'label'    => esc_html__( 'Copyright Text', 'blog-reflection' ),
        'section'  => 'footer_copyright_section',
		'default'     => '© Copyright 2014-[Y] Blog Reflection. All rights reserved.',
		'partial_refresh'    => [
			'footer-copyright_text_refresh' => [
				'selector'        => '.copyright-text',
				'render_callback' => 'blog_reflection_copyright_customizer_quick_edit',
			],
		],
    ]
);

//Text Color
new \Kirki\Field\Color(
	[
		'settings'    => 'text_color_setting',
		'label'       => esc_html__( 'Text Color', 'blog-reflection' ),
		'description' => esc_html__( 'Add copyright text Color', 'blog-reflection' ),
		'section'     => 'footer_copyright_section',
		'default'     => '',
		 'output' => array(
		     array(
		         'element'  => '.copyright-text',
		         'property' => 'color',
		     ),
		 ),
	]
);

//copyright section bg color
new \Kirki\Field\Color(
	[
		'settings'    => 'bg_color_bottom_setting',
		'label'       => esc_html__( 'Copyright Text Background Color', 'blog-reflection' ),
		'description' => esc_html__( 'Change Copyright Background Color', 'blog-reflection' ),
		'section'     => 'footer_copyright_section',
		'default'     => '',
		'output' => array(
			array(
				'element'  => '.copyright-wrap',
				'property' => 'background',
			),
		),
	]
);



// pro fature Powerby Hide Show Control
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'powerby_hide_show_control_pro',
        'label'       => esc_html__( 'Powerby Hide Show Control Only Enable For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'footer_copyright_section',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/powerby-text.jpg',
        ],
    ]
);
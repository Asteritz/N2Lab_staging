<?php
Kirki::add_section( 'footer_typography_section', array(
    'title'    => esc_html__( 'Footer Typography', 'blog-reflection' ),
    'panel'    => 'footer_options',
) );

//Text Color
new \Kirki\Field\Color(
	[
		'settings'    => 'footer_text_color_setting',
		'label'       => esc_html__( 'Text Color', 'blog-reflection' ),
		'description' => esc_html__( 'Change Footer Text Color', 'blog-reflection' ),
		'section'     => 'footer_typography_section',
		'default'     => '',
		 'output' => array(
		     array(
		         'element'  => '.text-color-changer, footer h2',
		         'property' => 'color',
		     ),
		 ),
         
         'partial_refresh'    => [
			'footer-typography_setting_refresh' => [
				'selector'        => '.partial-refresh-footer',
				'render_callback' => 'blog_reflection_customizer_quick_edit',
			],
		], 
        'active_callback' => [
            [
                'setting'  => 'footer_enable',
                'operator' => '==',
                'value'    => true,
            ],
        ],
	]
);


//Div bg color
new \Kirki\Field\Color(
	[
		'settings'    => 'footer_bg_color_setting',
		'label'       => esc_html__( 'Background Color', 'blog-reflection' ),
		'description' => esc_html__( 'Change Footer Background Color', 'blog-reflection' ),
		'section'     => 'footer_typography_section',
		'default'     => '',
		'output' => array(
			array(
				'element'  => '.footer-typography-settings',
				'property' => 'background',
			),
		),
        'active_callback' => [
            [
                'setting'  => 'footer_enable',
                'operator' => '==',
                'value'    => true,
            ],
        ],
        
	]
);
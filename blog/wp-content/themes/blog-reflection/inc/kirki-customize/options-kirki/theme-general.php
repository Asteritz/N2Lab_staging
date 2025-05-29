<?php
Kirki::add_section( 'general_options', array(
	'title' => esc_html__( 'General Options', 'blog-reflection' ),
	'panel' => 'blog_reflection_theme_options',
) );

Kirki::add_field( 'theme_config', [
	'type'     => 'switch',
	'settings' => 'preloader_options',
	'label'    => esc_html__( 'Enable Preloader', 'blog-reflection' ),
	'section'  => 'general_options',
	'default'  => 'off',
	'choices'  => [
		'on'  => esc_html__( 'Enable', 'blog-reflection' ),
		'off' => esc_html__( 'Disable', 'blog-reflection' ),
	],
] );


//==========================
//popup subscribe form code start
//============================

Kirki::add_field( 'theme_config', [
	'type'     => 'switch',
	'settings' => 'popup_subscribe_options',
	'label'    => esc_html__( 'Enable Popup Subscribe', 'blog-reflection' ),
	'section'  => 'general_options',
	'default'  => 'off',
	'choices'  => [
		'on'  => esc_html__( 'Enable', 'blog-reflection' ),
		'off' => esc_html__( 'Disable', 'blog-reflection' ),
	],
] );

new \Kirki\Field\Text(
	[
		'settings'    => 'popup_subscribe_form_title',
		'label'       => esc_html__( 'Popup News Letter Title', 'blog-reflection' ),
		'section'     => 'general_options',
		'default'     => esc_html__( 'Subscribe', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'popup_subscribe_options',
                'operator' => '===',
                'value'    => true,
            ]
        ],
	]
);
new \Kirki\Field\Textarea(
	[
		'settings'    => 'popup_subscribe_form_text',
		'label'       => esc_html__( 'Popup News Letter Form Description', 'blog-reflection' ),
		'section'     => 'general_options',
		'default'     => esc_html__( 'Sign up to get update about us. Dont be hasitate your email is safe.', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'popup_subscribe_options',
                'operator' => '===',
                'value'    => true,
            ]
        ],
	]
);
// shortcode section

new \Kirki\Field\Text(
    [
        'settings'        => 'popup_newsletter_shortcode',
        'label'           => esc_html__( 'Shortcode', 'blog-reflection' ),
        'section'         => 'general_options',
        'default'         => '[contact-form-7 id="58d" title="Contact form 1"]',
        'active_callback' => [
            [
                'setting'  => 'popup_subscribe_options',
                'operator' => '===',
                'value'    => true,
            ]
        ],
    ]
);
new \Kirki\Field\Text(
	[
		'settings'    => 'popup_subscribe_form_checkbox_text',
		'label'       => esc_html__( 'Popup News Letter Check Box Text', 'blog-reflection' ),
		'section'     => 'general_options',
		'default'     => esc_html__( 'I dont want to see this popup again.', 'blog-reflection' ),
        'active_callback' => [
            [
                'setting'  => 'popup_subscribe_options',
                'operator' => '===',
                'value'    => true,
            ]
        ],
	]
);
// ==========================
//popup subscribe form code end
//============================


Kirki::add_field( 'theme_config', [
	'type'     => 'switch',
	'settings' => 'bottom_to_top',
	'label'    => esc_html__( 'Enable Bottom To Top', 'blog-reflection' ),
	'section'  => 'general_options',
	'default'  => 'on',
	'choices'  => [
		'on'  => esc_html__( 'Enable', 'blog-reflection' ),
		'off' => esc_html__( 'Disable', 'blog-reflection' ),
	],
] );

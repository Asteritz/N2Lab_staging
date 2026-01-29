<?php
Kirki::add_section( 'header_middle_section', array(
	'title'    => esc_html__( 'Header Middle', 'blog-reflection' ),
	'panel'    => 'header_options',
) );

//middle Header enable disable
new \Kirki\Field\Checkbox_Switch(
	[

		'description'       => esc_html__( 'Enable/Disable Middle Header', 'blog-reflection' ),
		'section'     => 'header_middle_section',
		'settings' => 'enable_middle_header',
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

// middle header Bg color
new \Kirki\Field\Color(
	[

		'label'       => __( 'Header Middle Background', 'blog-reflection' ),
		'description' => esc_html__( 'Add Header Middle Background Color', 'blog-reflection' ),
		'section'     => 'header_middle_section',
		'transport' => 'auto',
		'default'   => '',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_middle_header',
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
				'element'  => '.header-layout1 .header-one.header-middle',
				'property' => 'background',
			),
		),
	]
);

//Left Section Start
//Left Section Hide/Show
new \Kirki\Field\Checkbox_Switch(
	[

		'label'       => esc_html__( 'Enable Left Section', 'blog-reflection' ),
		'section'     => 'header_middle_section',
		'settings' => 'enable_right_section_new',
		'default'     => 'on',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_middle_header',
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

//Left Content color
new \Kirki\Field\Color(
	[
		'label'       => __( 'Left Side Content Color', 'blog-reflection' ),
		'description' => esc_html__( 'Add Content Color', 'blog-reflection' ),
		'section'     => 'header_middle_section',
		'transport' => 'auto',
		'default'   => '',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_middle_header',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_right_section_new',
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
				'element'  => '.header-one.header-links p',
				'property' => 'color',
			),
		),
	]
);

//Left Content color on hover
new \Kirki\Field\Color(
	[
		'label'       => __( 'Left Side Content Color On Hover', 'blog-reflection' ),
		'description' => esc_html__( 'Add Content Color Hover', 'blog-reflection' ),
		'section'     => 'header_middle_section',
		'transport' => 'auto',
		'default'   => '',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_middle_header',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_right_section_new',
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
				'element'  => '.header-one.header-links p:hover',
				'property' => 'color',
			),
		),
	]
);

//Hide show social media
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'header_social_enable',
		'label'       => esc_html__( 'Enable Social Media', 'blog-reflection' ),
		'section'     => 'header_middle_section',
		'default'     => 'on',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_middle_header',
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

new \Kirki\Field\Repeater(
	[
		'settings' => 'repeater_middle_section_icon',
		'label'    => esc_html__( 'Add Social Media', 'blog-reflection' ),
		'section'  => 'header_middle_section',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_middle_header',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'header_social_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'select_header',
				'operator' => '==',
				'value'    => 'one',
			]
		],
		'choices' => [
			'limit' => 2,
		],
		'default'  => [
			[
				'link_url'    => 'https://facebook.com/mycodecare',
				'social_icon' => 'fa-brands fa-facebook-f',


			],
			[
				'link_url'    => 'https://twitter.com/',
				'social_icon' => 'fa-brands fa-x-twitter',

			],
		],
		'fields'   => [
			'title'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'blog-reflection' ),
				'description' => esc_html__( 'Add title of social media', 'blog-reflection' ),
				'default'     => 'Facebook',
			],

			'link_url'    => [
				'type'        => 'url',
				'label'       => esc_html__( 'Link', 'blog-reflection' ),
				'description' => esc_html__( 'Add link of social media', 'blog-reflection' ),
				'default'     => '#',
			],

			'social_icon' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Select Icon', 'blog-reflection' ),
				'description' => esc_html__( 'Select Social Media Icon', 'blog-reflection' ),
				'default'     => 'fa-brands fa-facebook-f',
				'choices'     => [
					'fa-brands fa-facebook'     => esc_attr__( 'Facebook', 'blog-reflection' ),
					'fa-brands fa-facebook-f'     => esc_attr__( 'Facebook F Icon', 'blog-reflection' ),
					'fa-brands fa-square-facebook'     => esc_attr__( 'Facebook Square', 'blog-reflection' ),
					'fa-brands fa-x-twitter'  => esc_attr__( 'Twitter', 'blog-reflection' ),
					'fa-brands fa-square-x-twitter'  => esc_attr__( 'Twitter Square', 'blog-reflection' ),
					'fa-brands fa-twitter'  => esc_attr__( 'Twitter Birds', 'blog-reflection' ),
					'fa-brands fa-square-twitter'  => esc_attr__( 'Twitter Birds Square', 'blog-reflection' ),
					'fa-brands fa-linkedin-in'    => esc_attr__( 'Linkedin In', 'blog-reflection' ),
					'fa-brands fa-linkedin'    => esc_attr__( 'Linkedin', 'blog-reflection' ),
					'fa-brands fa-instagram'      => esc_attr__( 'Instagram', 'blog-reflection' ),
					'fa-brands fa-square-instagram'      => esc_attr__( 'Instagram Square', 'blog-reflection' ),
					'fa-brands fa-pinterest-p'      => esc_attr__( 'Pinterest P', 'blog-reflection' ),
					'fa-brands fa-pinterest'      => esc_attr__( 'Pinterest', 'blog-reflection' ),
					'fa-brands fa-dribbble'       => esc_attr__( 'Dribbble', 'blog-reflection' ),
					'fa-brands fa-vimeo'       => esc_attr__( 'Vimeo', 'blog-reflection' ),
					'fa-brands fa-vimeo-v'       => esc_attr__( 'Vimeo V', 'blog-reflection' ),
					'fa-brands fa-square-vimeo'       => esc_attr__( 'Vimeo Square', 'blog-reflection' ),
					'fa-brands fa-square-dribbble'       => esc_attr__( 'Dribbble Square', 'blog-reflection' ),
					'fab fa-behance'        => esc_attr__( 'Behance', 'blog-reflection' ),
					'fa-brands fa-square-behance'        => esc_attr__( 'Behance Square', 'blog-reflection' ),
					'fab fa-tiktok'         => esc_attr__( 'Tiktok', 'blog-reflection' ),
					'fa-brands fa-snapchat' => esc_attr__( 'Snapchat', 'blog-reflection' ),
					'fa-brands fa-square-snapchat' => esc_attr__( 'Snapchat Square', 'blog-reflection' ),
					'fa-brands fa-youtube'        => esc_attr__( 'Youtube', 'blog-reflection' ),
					'fa-brands fa-square-youtube'        => esc_attr__( 'Youtube Square', 'blog-reflection' ),
					'fa-brands fa-skype'        => esc_attr__( 'Skype', 'blog-reflection' ),
					'fab fa-weixin'         => esc_attr__( 'Weixin', 'blog-reflection' ),
					'fab fa-telegram'       => esc_attr__( 'Telegram', 'blog-reflection' ),
					'fab fa-reddit'         => esc_attr__( 'Reddit', 'blog-reflection' ),
					'fab fa-discord'        => esc_attr__( 'Discord', 'blog-reflection' ),
					'fa-brands fa-whatsapp'       => esc_attr__( 'Whatsapp', 'blog-reflection'),
					'fa-brands fa-square-whatsapp'       => esc_attr__( 'Whatsapp Square', 'blog-reflection'),
					'fa-brands fa-reddit-alien>'         => esc_attr__( 'Reddit Alien', 'blog-reflection' ),
					'fa-brands fa-square-reddit'         => esc_attr__( 'Reddit Square', 'blog-reflection' ),
					'fab fa-quora'          => esc_attr__( 'Quora', 'blog-reflection' ),
					'fa-brands fa-qq'          => esc_attr__( 'QQ', 'blog-reflection' ),
					'fa-brands fa-twitch'          => esc_attr__( 'Twitch', 'blog-reflection' ),
					'fa-brands fa-tumblr'          => esc_attr__( 'Tumblr', 'blog-reflection' ),
					'fa-brands fa-square-tumblr'          => esc_attr__( 'Tumblr Square', 'blog-reflection' ),
					'fa-brands fa-mastodon'          => esc_attr__( 'Mastodon', 'blog-reflection' ),
					'fa-brands fa-bluesky'          => esc_attr__( 'Bluesky', 'blog-reflection' ),
					'fa-brands fa-spotify'          => esc_attr__( 'Spotify', 'blog-reflection' ),
				],
				'icon_color'    => [
					'type'        => 'color',
					'label'       => esc_html__( 'Icon Color', 'blog-reflection' ),
					'description' => esc_html__( 'Add Social Icon Color', 'blog-reflection' ),
					'alpha'       => true,
					'transport'   => 'auto',
				],
				'color'    => [
					'type'        => 'color',
					'label'       => esc_attr__( 'Color', 'blog-reflection' ),
					'description' => esc_attr__( 'Pick a color', 'blog-reflection' ),
					'default'     => '', // Default color value
				],
			],
		],
	]
);



new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'repeater_middle_section_icon_pro',
		'label'       => esc_html__( 'Purchase Pro For More Social Media Add Option', 'blog-reflection' ),
		'description' => blogreflection_purchase_link(),
		'section'     => 'header_middle_section',
		'default'     => '',
		'transport'   => 'auto',
		'active_callback' => [
			[
				'setting'  => 'sticky_header_enable',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'enable_middle_header',
				'operator' => '==',
				'value'    => true,
			],
			[
				'setting'  => 'header_social_enable',
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
//Right Section End
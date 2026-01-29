<?php
Kirki::add_section( 'typography_options', array(
    'title' => esc_html__( 'Typography Options', 'blog-reflection' ),
    'panel' => 'blog_reflection_theme_options',
) );

new \Kirki\Field\Typography(
    [
        'settings'  => 'body_typography',
        'label'     => esc_html__( 'Body Typography', 'blog-reflection' ),
        'section'   => 'typography_options',
        'transport' => 'auto',
        'default'   => [
            'font-family'     => 'Outfit',
            'variant'         => 'regular',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '16px',
            'line-height'     => '27px',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'choices' => [
            'fonts' => [
                'google' => [ 'Outfit', 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
            ],
        ],
        'output'    => [
            [
                'element' => 'body',
                'important' => true,
            ],
        ],
    ]
);

new \Kirki\Field\Typography(
    [
        'settings'  => 'h1_typography',
        'label'     => esc_html__( 'H1 Typography', 'blog-reflection' ),
        'section'   => 'typography_options',
        'transport' => 'auto',
        'default'   => [
            'font-family'     => 'Outfit',
            'variant'         => '',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '',
            'line-height'     => '',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'choices' => [
            'fonts' => [
                'google' => [ 'Outfit', 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
            ],
        ],
        'output'    => [
            [
                'element' => 'h1',
                'important' => true,
            ],
        ],
    ]
);

new \Kirki\Field\Typography(
    [
        'settings'  => 'h2_typography',
        'label'     => esc_html__( 'H2 Typography', 'blog-reflection' ),
        'section'   => 'typography_options',
        'transport' => 'auto',
        'default'   => [
            'font-family'     => 'Outfit',
            'variant'         => '',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '',
            'line-height'     => '',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'choices' => [
            'fonts' => [
                'google' => [ 'Outfit', 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
            ],
        ],
        'output'    => [
            [
                'element' => 'h2',
                'important' => true,
            ],
        ],
    ]
);

new \Kirki\Field\Typography(
    [
        'settings'  => 'h3_typography',
        'label'     => esc_html__( 'H3 Typography', 'blog-reflection' ),
        'section'   => 'typography_options',
        'transport' => 'auto',
        'default'   => [
            'font-family'     => 'Outfit',
            'variant'         => '',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '',
            'line-height'     => '',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'choices' => [
            'fonts' => [
                'google' => [ 'Outfit', 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
            ],
        ],
        'output'    => [
            [
                'element' => 'h3',
                'important' => true,
            ],
        ],
    ]
);

new \Kirki\Field\Typography(
    [
        'settings'  => 'h4_typography',
        'label'     => esc_html__( 'H4 Typography', 'blog-reflection' ),
        'section'   => 'typography_options',
        'transport' => 'auto',
        'default'   => [
            'font-family'     => 'Outfit',
            'variant'         => '',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '',
            'line-height'     => '',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'choices' => [
            'fonts' => [
                'google' => [ 'Outfit', 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
            ],
        ],
        'output'    => [
            [
                'element' => 'h4',
                'important' => true,
            ],
        ],
    ]
);

new \Kirki\Field\Typography(
    [
        'settings'  => 'h5_typography',
        'label'     => esc_html__( 'H5 Typography', 'blog-reflection' ),
        'section'   => 'typography_options',
        'transport' => 'auto',
        'default'   => [
            'font-family'     => 'Outfit',
            'variant'         => '',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '',
            'line-height'     => '',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'choices' => [
            'fonts' => [
                'google' => [  'Outfit', 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
            ],
        ],
        'output'    => [
            [
                'element' => 'h5',
                'important' => true,
            ],
        ],
    ]
);

new \Kirki\Field\Typography(
    [
        'settings'  => 'h6_typography',
        'label'     => esc_html__( 'H6 Typography', 'blog-reflection' ),
        'section'   => 'typography_options',
        'transport' => 'auto',
        'default'   => [
            'font-family'     => 'Outfit',
            'variant'         => '',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '',
            'line-height'     => '',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'choices' => [
            'fonts' => [
                'google' => [ 'Outfit' ,'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
            ],
        ],
        'output'    => [
            [
                'element' => 'h6',
                'important' => true,
            ],
        ],
    ]
);

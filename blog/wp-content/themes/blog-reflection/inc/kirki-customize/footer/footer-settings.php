<?php
Kirki::add_panel( 'footer_options', array(
    'title'    => esc_html__( 'Footer Options', 'blog-reflection' ),
) );

/**
 * Start Select Footer
 */
Kirki::add_section( 'select_footer_options', array(
    'title'    => esc_html__( 'Footer Select', 'blog-reflection' ),
    'panel'    => 'footer_options',
) );

new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'footer_enable',
        'description'       => esc_html__( 'Enable/Disable Footer', 'blog-reflection' ),
        'section'     => 'select_footer_options',
        'default'     => 'on',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'blog-reflection' ),
            'off' => esc_html__( 'Disable', 'blog-reflection' ),
        ],
        
    ]
);



// pro fature  side bar enable disable code 
new \Kirki\Field\Radio_Image(
    [
        'settings'    => 'select_footer_pro',
        'label'       => esc_html__( 'Select Footer For Pro Version', 'blog-reflection' ),
        'description' => blogreflection_purchase_link(),
        'section'     => 'select_footer_options',
        'default'     => '',
        'transport'   => 'auto',
        'choices'     => [
            'sticker_pro_img'   => get_template_directory_uri() . '/assets/images/pro/select-footer.jpg',
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
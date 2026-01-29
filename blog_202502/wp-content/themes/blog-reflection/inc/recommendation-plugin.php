<?php
require_once BLOG_REFLECTION_INC_DIR . 'tgm/class-tgm-plugin-activation.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
add_action('tgmpa_register', 'my_theme_register_required_plugins');
function my_theme_register_required_plugins()
{
    $plugins = array(
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name' => 'Mail Chimp',
            'slug' => 'mailchimp-for-wp',
            'required' => false,
        ),
        array(
            'name' => 'Advanced Import: One Click Import',
            'slug' => 'advanced-import',
            'required' => false,
        ),
    );

    $config = array(
        'id' => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php',            // Parent menu slug.
        'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.
    );
    tgmpa($plugins, $config);
}
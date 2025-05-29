<?php // Creating the widget
class Blogreflection_Advertising_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'blogreflection_advertising_widget',
            __('Blogreflection: Advertising', 'blog-reflection'),
            array('description' => __('This widget is for Advertising.', 'blog-reflection'))
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $advertising_url = isset($instance['advertising-url']) ? $instance['advertising-url'] : '//mycodecare.com';
        $advertising_image_url = isset($instance['advertising-image-url']) ? $instance['advertising-image-url'] : '//mycodecare.com';

        echo wp_kses_post($args['before_widget']);
        if (!empty($title)) {
            echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
        }


        ?>
        
        <div class="widget widget_banner">
            <a href="<?php echo esc_url($advertising_url);?>">
                <img class="w-100" src="<?php echo esc_url($advertising_image_url ? $advertising_image_url : get_template_directory_uri() . '/assets/images/ads/widget-ads.jpg'); ?>" alt="Ads Image">
            </a>
        </div>

        <?php
       echo wp_kses_post($args['after_widget']);

    }

     // Widget Backend
     public function form($instance)
     {
        $title = !empty($instance['title']) ? $instance['title'] : __('Advertising', 'blog-reflection');
        $advertising_url = isset($instance['advertising-url']) ? $instance['advertising-url'] : '';
        $advertising_image_url = isset($instance['advertising-image-url']) ? $instance['advertising-image-url'] : '';
        
        ?>
        
        <p>
            <label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('title')); ?>" name="<?php echo esc_html($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_html($this->get_field_id('advertising-url')); ?>"><?php esc_html_e('Advertising Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('advertising-url')); ?>" name="<?php echo esc_html($this->get_field_name('advertising-url')); ?>" type="text" value="<?php echo esc_attr($advertising_url); ?>"/>
        </p>      
        <p>
            <label for="<?php echo esc_html($this->get_field_id('advertising-image-url')); ?>"><?php esc_html_e('Advertising Image Upload :', 'blog-reflection'); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_html($this->get_field_id('advertising-image-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('advertising-image-url')); ?>" type="text"
                value="<?php echo esc_attr($advertising_image_url); ?>"/>

            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'blog-reflection' ); ?></button>
        </p>   

        <?php
    }
    
    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['advertising-url'] = !empty($new_instance['advertising-url']) ? esc_url_raw($new_instance['advertising-url']) : '';
        $instance['advertising-image-url'] = !empty($new_instance['advertising-image-url']) ? esc_url_raw($new_instance['advertising-image-url']) : '';

        return $instance;
    }
}

// uploader script code 
function blog_reflection_widget_uploader_script() {
    // Register the script
    wp_register_script('widget-uploader', get_template_directory_uri() . '/assets/js/widget-uploader.js', array('jquery'), '1.0.0', true);
    
    // Enqueue the script only on the widgets admin page
    if (is_admin() && get_current_screen()->id === 'widgets') {
        wp_enqueue_media(); // Enqueue the WordPress media uploader
        wp_enqueue_script('widget-uploader');
    }
}
add_action('admin_enqueue_scripts', 'blog_reflection_widget_uploader_script');

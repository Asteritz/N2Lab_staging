<?php // Creating the widget
class Blogreflection_Social_Follow_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'blogreflection_social_follow_widget',
            __('Blogreflection: Follow Us Social Media', 'blog-reflection'),
            array('description' => __('This widget is for Follow Us Social Media.', 'blog-reflection'))
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        // instance facebook code 

        $fb_profile_url = (isset($instance['fb-profile-url'])) ? $instance['fb-profile-url'] : '//facebook.com';
        $fb_profile_image = isset($instance['fb-profile-image']) ? $instance['fb-profile-image'] : '//facebook.com';
       
        // instance Instagram code 

        $ins_profile_url = (isset($instance['ins-profile-url'])) ? $instance['ins-profile-url'] : '//instagram.com';
        $ins_profile_image = isset($instance['ins-profile-image']) ? $instance['ins-profile-image'] : '//instagram.com';

        // instance twitter code 

        $tw_profile_url = (isset($instance['tw-profile-url'])) ? $instance['tw-profile-url'] : '//twitter.com';
        $tw_profile_image = isset($instance['tw-profile-image']) ? $instance['tw-profile-image'] : '//twitter.com';

        // instance linkedin code 

        $ldn_profile_url = (isset($instance['ldn-profile-url'])) ? $instance['ldn-profile-url'] : '//linkedin.com';
        $ldn_profile_image = isset($instance['ldn-profile-image']) ? $instance['ldn-profile-image'] : '//linkedin.com';
        
        // instance vimeo code 

        $vm_profile_url = (isset($instance['vm-profile-url'])) ? $instance['vm-profile-url'] : '//vimeo.com';
        $vm_profile_image = isset($instance['vm-profile-image']) ? $instance['vm-profile-image'] : '//vimeo.com';

        // instance Youtube code 

        $yt_profile_url = (isset($instance['yt-profile-url'])) ? $instance['yt-profile-url'] : '//youtube.com';
        $yt_profile_image = isset($instance['yt-profile-image']) ? $instance['yt-profile-image'] : '//youtube.com';
        
        //display Title code  here
        
        echo wp_kses_post($args['before_widget']);
        if (!empty($title)) {
            echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
        }
        ?>

        <!-- display fontend code  strat -->
        <div class="blog-instagram-wrap mt-40">
            <a class="single-blog-instagram-wrap" href="<?php echo esc_url($fb_profile_url);?>">
                <img class="" src="<?php echo esc_url($fb_profile_image ? $fb_profile_image: get_template_directory_uri() . '/assets/images/no-image.jpg' ); ?>" alt="Facebook">
                <span class="blog-instagram-wrap-details">
                    <span class="blog-instagram-wrap-icon"><i class="fab fa-facebook"></i></span>  
                </span>
            </a>
            <a class="single-blog-instagram-wrap" href="<?php echo esc_url($ins_profile_url);?>">
                <img class="" src="<?php echo esc_url($ins_profile_image ? $ins_profile_image : get_template_directory_uri() . '/assets/images/no-image.jpg' ); ?>" alt="Instagram">
                <span class="blog-instagram-wrap-details">
                    <span class="blog-instagram-wrap-icon"><i class="fab fa-instagram"></i></span>  
                </span>
            </a>
            <a class="single-blog-instagram-wrap" href="<?php echo esc_url($tw_profile_url);?>">
                <img class="" src="<?php echo esc_url($tw_profile_image ? $tw_profile_image : get_template_directory_uri() . '/assets/images/no-image.jpg' ); ?>" alt="Twitter">
                <span class="blog-instagram-wrap-details">
                    <span class="blog-instagram-wrap-icon"><i class="fab fa-twitter"></i></span>  
                </span>
            </a>
            <a class="single-blog-instagram-wrap" href="<?php echo esc_url($ldn_profile_url);?>">
                <img class="" src="<?php echo esc_url($ldn_profile_image ? $ldn_profile_image : get_template_directory_uri() . '/assets/images/no-image.jpg' ); ?>" alt="Linkedin">
                <span class="blog-instagram-wrap-details">
                    <span class="blog-instagram-wrap-icon"><i class="fab fa-linkedin-in"></i></span>  
                </span>
            </a>
            <a class="single-blog-instagram-wrap" href="<?php echo esc_url($vm_profile_url);?>">
                <img class="" src="<?php echo esc_url($vm_profile_image ? $vm_profile_image : get_template_directory_uri() . '/assets/images/no-image.jpg' ); ?>" alt="Vimeo">
                <span class="blog-instagram-wrap-details">
                    <span class="blog-instagram-wrap-icon"><i class="fab fa-vimeo"></i></span>  
                </span>
            </a>
            <a class="single-blog-instagram-wrap" href="<?php echo esc_url($yt_profile_url);?>">
                <img class="" src="<?php echo esc_url($yt_profile_image ? $yt_profile_image : get_template_directory_uri() . '/assets/images/no-image.jpg' ); ?>" alt="Youtube">
                <span class="blog-instagram-wrap-details">
                    <span class="blog-instagram-wrap-icon"><i class="fab fa-youtube"></i></span>  
                </span>
            </a>

        </div>
        <!-- display fontend code  ends  -->
        
        <?php
        echo wp_kses_post($args['after_widget']);
    }

     // Widget Backend
     public function form($instance)
     {
        // title code 
        $title = !empty($instance['title']) ? $instance['title'] : __('Follow us', 'blog-reflection');


        // facebok image & url code start 

        $fb_profile_image = isset($instance['fb-profile-image']) ? $instance['fb-profile-image'] : '';
        if (isset($instance['fb-profile-url'])) {
            $fb_profile_url = $instance['fb-profile-url'];
        } else {
            $fb_profile_url = __('facebook.com', 'blog-reflection');
        }

        // Instagram image & url code start 

        $ins_profile_image = isset($instance['ins-profile-image']) ? $instance['ins-profile-image'] : '';
        if (isset($instance['ins-profile-url'])) {
            $ins_profile_url = $instance['ins-profile-url'];
        } else {
            $ins_profile_url = __('instagram.com', 'blog-reflection');
        }

         // Twitter image & url code start 

        $tw_profile_image = isset($instance['tw-profile-image']) ? $instance['tw-profile-image'] : '';
         if (isset($instance['tw-profile-url'])) {
            $tw_profile_url = $instance['tw-profile-url'];
        } else {
            $tw_profile_url = __('twitter.com', 'blog-reflection');
        }

         // Linkedin image & url code start 

        $ldn_profile_image = isset($instance['ldn-profile-image']) ? $instance['ldn-profile-image'] : '';
         if (isset($instance['ldn-profile-url'])) {
            $ldn_profile_url = $instance['ldn-profile-url'];
        } else {
            $ldn_profile_url = __('linkedin.com', 'blog-reflection');
        }
         // Vimeo image & url code start

         $vm_profile_image = isset($instance['vm-profile-image']) ? $instance['vm-profile-image'] : '';
         if (isset($instance['vm-profile-url'])) {
            $vm_profile_url = $instance['vm-profile-url'];
        } else {
            $vm_profile_url = __('vimeo.com', 'blog-reflection');
        }

         // Youtube image & url code start 

         $yt_profile_image = isset($instance['yt-profile-image']) ? $instance['yt-profile-image'] : '';
         if (isset($instance['yt-profile-url'])) {
            $yt_profile_url = $instance['yt-profile-url'];
        } else {
            $yt_profile_url = __('youtube.com', 'blog-reflection');
        }
        ?>

         <!-- title change code  -->
        <p>
            <label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('title')); ?>"
                name="<?php echo esc_html($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>"/>
        </p>   

        <!-- Facebook image upload and url code  -->

        <p>
            <label for="<?php echo esc_html($this->get_field_id('fb-profile-url')); ?>"><?php esc_html_e('Facebook Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('fb-profile-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('fb-profile-url')); ?>" type="text"
                value="<?php echo esc_attr($fb_profile_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('fb-profile-image')); ?>"><?php esc_html_e('Facebook Image Upload :', 'blog-reflection'); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_html($this->get_field_id('fb-profile-image')); ?>"
                name="<?php echo esc_html($this->get_field_name('fb-profile-image')); ?>" type="text"
                value="<?php echo esc_attr($fb_profile_image); ?>"/>

            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'blog-reflection' ); ?></button>
        </p>  
        
        <!-- instagram  image upload and url code  -->

        <p>
            <label for="<?php echo esc_html($this->get_field_id('ins-profile-url')); ?>"><?php esc_html_e('Inastagram Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('ins-profile-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('ins-profile-url')); ?>" type="text"
                value="<?php echo esc_attr($ins_profile_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('ins-profile-image')); ?>"><?php esc_html_e('Instagram Image Upload :', 'blog-reflection'); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_html($this->get_field_id('ins-profile-image')); ?>"
                name="<?php echo esc_html($this->get_field_name('ins-profile-image')); ?>" type="text"
                value="<?php echo esc_attr($ins_profile_image); ?>"/>

            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'blog-reflection' ); ?></button>
        </p>

        <!-- twitter  image upload and url code  -->

        <p>
            <label for="<?php echo esc_html($this->get_field_id('tw-profile-url')); ?>"><?php esc_html_e('Twitter Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('tw-profile-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('tw-profile-url')); ?>" type="text"
                value="<?php echo esc_attr($tw_profile_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('tw-profile-image')); ?>"><?php esc_html_e('Twitter Image Upload :', 'blog-reflection'); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_html($this->get_field_id('tw-profile-image')); ?>"
                name="<?php echo esc_html($this->get_field_name('tw-profile-image')); ?>" type="text"
                value="<?php echo esc_attr($tw_profile_image); ?>"/>

            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'blog-reflection' ); ?></button>
        </p>

        <!-- linkedin image upload and url code  -->

        <p>
            <label for="<?php echo esc_html($this->get_field_id('ldn-profile-url')); ?>"><?php esc_html_e('Linkedin Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('ldn-profile-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('ldn-profile-url')); ?>" type="text"
                value="<?php echo esc_attr($ldn_profile_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('ldn-profile-image')); ?>"><?php esc_html_e('Linkedin Image Upload :', 'blog-reflection'); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_html($this->get_field_id('ldn-profile-image')); ?>"
                name="<?php echo esc_html($this->get_field_name('ldn-profile-image')); ?>" type="text"
                value="<?php echo esc_attr($ldn_profile_image); ?>"/>

            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'blog-reflection' ); ?></button>
        </p>

        <!-- vimeo image upload and url code  -->
        <p>
            <label for="<?php echo esc_html($this->get_field_id('vm-profile-url')); ?>"><?php esc_html_e('Vimeo Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('vm-profile-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('vm-profile-url')); ?>" type="text"
                value="<?php echo esc_attr($vm_profile_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('vm-profile-image')); ?>"><?php esc_html_e('Vimeo Image Upload :', 'blog-reflection'); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_html($this->get_field_id('vm-profile-image')); ?>"
                name="<?php echo esc_html($this->get_field_name('vm-profile-image')); ?>" type="text"
                value="<?php echo esc_attr($vm_profile_image); ?>"/>

            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'blog-reflection' ); ?></button>
        </p>

        <!-- youtube image upload and url code  -->
        <p>
            <label for="<?php echo esc_html($this->get_field_id('yt-profile-url')); ?>"><?php esc_html_e('Youtube Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('yt-profile-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('yt-profile-url')); ?>" type="text"
                value="<?php echo esc_attr($yt_profile_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('yt-profile-image')); ?>"><?php esc_html_e('Youtube Image Upload :', 'blog-reflection'); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_html($this->get_field_id('yt-profile-image')); ?>"
                name="<?php echo esc_html($this->get_field_name('yt-profile-image')); ?>" type="text"
                value="<?php echo esc_attr($yt_profile_image); ?>"/>

            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'blog-reflection' ); ?></button>
        </p>

        <?php
    }
    
    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';

        $instance['fb-profile-url'] = (!empty($new_instance['fb-profile-url'])) ? sanitize_text_field($new_instance['fb-profile-url']) : '';
        $instance['fb-profile-image'] = !empty($new_instance['fb-profile-image']) ? sanitize_text_field($new_instance['fb-profile-image']) : '';

        $instance['ins-profile-url'] = (!empty($new_instance['ins-profile-url'])) ? sanitize_text_field($new_instance['ins-profile-url']) : '';
        $instance['ins-profile-image'] = !empty($new_instance['ins-profile-image']) ? sanitize_text_field($new_instance['ins-profile-image']) : '';

        $instance['tw-profile-url'] = (!empty($new_instance['tw-profile-url'])) ? sanitize_text_field($new_instance['tw-profile-url']) : '';
        $instance['tw-profile-image'] = !empty($new_instance['tw-profile-image']) ? sanitize_text_field($new_instance['tw-profile-image']) : '';

        $instance['ldn-profile-url'] = (!empty($new_instance['ldn-profile-url'])) ? sanitize_text_field($new_instance['ldn-profile-url']) : '';
        $instance['ldn-profile-image'] = !empty($new_instance['ldn-profile-image']) ? sanitize_text_field($new_instance['ldn-profile-image']) : '';

        $instance['vm-profile-url'] = (!empty($new_instance['vm-profile-url'])) ? sanitize_text_field($new_instance['vm-profile-url']) : '';
        $instance['vm-profile-image'] = !empty($new_instance['vm-profile-image']) ? sanitize_text_field($new_instance['vm-profile-image']) : '';

        $instance['yt-profile-url'] = (!empty($new_instance['yt-profile-url'])) ? sanitize_text_field($new_instance['yt-profile-url']) : '';
        $instance['yt-profile-image'] = !empty($new_instance['yt-profile-image']) ? sanitize_text_field($new_instance['yt-profile-image']) : '';

        return $instance;
    }
}
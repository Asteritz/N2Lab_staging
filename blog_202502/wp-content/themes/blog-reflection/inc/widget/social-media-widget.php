<?php
// Creating the widget
class Blogreflection_Social_Media_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'blogreflection_social_media_widget',

            // Widget name that will appear in UI
            __('Blogreflection: Social Media Flowers', 'blog-reflection'),

            // Widget description
            array('description' => __('This widget is for Social Media bar.', 'blog-reflection'),)
        );
    }
   
    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
         
        // facebook code 
        $fb_url = (isset($instance['fb-url'])) ? $instance['fb-url'] : '//facebook.com';
        $fb_follower = (isset($instance['fb-follower'])) ? $instance['fb-follower'] : '145250';

        // twitter code 
        $twitter_url = (isset($instance['twitter-url'])) ? $instance['twitter-url'] : '//twitter.com';
        $twitter_follower = (isset($instance['twitter-follower'])) ? $instance['twitter-follower'] : '0';

        // Likes code 
        $likes_url = (isset($instance['likes-url'])) ? $instance['likes-url'] : '//instragram.com';
        $likes_follower = (isset($instance['likes-follower'])) ? $instance['likes-follower'] : '0';

        // vimeo code 
        $vimeo_url = (isset($instance['vimeo-url'])) ? $instance['vimeo-url'] : '//vimeo.com';
        $vimeo_follower = (isset($instance['vimeo-follower'])) ? $instance['vimeo-follower'] : '0';

        // LinkedIn code 
        $linkedin_url = (isset($instance['linkedin-url'])) ? $instance['linkedin-url'] : '//linkedin.com';
        $linkedin_follower = (isset($instance['linkedin-follower'])) ? $instance['linkedin-follower'] : '0';

        // youtube code 
        $youtube_url = (isset($instance['youtube-url'])) ? $instance['youtube-url'] : '//youtube.com';
        $youtube_follower = (isset($instance['youtube-follower'])) ? $instance['youtube-follower'] : '0';

        // Before and after widget arguments are defined by themes
        echo wp_kses_post($args['before_widget']);
        if (!empty($title)) {
            echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
        }

        // Output the content
        ?>
        <div class="col-lg-4">
            <aside class="sidebar-sticky-area sidebar-area pt-0">
                <div class="widget social-widget">
                    <a class="single-social-widget" href="<?php echo esc_url($fb_url); ?>">
                        <span class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                        <div class="social-widget-details">
                            <h6 class="social-widget-title"><?php echo esc_html('Followers' , 'blog-reflection');?></h6>
                            <span class="follower"><?php echo esc_html($fb_follower); ?></span>
                        </div>
                    </a>
                    <a class="single-social-widget" href="<?php echo esc_url($twitter_url); ?>">
                        <span class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </span>
                        <div class="social-widget-details">
                            <h6 class="social-widget-title"><?php echo esc_html('Fans' , 'blog-reflection');?></h6>
                            <span class="follower"><?php echo esc_html($twitter_follower); ?></span>
                        </div>
                    </a>
                    <a class="single-social-widget" href="<?php echo esc_url($likes_url); ?>">
                        <span class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </span>
                        <div class="social-widget-details">
                            <h6 class="social-widget-title"><?php echo esc_html('Likes' , 'blog-reflection');?></h6>
                            <span class="follower"><?php echo esc_html($likes_follower); ?></span>
                        </div>
                    </a>
                    <a class="single-social-widget" href="<?php echo esc_url($vimeo_url); ?>">
                        <span class="social-icon">
                            <i class="fab fa-vimeo-v"></i>
                        </span>
                        <div class="social-widget-details">
                            <h6 class="social-widget-title"><?php echo esc_html('Comments' , 'blog-reflection');?></h6>
                            <span class="follower"><?php echo esc_html($vimeo_follower); ?></span>
                        </div>
                    </a>
                    <a class="single-social-widget" href="<?php echo esc_url($linkedin_url); ?>">
                        <span class="social-icon">
                            <i class="fab fa-linkedin"></i>
                        </span>
                        <div class="social-widget-details">
                            <h6 class="social-widget-title"><?php echo esc_html('Followers' , 'blog-reflection');?></h6>
                            <span class="follower"><?php echo esc_html($linkedin_follower); ?></span>
                        </div>
                    </a>
                    <a class="single-social-widget" href="<?php echo esc_url($youtube_url); ?>">
                        <span class="social-icon">
                            <i class="fab fa-youtube"></i>
                        </span>
                        <div class="social-widget-details">
                            <h6 class="social-widget-title"><?php echo esc_html('Subscriber' , 'blog-reflection');?></h6>
                            <span class="follower"><?php echo esc_html($youtube_follower); ?></span>
                        </div>
                    </a>
                </div>
            </aside>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    // Widget Backend
    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : __('Social Media Flowers', 'blog-reflection');

        // Facebook code
        $fb_url = isset($instance['fb-url']) ? $instance['fb-url'] : __('facebook.com', 'blog-reflection');

        // Twitter code
        $twitter_url = isset($instance['twitter-url']) ? $instance['twitter-url'] : __('twitter.com', 'blog-reflection');

        // Instagram Likes code
        $likes_url = isset($instance['likes-url']) ? $instance['likes-url'] : __('likes.com', 'blog-reflection');

        // Vimeo code
        $vimeo_url = isset($instance['vimeo-url']) ? $instance['vimeo-url'] : __('vimeo.com', 'blog-reflection');

        // LinkedIn code
        $linkedin_url = isset($instance['linkedin-url']) ? $instance['linkedin-url'] : __('linkedin.com', 'blog-reflection');

        // YouTube code
        $youtube_url = isset($instance['youtube-url']) ? $instance['youtube-url'] : __('youtube.com', 'blog-reflection');

        // Widget admin form
        ?>
        <p>
            <label for='<?php echo esc_attr($this->get_field_id('title')); ?>'><?php esc_html_e('Title:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_html($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>"/>
        </p>

        <!-- Facebook start -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('fb-url')); ?>"><?php esc_html_e('Facebook Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('fb-url')); ?>"
                name="<?php echo esc_attr($this->get_field_name('fb-url')); ?>" type="text"
                value="<?php echo esc_attr($fb_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('fb-follower')); ?>"><?php esc_html_e('Facebook follower:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fb-follower')); ?>"
                name="<?php echo esc_attr($this->get_field_name('fb-follower')); ?>" type="number"
                value="<?php echo esc_attr($fb_follower); ?>"/>
        </p>
        <!-- Facebook end -->

        <!-- Twitter start -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter-url')); ?>"><?php esc_html_e('Twitter Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter-url')); ?>"
                name="<?php echo esc_attr($this->get_field_name('twitter-url')); ?>" type="text"
                value="<?php echo esc_attr($twitter_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter-follower')); ?>"><?php esc_html_e('Twitter follower:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter-follower')); ?>"
                name="<?php echo esc_attr($this->get_field_name('twitter-follower')); ?>" type="number"
                value="<?php echo esc_attr($twitter_follower); ?>"/>
        </p>
        <!-- Twitter end -->

        <!-- Likes start -->
        <p>
            <label for="<?php echo esc_html($this->get_field_id('likes-url')); ?>"><?php esc_html_e('Likes Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('likes-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('likes-url')); ?>" type="text"
                value="<?php echo esc_attr($likes_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('likes-follower')); ?>"><?php esc_html_e('Likes:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('likes-follower')); ?>"
                name="<?php echo esc_html($this->get_field_name('likes-follower')); ?>" type="number"
                value="<?php echo esc_attr($likes_follower); ?>"/>
        </p>
        <!-- Likes end -->

        <!-- Vimeo start -->
        <p>
            <label for="<?php echo esc_html($this->get_field_id('vimeo-url')); ?>"><?php esc_html_e('Vimeo Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('vimeo-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('vimeo-url')); ?>" type="text"
                value="<?php echo esc_attr($vimeo_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('vimeo-follower')); ?>"><?php esc_html_e('Vimeo follower:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('vimeo-follower')); ?>"
                name="<?php echo esc_html($this->get_field_name('vimeo-follower')); ?>" type="number"
                value="<?php echo esc_attr($vimeo_follower); ?>"/>
        </p>
        <!-- Vimeo end -->

        <!-- LinkedIn start -->
        <p>
            <label for="<?php echo esc_html($this->get_field_id('linkedin-url')); ?>"><?php esc_html_e('LinkedIn Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('linkedin-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('linkedin-url')); ?>" type="text"
                value="<?php echo esc_attr($linkedin_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('linkedin-follower')); ?>"><?php esc_html_e('LinkedIn follower:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('linkedin-follower')); ?>"
                name="<?php echo esc_html($this->get_field_name('linkedin-follower')); ?>" type="number"
                value="<?php echo esc_attr($linkedin_follower); ?>"/>
        </p>
        <!-- LinkedIn end -->

        <!-- YouTube start -->
        <p>
            <label for="<?php echo esc_html($this->get_field_id('youtube-url')); ?>"><?php esc_html_e('YouTube Url:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('youtube-url')); ?>"
                name="<?php echo esc_html($this->get_field_name('youtube-url')); ?>" type="text"
                value="<?php echo esc_attr($youtube_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('youtube-follower')); ?>"><?php esc_html_e('YouTube follower:', 'blog-reflection'); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id('youtube-follower')); ?>"
                name="<?php echo esc_html($this->get_field_name('youtube-follower')); ?>" type="number"
                value="<?php echo esc_attr($youtube_follower); ?>"/>
        </p>
        <!-- YouTube end -->
        <?php
    }
   
    // Updating widget, replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        
        $instance['fb-url'] = (!empty($new_instance['fb-url'])) ? sanitize_text_field($new_instance['fb-url']) : '';
        $instance['fb-follower'] = (!empty($new_instance['fb-follower'])) ? sanitize_text_field($new_instance['fb-follower']) : '';
        
        $instance['twitter-url'] = (!empty($new_instance['twitter-url'])) ? sanitize_text_field($new_instance['twitter-url']) : '';
        $instance['twitter-follower'] = (!empty($new_instance['twitter-follower'])) ? sanitize_text_field($new_instance['twitter-follower']) : '';

        $instance['likes-url'] = (!empty($new_instance['likes-url'])) ? sanitize_text_field($new_instance['likes-url']) : '';
        $instance['likes-follower'] = (!empty($new_instance['likes-follower'])) ? sanitize_text_field($new_instance['likes-follower']) : '';

        $instance['vimeo-url'] = (!empty($new_instance['vimeo-url'])) ? sanitize_text_field($new_instance['vimeo-url']) : '';
        $instance['vimeo-follower'] = (!empty($new_instance['vimeo-follower'])) ? sanitize_text_field($new_instance['vimeo-follower']) : '';

        $instance['linkedin-url'] = (!empty($new_instance['linkedin-url'])) ? sanitize_text_field($new_instance['linkedin-url']) : '';
        $instance['linkedin-follower'] = (!empty($new_instance['linkedin-follower'])) ? sanitize_text_field($new_instance['linkedin-follower']) : '';

        $instance['youtube-url'] = (!empty($new_instance['youtube-url'])) ? sanitize_text_field($new_instance['youtube-url']) : '';
        $instance['youtube-follower'] = (!empty($new_instance['youtube-follower'])) ? sanitize_text_field($new_instance['youtube-follower']) : '';

        return $instance;
    }
}
?>
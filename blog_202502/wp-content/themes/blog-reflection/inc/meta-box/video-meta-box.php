<?php
// Add meta box for video URL and image gallery
function blog_reflection_add_custom_meta_box() {
    add_meta_box(
        'custom-meta-box',
        'Custom Features',
        'blog_reflection_render_custom_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'blog_reflection_add_custom_meta_box');

// Render meta box content
function blog_reflection_render_custom_meta_box($post) {
    // Retrieve current values if they exist
    $blog_reflection_video_url = get_post_meta($post->ID, 'video_url', true);
    $blog_reflection_image_gallery = get_post_meta($post->ID, 'image_gallery', true);

    // Output fields
    wp_nonce_field('custom_meta_box_nonce', 'custom_meta_box_nonce');
    ?>
    <div>
        <h4 class="blog-reflection-video-url">Video URL</h4>
        <input type="text" id="video-url" name="video_url" value="<?php echo esc_attr($blog_reflection_video_url); ?>" style="width:100%;">
    </div>
    <div>
        <h4 class="blog-reflection-image-gallery">Image Gallery</h4>
        <input type="hidden" id="image-gallery" name="image_gallery" value="<?php echo esc_attr($blog_reflection_image_gallery); ?>">
        <button id="upload-gallery-images" class="button">Upload Images</button>
        <ul id="gallery-preview">
            <?php
            if (!empty($blog_reflection_image_gallery)) {
                $gallery_images = explode(',', $blog_reflection_image_gallery);
                foreach ($gallery_images as $image_url) {
                    echo '<li><img src="' . esc_url($image_url) . '" style="max-width:100px;"/></li>';
                }
            }
            ?>
        </ul>
    </div>
    <?php
}

// Save meta box data
function blog_reflection_save_custom_meta_box($post_id) {
    // Check if nonce is set
    if (!isset($_POST['custom_meta_box_nonce'])) {
        return;
    }
    // Verify nonce
    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['custom_meta_box_nonce'])), 'custom_meta_box_nonce')) {
        return;
    }
    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Save video URL
    if (isset($_POST['video_url'])) {
        update_post_meta($post_id, 'video_url', sanitize_text_field(wp_unslash($_POST['video_url'])));
    }
    // Save image gallery
    if (isset($_POST['image_gallery'])) {
        update_post_meta($post_id, 'image_gallery', sanitize_text_field(wp_unslash($_POST['image_gallery'])));
    }
}
add_action('save_post', 'blog_reflection_save_custom_meta_box');

// Enqueue scripts for media uploader
function blog_reflection_enqueue_media_uploader() {
    if (is_admin()) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'blog_reflection_enqueue_media_uploader');

// JavaScript for media uploader
function blog_reflection_custom_media_uploader_script() {
    ?>
    <script>
        jQuery(document).ready(function($){
            $('#upload-gallery-images').on('click', function(e){
                e.preventDefault();
                var image_gallery = wp.media({
                    title: 'Upload Images for Gallery',
                    multiple: true
                }).open().on('select', function(){
                    var selection = image_gallery.state().get('selection');
                    var image_urls = [];
                    selection.each(function(attachment){
                        attachment = attachment.toJSON();
                        image_urls.push(attachment.url);
                    });
                    $('#image-gallery').val(image_urls.join(','));
                    $('#gallery-preview').empty();
                    image_urls.forEach(function(url){
                        $('#gallery-preview').append('<li><img src="' + url + '" style="max-width:100px;"/></li>');
                    });
                });
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'blog_reflection_custom_media_uploader_script');
?>

jQuery(document).ready(function($) {
    function toggle_media_meta_boxes() {

        var selectedFormat = $('button[aria-label^="Change format:"]').text().toLowerCase();
        // Video url
        $('.blog-reflection-video-url').hide();
        $('#video-url').hide();

        // image gallery
        $('.blog-reflection-image-gallery').hide();
        $('#image-gallery').hide();
        $('#upload-gallery-images').hide()

        if (selectedFormat === 'video') {
            // Video url
            $('.blog-reflection-video-url').show();
            $('#video-url').show();

            // image gallery
            $('.blog-reflection-image-gallery').hide();
            $('#image-gallery').hide();
            $('#upload-gallery-images').hide();
        }
        else if (selectedFormat === 'gallery') {

            // Video url
            $('.blog-reflection-video-url').hide();
            $('#video-url').hide();

            // image gallery
            $('.blog-reflection-image-gallery').show();
            $('#image-gallery').show();
            $('#upload-gallery-images').show();

        }
        else {
            // Video url
            $('.blog-reflection-video-url').hide();
            $('#video-url').hide();

            // image gallery
            $('.blog-reflection-image-gallery').hide();
            $('#image-gallery').hide();
            $('#upload-gallery-images').hide();
        }

    }
    // Check the post format every 300 milliseconds
    setInterval(toggle_media_meta_boxes, 300);
    // Handle the initial state function
    toggle_media_meta_boxes();
});
jQuery(document).ready(function($) {
    // Open the media uploader when the "Upload Image" button is clicked
    $(document).on('click', '.upload-image-button', function(e) {
        e.preventDefault();

        // Get the corresponding URL input field
        var urlInputField = $(this).siblings('.widget-image-url');

        // Create a new media frame or use an existing one
        var fileFrame = wp.media.frames.file_frame || wp.media({
            title: 'Select or upload an image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        // Set the handler for the selected image
        fileFrame.on('select', function() {
            var attachment = fileFrame.state().get('selection').first().toJSON();
            urlInputField.val(attachment.url);
        });

        // Open the media frame
        fileFrame.open();
    });

});


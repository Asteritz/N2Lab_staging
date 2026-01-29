<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog-Reflection
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="comments-wrap">
    <?php
    // Check if comments are open
    if (comments_open()) :
        // Get the comments count
        $comments_number = get_comments_number();
    ?>
    <h2 class="blog-inner-title"><?php echo esc_html($comments_number); ?> <?php esc_html('Comments' , 'blog-reflection'); ?></h2>
    <ul class="comment-list">
        <?php
        // List comments
        wp_list_comments(array(
            'style'       => 'ul',
            'avatar_size' => 80,
            'callback'    => 'custom_comment_template',
        ));
        ?>
    </ul>
    <?php endif; ?>

    <!-- Comment Form -->
    <div class="comment-form-wrapper">
        <?php comment_form(array('class_submit' => 'btn')); ?>
    </div>
</div>

<?php
// Custom comment template function
function custom_comment_template($comment, $args, $depth)
{
    ?>
    <li <?php comment_class('comment-item'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="post-comment">
            <div class="comment-avater">
                <?php echo get_avatar($comment, 80); ?>
            </div>
            <div class="comment-content">
                <span class="commented-on"><?php echo esc_html(get_comment_date('M j, Y', $comment)); ?></span>
                <h3 class="name"><?php echo esc_html(get_comment_author($comment)); ?></h3>
                <p class="text"><?php comment_text($comment); ?></p>
                <div class="reply_and_edit">
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply <i class="fas fa-reply"></i>', 'before' => '', 'after' => '')), $comment); ?>
                </div>
            </div>
        </div>
    <?php
}
?>

<?php
// Check if the post has comments
if ( have_comments() ) :
    // Display the comments
    ?>
    <div class="comments">
        <?php
        // Display comment pagination links
        paginate_comments_links();
        ?>
    </div>
    <?php
endif;
<?php
if ( post_password_required() ) {
    return;
}
?>
<div class="news_post_comments">
    <div class="comments_title">Comments</div>
    <?php if (have_comments()) : ?>
        <ul class="comments_list">
            <?php
                wp_list_comments( array(
                    'avatar_size' => 60,
                    'max_depth'   => 5,
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'type'        => 'comment',
                ) );
            ?>
        </ol>
    <?php endif; ?>
    <?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments">
            <?php _e( 'Comments are closed.' ); ?>
        </p>
    <?php endif; 
    comment_form(); 
    ?>
</div>
<?php
function _themename_comment_callback($comment, $args, $depth)
{
    ?>
    <li id="comment-<?php comment_ID();?>" <?php comment_class(['c-comment bypostauthor', $comment->comment_parent ? 'c-comment--child' : '']);?>>
        <article id="div-comment-<?php comment_ID();?>" class="c-comment__body">
            <?php if ($args['avatar_size'] != 0) {
        echo get_avatar($comment, $args['avatar_size'], false, false, array('class' => 'c-comment__avatar'));
    }
    ?>
            <?php edit_comment_link(esc_html__('Edit Comment', '_themename'), '<span class="c-comment__edit-link">', '</span>');?>

            <div class="c-comment__content">
                <div class="c-comment__author">
                    <?php echo get_comment_author_link($comment); ?>
                </div>
                <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>" class="c-comment__time">
                    <time datetime="<?php comment_time('c');?>">
                        <?php printf(esc_html__('%s ago', '_themename'), human_time_diff(get_comment_time('U'), current_time('U')));?>
                    </time>
                </a>
                <?php if ($comment->comment_approved == '0'): ?>
                    <p class="c-comment__awating-moderation"><?php esc_html_e('Your comment is awaiting moderation.', '_themename');?></p>
                <?php endif;?>
                <?php comment_text();?>
                <?php comment_reply_link(array(
        'depth' => $depth,
        'max_depth' => $args['max_depth'],
        'reply_text' => $args['reply_text'],
        'add_below' => 'div-comment',
        'before' => '<div class="c-comment__reply-link">',
        'after' => '</div>',
    ));?>
            </div>

        </article>
    </li>
    <?php
}

<?php $show_author = get_theme_mod('_themename_post_author', true);?>

<?php if ($show_author === true): ?>

<div class="c-post-author u-margin-bottom-20">
    <h2 class="u-screen-reader-text"><?php esc_attr_e('About The Author', '_themename');?></h2>
    <?php
$author_id = get_the_author_meta('ID');
$author_posts = get_the_author_posts();
$author_display = get_the_author();
$author_posts_url = get_author_posts_url($author_id);
$author_avatar = get_avatar($author_id, 265);
$author_description = get_the_author_meta('user_description');
$author_website = get_the_author_meta('user_url');
?>
<div class="c-post-author__avatar">
    <?php echo $author_avatar; ?>
</div>
<div class="c-post-author__content">
    <div class="c-post-author__title">
        <?php if ($author_website): ?>
            <a href="<?php echo esc_url($author_website); ?>" target="_blank">
        <?php endif;?>
            <?php esc_html_e($author_display);?>
        <?php if ($author_website): ?>
        </a>
        <?php endif;?>
    </div>
    <div class="c-post-author__info">
        <a href="<?php echo esc_url($author_posts_url); ?>">
         <?php printf(esc_html(_n('%s post', '%s posts', $author_posts, '_themename')), number_format_i18n($author_posts));?>
        </a>
    </div>
    <?php if ($author_description): ?>
    <div class="c-post-author__desc">
        <?php esc_html_e($author_description);?>
    </div>
    <?php endif;?>
</div>
</div>

<?php endif;?>
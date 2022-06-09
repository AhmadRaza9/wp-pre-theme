<?php
$content = apply_filters('the_content', get_the_content());
$videos = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
// var_dump($videos);

?>
<article <?php post_class("c-post u-margin-bottom-20");?>>
    <div class="c-post__inner">
        <?php if (has_post_thumbnail() || empty($videos) || is_single()): ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail('large');?>
            </div>
        <?php endif;?>
            <?php get_template_part('template-parts/post/header');?>
        <?php if (is_single()): ?>
            <div class="content c-post__content">
                <?php the_content();?>
                <?php wp_link_pages();?>
            </div>
        <?php else: ?>
            <div class="content c-post__excerpt">
                <?php the_excerpt();?>
            </div>
        <?php endif;?>
        <?php if (!is_single() && !empty($videos)): ?>
            <div class="c-post__video">
                <?php var_dump(strpos($videos[0], '<iframe'))?>
                <?php echo $videos[0]; ?>
            </div>
        <?php endif;?>
        <?php if (!is_single()): ?>
            <?php get_template_part('template-parts/post/footer');?>
        <?php endif;?>
     </div>
</article>

<article <?php post_class("c-post u-margin-bottom-20");?>>
    <div class="c-post__inner">
        <?php if (has_post_thumbnail()): ?>
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
        <?php if (!is_single()): ?>
            <?php get_template_part('template-parts/post/footer');?>
        <?php endif;?>
     </div>
</article>
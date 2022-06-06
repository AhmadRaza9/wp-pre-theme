
<article <?php post_class("c-post u-margin-bottom-20");?>>
    <div class="c-post__inner">
        <?php if (has_post_thumbnail()): ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail('large');?>
            </div>
        <?php endif;?>
        <header class="c-post__header">
            <?php if (is_single()): ?>
                <h1 class="c-post__single-title" >
                 <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" ><?php the_title();?></a>
                </h1>
            <?php else: ?>
                <h2 class="c-post__title" >
                 <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" ><?php the_title();?></a>
                </h2>
            <?php endif;?>

            <div class="meta-info c-post__meta">
                <?php _themename_post_meta();?>
            </div>
            <div class="c-post__category">
                <?php if (has_category()): ?>
                <div class="c-post__cats">
                    <?php $cat_lists = get_the_category_list(esc_html__(', '));?>
                    <?php printf(esc_html__('Categories: %s ', '_themename'), $cat_lists);?>
                </div>
                <?php endif;?>
                <?php if (has_tag()): ?>
                    <div class="c-post__tags">
                        <?php $tags_list = get_the_tag_list("<ul><li>", '</li><li>', "</li></ul>");?>
                        <?php echo "Tags: " . $tags_list; ?>
                    </div>
                <?php endif;?>
            </div>
        </header>

        <?php if (is_single()): ?>
            <div class="content c-post__content">
                <?php the_content();?>
            </div>
        <?php else: ?>
            <div class="content c-post__excerpt">
                <?php the_excerpt();?>
            </div>
        <?php endif;?>
        <?php if (is_single()): ?>
            <footer class="c-post__footer">

            </footer>
        <?php else: ?>

        <?php endif;?>
        <?php if (!is_single()) {_themename_read_more_link();}?>
     </div>
</article>
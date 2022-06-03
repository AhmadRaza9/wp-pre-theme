
<article <?php post_class("c-post u-margin-bottom-20");?>>
    <h2 class="c-post__title" >
        <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" ><?php the_title();?></a>
    </h2>
    <div class="meta-info c-post__meta">
        <?php _themename_post_meta();?>
    </div>
    <div class="content c-post__excerpt">
        <?php the_excerpt();?>
        <?php _themename_read_more_link();?>
        <?php _themename_BR();?>
        <?php echo _themename_delete_post(); ?>
        <?php _themename_BR();?>
        <?php $author = get_post_meta(get_the_ID(), 'author');?>
        <?php if (!empty(get_post_meta(get_the_ID(), 'author'))): ?>
            <?php echo "Author: " . $author[0] . ""; ?>
        <?php endif;?>
    </div>
    </article>
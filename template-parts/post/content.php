
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
    </div>
    </article>
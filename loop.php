<?php if (have_posts()) {?>
 <?php while (have_posts()) {?>
    <?php the_post();?>
        <?php get_template_part("template-parts/post/content");?>
 <?php }?>
 <div class="pagination">
    <?php the_posts_pagination();?>
    <?php do_action('_themename_after_pagination');?>
 </div>
<?php } else {?>
    <?php get_template_part("template-parts/post/content", "none");?>
<?php }?>
<?php if (have_posts()) {?>
    <?php while (have_posts()) {?>
        <?php the_post();?>
            <?php get_template_part("template-parts/post/content");?>
        <?php if (get_theme_mod('_themename_post_author', true)): ?>
            <?php get_template_part("template-parts/single/author");?>
        <?php endif;?>
        <?php get_template_part('template-parts/single/navigation');?>
        <?php if (comments_open() || get_comments_number()): ?>
            <?php comments_template();?>
        <?php endif;?>
    <?php }?>
<?php } else {?>
    <?php get_template_part("template-parts/post/content", "none");?>
<?php }?>
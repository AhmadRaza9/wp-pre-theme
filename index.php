<?php do_action('_themename_before_header');?>
<?php get_header();?>
<?php do_action('_themename_after_header');?>
<?php if (have_posts()) {?>
 <?php while (have_posts()) {?>
    <?php the_post();?>
    <h2>
        <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a>
    </h2>
    <div class="meta-info">
        <?php _themename_post_meta();?>
    </div>
    <div class="content">
        <?php the_excerpt();?>
        <?php _themename_read_more_link();?>
    </div>
 <?php }?>
 <div class="pagination">
    <?php the_posts_pagination();?>
    <?php do_action('_themename_after_pagination');?>
 </div>
<?php } else {?>
    <p> <?php echo apply_filters('_themename_no_posts_text', esc_html__('Sorry, no posts matched you criteria.', '_themename')); ?> </p>
<?php }?>


<?php do_action('_themename_before_footer');?>
<?php get_footer();?>
<?php do_action('_themename_after_footer');

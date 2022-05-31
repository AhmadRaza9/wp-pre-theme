<?php get_header();?>
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
 </div>
<?php } else {?>
    <p> <?php esc_html_e('Sorry, no posts matched you criteria.', '_themename');?> </p>
<?php }?>

<?php

$comments = 1;

printf(_n('This post have %s comment', 'This post have %s comments', 'This post have %s comments', $comments, '_themename'), $comments);
echo "<br/>";

$city = "Pakistan";

echo esc_html__('Your city is ', '_themename') . $city;
echo "<br/>";

printf(esc_html__('Your city is %s ', '_themename'), $city);
?>


<?php get_footer();?>

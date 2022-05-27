<?php get_header();?>
<?php if (have_posts()) {?>
 <?php while (have_posts()) {?>
    <?php the_post();?>
    <h2>
        <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a>
    </h2>
    <div class="meta-info">
        <?php firsttheme_post_meta();?>
    </div>
    <div class="content">
        <?php the_excerpt();?>
        <?php firsttheme_read_more_link();?>
    </div>
 <?php }?>
 <div class="pagination">
    <?php the_posts_pagination();?>
 </div>
<?php } else {?>
    <p> <?php esc_html_e('Sorry, no posts matched you criteria.', 'firsttheme');?> </p>
<?php }?>

<?php

$comments = 1;

printf(_n('This post have %s comment', 'This post have %s comments', 'This post have %s comments', $comments, 'firsttheme'), $comments);
echo "<br/>";

$city = "Pakistan";

echo esc_html__('Your city is ', 'firsttheme') . $city;
echo "<br/>";

printf(esc_html__('Your city is %s ', 'firsttheme'), $city);
?>


<?php get_footer();?>

<?php do_action('_themename_before_header');?>
<?php do_action('_themename_single_post_before_header');?>
<?php get_header();?>
<?php do_action('_themename_after_header');?>
<?php do_action('_themename_single_post_after_header');?>

<?php

$layout = _themenme_meta(get_the_ID(), '_newtheme_post_layout', 'full');
$sidebar = is_active_sidebar('primary-sidebar');

if ($layout === 'sidebar' && !$sidebar) {
    $layout = 'full';
}

?>

<div class="o-container u-margin-bottom-40 o-single-post-<?php echo $layout; ?>">
<div class="<?php echo $sidebar ? 'o-row' : 'o-full-row'; ?>">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $layout === 'sidebar' ? '8' : '12'; ?>@medium">
        <main role="main">

            <?php if (have_posts()) {?>
            <?php while (have_posts()) {?>
            <?php the_post();?>
            <?php get_template_part("template-parts/post/content");?>
            <?php }?>
            <?php } else {?>
            <?php get_template_part("template-parts/post/content", "none");?>
            <?php }?>

        </main>
        </div>
        <?php if ($layout === 'sidebar') {?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
            <?php get_sidebar();?>
        </div>
        <?php }?>
    </div>
</div>

<?php do_action('_themename_before_footer');?>
<?php do_action('_themename_single_post_before_footer');?>
<?php get_footer();?>
<?php do_action('_themename_after_footer');?>
<?php do_action('_themename_single_post_after_footer');?>

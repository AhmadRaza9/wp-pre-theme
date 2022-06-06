<?php do_action('_themename_before_header');?>
<?php get_header();?>
<?php do_action('_themename_after_header');?>
<div class="o-container u-margin-bottom-40">
    <div class="<?php echo is_active_sidebar('primary-sidebar') ? 'o-row' : 'o-full-row'; ?>">
        <div class="o-row__column o-row__column--span-12">
            <header>
                <?php the_archive_title('<h1>', '<h1>');?>
            </header>
        </div>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium" style="grid-column: 1;">
            <main role="main">
                <?php get_template_part('loop', 'archive');?>
            </main>
        </div>
            <?php if (is_active_sidebar('primary-sidebar')): ?>
            <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
                <?php get_sidebar();?>
            </div>
            <?php endif;?>
    </div>
</div>

<?php do_action('_themename_before_footer');?>
<?php get_footer();?>
<?php do_action('_themename_after_footer');

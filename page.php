<?php do_action('_themename_page_before_header');?>
<?php get_header();?>
<?php do_action('_themename_page_after_header');?>
<div class="o-container u-margin-bottom-40">
<div class="o-row">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
        <main role="main">
            <?php get_template_part('loop', 'page');?>
        </main>
        </div>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
            <?php get_sidebar();?>
        </div>
    </div>
</div>

<?php do_action('_themename_page_before_footer');?>
<?php get_footer();?>
<?php do_action('_themename_page_after_footer');?>

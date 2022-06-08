<?php
/**
 * Template Name: Blank
 */
?>
<?php get_header();?>
        <main role="main">
            <?php while (have_posts()): ?>
                <?php the_post();?>
                <article <?php post_class('');?>>
                    <?php the_title();?>
                    <?php the_content();?>
                </article>
            <?php endwhile;?>

        </main>

<?php get_footer();?>

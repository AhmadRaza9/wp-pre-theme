<?php get_header();?>

<div class="o-container u-margin-bottom-40">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12">
            <main role="main">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): ?>
                        <?php the_post();?>
                        <div class="single-portfolio-box">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="single-portfolio-img">
                                    <?php the_post_thumbnail('large');?>
                                </div>
                            <?php endif;?>
                                <div class="single-portfolio-content">
                                    <h1><?php the_title();?></h1>
                                    <?php the_content();?>
                                </div>
                        </div>
                    <?php endwhile?>
                <?php else: ?>
                    <?php esc_html_e('Sorry, no posts matched your criteria.', '_themename');?>
                <?php endif;?>
            </main>
        </div>
    </div>
</div>

<?php get_footer();?>

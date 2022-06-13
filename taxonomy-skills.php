<?php get_header();?>

<div class="o-container u-margin-bottom-40">
    <div class="o-row-full">
        <div class="o-row__column o-row__column--span-12">
            <main id="skills_tax" role="main" class="portfolio-grid portfolio-tax">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): ?>
                            <div class="portfolio-box portfolio-tax-box">
                                <?php the_post();?>
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="portfolio-image portfolio-tax-img">
                                        <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >
                                            <?php the_post_thumbnail('large');?>
                                        </a>
                                    </div>
                                <?php endif;?>
                                <div class="portfolio-content portfolio-tax-content">
                                    <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
                                        <?php the_title();?>
                                    </a>
                                    <?php the_excerpt();?>
                                </div>
                                <?php the_posts_pagination();?>
                            </div>
                            <?php endwhile;?>
                    <?php else: ?>
                        <?php esc_html_e('Sorry, no posts matched your criteria.', '_themename');?>
                    <?php endif;?>
            </main>
        </div>
    </div>
</div>

<?php get_footer();?>

<?php get_header();?>

<div class="o-container u-margin-bottom-40">
    <div class="o-row-full">
        <div class="o-row__column o-row__column--span-12">
            <main role="main" class="portfolio-grid">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): ?>
                            <div class="portfolio-box">
                                <?php the_post();?>
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="portfolio-image">
                                        <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >
                                            <?php the_post_thumbnail('large');?>
                                        </a>
                                    </div>
                                <?php endif;?>
                                <div class="portfolio-content">
                                    <div class="portfolio-tax-main">
                                        <?php do_action('_themename_portfolio_tax');?>
                                    </div>
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

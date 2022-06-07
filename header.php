<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
    <a class="u-skip-link" href="#main"><?php esc_attr_e('Skip to content', '_themename');?></a>
    <header class="header u-margin-bottom-40" role="banner">
        <div class="c-header">
            <div class="o-container u-flex u-align-justify u-align-middle">
                <div class="c-header__logo">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo();?>
                        <?php else: ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="c-heder__blogname">
                                <?php esc_html__(bloginfo('name'));?>
                            </a>
                            <?php endif;?>
                </div>
                <?php get_search_form(true);?>
            </div>
        </div>
        <div class="c-navigation">
            <div class="o-container">
                <nav class="header-nav" role="navigation" aria-label="<?php esc_html_e('Main Navigation', '_themename')?>">
                    <?php wp_nav_menu(array('theme_location' => 'main-menu'));?>
                </nav>
            </div>
        </div>
    </header>
    <!-- Container Start Here -->
<div id="main" class="container <?php echo (is_404()) ? "container-404" : ''; ?>">

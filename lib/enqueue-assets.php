<?php

function _themename_assets()
{
    wp_enqueue_style('_themename-stylesheet', get_template_directory_uri() . '/dist/asset/css/bundle.css', array(), '1.0.0', 'all');
    include get_template_directory() . '/lib/inline.css.php';

    wp_add_inline_style('_themename-stylesheet', $inline_styles);

    wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/dist/asset/js/bundle.js', array('jquery'), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', '_themename_assets', 10);

// function _themename_block_editor_assets()
// {
//     wp_enqueue_style('_themename_block_editor_stylesheet', get_template_directory_uri() . '/dist/asset/css/editor.css', array(), '1.0.0', 'all');
// }
// add_action('enqueue_block_editor_assets', '_themename_block_editor_assets');

function _themename_admin_assets()
{
    wp_enqueue_style('_themename-admin-stylesheet', get_template_directory_uri() . '/dist/asset/css/admin.css', array(), '1.0.0', 'all');
    wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri() . '/dist/asset/js/admin.js', array(), '1.0.0', false);

}

add_action('admin_enqueue_scripts', '_themename_admin_assets', 10);

function _themename_customize_preview_js()
{
    wp_enqueue_script('_themename_customize_preview', get_template_directory_uri() . '/dist/asset/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true);
    include get_template_directory() . '/lib/inline.css.php';
    wp_localize_script('_themename_customize_preview', '_themename', array('inline-css' => $inline_styles_selectors));
}

add_action('customize_preview_init', '_themename_customize_preview_js');

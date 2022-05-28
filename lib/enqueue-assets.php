<?php

function firsttheme_assets()
{
    wp_enqueue_style('firsttheme-stylesheet', get_template_directory_uri() . '/dist/asset/css/bundle.css', array(), 'all');
    wp_enqueue_script('firsttheme-scripts', get_template_directory_uri() . '/dist/asset/js/bundle.js', array(), false);
}
add_action('wp_enqueue_scripts', 'firsttheme_assets', 10);

function firsttheme_admin_assets()
{
    wp_enqueue_style('firsttheme-admin-stylesheet', get_template_directory_uri() . '/dist/asset/css/admin.css', array(), 'all');
    wp_enqueue_script('firsttheme-admin-scripts', get_template_directory_uri() . '/dist/asset/js/admin.js', array(), false);

}

add_action('admin_enqueue_scripts', 'firsttheme_admin_assets', 10);

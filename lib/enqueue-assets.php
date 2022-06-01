<?php

function _themename_assets()
{
    wp_enqueue_style('_themename-stylesheet', get_template_directory_uri() . '/dist/asset/css/bundle.css', array(), '1.0.0', 'all');
    wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/dist/asset/js/bundle.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', '_themename_assets', 10);

function _themename_admin_assets()
{
    wp_enqueue_style('_themename-admin-stylesheet', get_template_directory_uri() . '/dist/asset/css/admin.css', array(), '1.0.0', 'all');
    wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri() . '/dist/asset/js/admin.js', array(), '1.0.0', false);

}

add_action('admin_enqueue_scripts', '_themename_admin_assets', 10);

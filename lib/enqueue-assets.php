<?php

function firsttheme_assets()
{
    wp_enqueue_style('firsttheme-stylesheet', get_template_directory_uri() . '/dist/asset/css/bundle.css', array(), 'all');
}
add_action('wp_enqueue_scripts', 'firsttheme_assets', 10);

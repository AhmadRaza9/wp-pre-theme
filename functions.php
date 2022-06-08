<?php

require_once "lib/helpers.php";
require_once "lib/enqueue-assets.php";
require_once "lib/customize.php";
require_once "lib/sidebars.php";
require_once "lib/theme-support.php";
require_once "lib/navigation.php";
require_once "lib/include-plugins.php";
require_once "lib/comment-callback.php";

function _themename_handle_delete_post()
{
    if (isset($_GET['action']) && $_GET['action'] === '_themename_delete_post') {
        if (!isset($_GET['nonce']) || !wp_verify_nonce($_GET['nonce'], '_themename_delete_post_' . $_GET['post'])) {
            return;
        }
        $post_id = isset($_GET['post']) ? $_GET['post'] : null;
        $post = get_post((int) $post_id);
        if (empty($post)) {
            return;
        }
        if (!current_user_can('delete_posts', $post_id)) {
            echo "<script>alert('Cannot delete this post.')</script>";
            return;
        }
        wp_trash_post($post_id);
        wp_safe_redirect(home_url());

        die();
    }
}

add_action('init', '_themename_handle_delete_post');

// Register Shortcode

function themename_icon_button($atts = [], $content = null, $tag = '')
{
    $atts = shortcode_atts([
        'color' => 'red',
        'text' => 'Read More',
        'icon' => 'fas fa-book-reader',
    ], $atts, $tag);
    var_dump($atts);
    return '<button style="background-color:' . esc_attr($atts['color']) . '">' . $atts['text']
    . ' <i class="' . esc_attr($atts['icon']) . '" aria-hidden="true"></i></button>';
}

add_shortcode('themename_icon_button', 'themename_icon_button');

<?php

if (!function_exists('_themename_post_meta')) {
    function _themename_post_meta()
    {
        printf(
            esc_html__('Posted on %s ', '_themename'),
            '<a href="' . esc_url(get_permalink()) . '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date('l, F j, Y')) . '</time></a>'
        );

        printf(
            esc_html__('By %s ', '_themename'),
            '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . "</a>"
        );

    }
}
function _themename_read_more_link()
{

    echo '<a class="c-post__readmore" href="' . esc_url(get_the_permalink()) . '" title="' . esc_attr(the_title_attribute(['echo' => false])) . '">';
    printf(
        wp_kses(__('Read More <span class="u-screen-reader-text"> About %s </span>', '_themename'),
            [
                'span' => [
                    'class' => [],
                ],
            ]
        ),
        get_the_title() . '</a>'
    );

}

function _themename_delete_post()
{
    $url = add_query_arg([
        'action' => '_themename_delete_post',
        'post' => get_the_ID(),
        'nonce' => wp_create_nonce('_themename_delete_post_' . get_the_ID()),
    ], home_url());
    if (current_user_can('delete_post', get_the_ID())) {
        return "<a href='" . esc_url($url) . "'>" . esc_html__('Delete Post', '_themename') . "</a>";
    }
}

function _themename_BR()
{
    echo "<br/>";
}

function _themenme_meta($id, $key, $default)
{
    $value = get_post_meta($id, $key, true);
    if (!$value) {
        return $default;
    }
    return $value;
}

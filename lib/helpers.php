<?php
function firsttheme_post_meta()
{
    printf(
        esc_html__('Posted on %s ', 'firsttheme'),
        '<a href="' . esc_url(get_permalink()) . '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date('l, F j, Y')) . '</time></a>'
    );

    printf(
        esc_html__('By %s ', 'firsttheme'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . "</a>"
    );

}

function firsttheme_read_more_link()
{

    echo '<a href="' . esc_url(get_the_permalink()) . '" title="' . esc_attr(the_title_attribute(['echo' => false])) . '">';
    echo 'Read More <span class="u-screen-reader-text"> About ' . esc_html(get_the_title()) . '</span></a>';

}

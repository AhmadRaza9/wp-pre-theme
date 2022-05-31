<?php
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

function _themename_read_more_link()
{
    echo '<a href="' . esc_url(get_the_permalink()) . '" title="' . esc_attr(the_title_attribute(['echo' => false])) . '">';
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

// function after_pagination()
// {
//     echo "I love you janu!";
// }

// add_action('_themename_after_pagination', 'after_pagination', 10);

// function before_header()
// {
//     echo "I am from before header";
// }

// add_action('_themename_before_header', 'before_header', 10);

// function after_header()
// {
//     echo "I am from after header";
// }

// add_action('_themename_after_header', 'after_header', 10);

// function before_footer()
// {
//     echo "I am from before footer";
// }

// add_action('_themename_before_footer', 'before_footer', 10);

// function after_footer()
// {
//     echo "I am from after footer";
// }

// add_action('_themename_after_footer', 'after_footer', 10);

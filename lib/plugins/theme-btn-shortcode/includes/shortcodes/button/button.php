<?php

function themename_icon_button($atts = [], $content = null, $tag = '')
{
    $atts = shortcode_atts([
        'color' => 'red',
        'text' => 'Read More',
        'icon' => 'fas fa-book-reader',
    ], $atts, $tag);
    return '<button class="_themename_button" style="background-color:' . esc_attr($atts['color']) . '">' . $atts['text']
    . ' <i class="' . esc_attr($atts['icon']) . '" aria-hidden="true"></i></button>';
}

add_shortcode('themename_icon_button', 'themename_icon_button');

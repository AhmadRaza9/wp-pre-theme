<?php
$inline_styles_selectors = array(
    'a' => array(
        'color' => '_themename_accent_color',
    ),
    ':focus' => array(
        'outline-color' => '_themename_accent_color',
    ),
    '.c-post.sticky' => array(
        'border-left-color' => '_themename_accent_color',
    ),
    'button, input[type=submit]' => array(
        'background-color' => '_themename_accent_color',
    ),
    '.header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a' => array(
        'background-color' => '_themename_accent_color',
    ),
    '.header-nav .menu > .menu-item.mega > .sub-menu > .menu-item > .sub-menu a:hover' => array(
        'color' => '_themename_accent_color',
    ),
    '.header-nav .menu > .menu-item.mega > .sub-menu > .menu-item > a:hover' => array(
        'color' => '_themename_accent_color',
    ),
);

$inline_styles = "";

foreach ($inline_styles_selectors as $selector => $props) {
    $inline_styles .= "{$selector}{";
    foreach ($props as $prop => $value) {
        $inline_styles .= "{$prop}: " . sanitize_hex_color(get_theme_mod($value, '#20ddae')) . ";";
    }
    $inline_styles .= "}";
}

// $accent_color = sanitize_hex_color(get_theme_mod('_themename_accent_color', '#20ddae'));
// $inline_styles = "
//     a{
//         color: {$accent_color};
//     }
//     :focus {
//         outline-color:{$accent_color};
//     }
//     .c-post.sticky{
//         border-left-color: {$accent_color};
//     }
//     button, input[type=submit] {
//         background-color: {$accent_color};
//     }
//     .header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a {
//     background-color: {$accent_color};
//     color: #fff !important;
//     }
//     .header-nav .menu > .menu-item.mega > .sub-menu > .menu-item > .sub-menu a:hover {
//     color: {$accent_color};
//     }
//     .header-nav .menu > .menu-item.mega > .sub-menu > .menu-item > a:hover {
//     color: {$accent_color};
//     }
//     ::selection {
//     background: {$accent_color};
//     color: #ffffff;
//     }
// ";

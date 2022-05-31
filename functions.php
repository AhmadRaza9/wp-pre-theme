<?php

require_once "lib/helpers.php";
require_once "lib/enqueue-assets.php";

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

add_action('wp_head', 'function_to_add');

function function_to_add()
{
    echo "<style>
    body{
        background-color: #ff4500 !important;
        max-width: 1240px;
        margin: 0 auto;
    }
    </style>";
}

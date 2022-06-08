<?php
/*
Plugin Name:  themename Shortcodes
Plugin URI:
Description:  Adding Shortcode for firsttheme
Version:      1.0.0
Author:        Raza
Author URI:   http://ahmadraza.ga/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  shortcodes-firsttheme
Domain Path:  /languages
 */

if (!defined('WPINC')) {
    die;
}
function _themename__pluginame_init()
{
    include_once 'includes/shortcodes/button/button.php';
}

add_action('init', '_themename__pluginame_init');

include_once 'includes/enqueue-assets.php';

<?php
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

function _themename_register_required_plugins()
{
    $plugins = array(
        'name' => '_themename metaboxes',
        'slug' => '_themename_metaboxes',
        'source' => get_template_directory() . '/lib/plugins/firsttheme-metaboxes.zip',
        'required' => true,
        'version' => '1.0.0',
        'force_activation' => false,
        'force_deactivation' => false,
    );

    $config = array(

    );

    tgmpa($plugins, $config);
}

add_action('tgmpa_register', '_themename_register_required_plugins');

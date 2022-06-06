<?php

function _themename_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('', array(
        // 'settings' => array('blogname');
        'selector' => '.c-heder__blogname',
        'container_inclusive' => false,
        'render_callback' => function () {
            bloginfo('name');
        },
    ));

    $wp_customize->selective_refresh->add_partial('_themename_footer_partial', array(
        'settings' => array('_themename_site_info', '_themename_footer_bg', '_themename_footer_info_bg'),
        'selector' => '#footer',
        'container_inclusive' => true,
        'render_callback' => function () {
            get_template_part('template-parts/footer/widgets');
            get_template_part('template-parts/footer/info');
        },
    ));

    //  ==================== add footer options section =================
    $wp_customize->add_section('_themename_footer_options', array(
        'title' => esc_html__('Footer Options', '_themename'),
        'description' => esc_html__('You can change footer options from here.', '_themename'),
    ));

    $wp_customize->add_setting('_themename_site_info', array(
        'default' => '',
        'sanitize_callback' => '_themename_sanitize_site_info',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('_themename_site_info', array(
        'type' => 'text',
        'label' => esc_html__('Site Info', '_themename'),
        'section' => '_themename_footer_options',
    ));

    // add color for footer bg
    $wp_customize->add_setting('_themename_footer_bg', array(
        'default' => 'dark',
        'sanitize_callback' => '_themename_sanitize_footer_bg',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('_themename_footer_bg', array(
        'type' => 'select',
        'label' => esc_html__('Footer Background Color', '_themename'),
        'choices' => array(
            'light' => esc_html__('Light', '_themename'),
            'dark' => esc_html__('Dark', '_themename'),
        ),
        'section' => '_themename_footer_options',
    ));

    // add color for site info bg
    $wp_customize->add_setting('_themename_footer_info_bg', array(
        'default' => 'dark',
        'sanitize_callback' => '_themename_sanitize_footer_bg',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('_themename_footer_info_bg', array(
        'type' => 'select',
        'label' => esc_html__('Site Info Background Color', '_themename'),
        'choices' => array(
            'light' => esc_html__('Light', '_themename'),
            'dark' => esc_html__('Dark', '_themename'),
        ),
        'section' => '_themename_footer_options',
    ));

    // add column field for footer
    $wp_customize->add_setting('_themename_footer_layout', array(
        'default' => '3,3,3,3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'validate_callback' => '_themename_validate_footer_layout',
    ));

    $wp_customize->add_control('_themename_footer_layout', array(
        'type' => 'text',
        'label' => esc_html__('Footer Layout', '_themename'),
        'section' => '_themename_footer_options',
    ));

    //  ==================== add footer options section =================

    //  ==================== add general theme option section =================

    $wp_customize->add_section('_themename_general_options', array(
        'title' => esc_html__('General Options', '_themename'),
        'description' => esc_html__('You can change general options from here.', '_themename'),
    ));

    $wp_customize->add_setting('_themename_accent_color', array(
        'default' => '#20ddae',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, '_themename_accent_color', array(
        'label' => __('Accent Color', '_themename'),
        'section' => '_themename_general_options',
    )));

    //  ==================== add general theme option section =================

    //  ==================== add single post option section =================

    $wp_customize->add_section('_themename_single_post_options', array(
        'title' => esc_html__('Single Post Options', '_themename'),
        'description' => esc_html__('You can change single post option from here.', '_themename'),
    ));

    $wp_customize->add_setting('_themename_post_author', array(
        'default' => true,
        'sanitize_callback' => '_themename_sanitize_checkbox',
    ));

    $wp_customize->add_control('_themename_post_author', array(
        'type' => 'checkbox',
        'label' => __('Show Author under single post', '_themename'),
        'section' => '_themename_single_post_options',
    ));

}

add_action('customize_register', '_themename_customize_register', 10, 1);

/// Sanitization Functions
function _themename_validate_footer_layout($validity, $value)
{
    if (!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
        $validity->add('invalid_footer_layout', esc_html__('Footer layout is invalid', '_themename'));
    }
    return $validity;
}

function _themename_sanitize_footer_bg($input)
{
    $valid = array('light', 'dark');
    if (in_array($input, $valid, true)) {
        return $input;
    }
    return 'dark';
}

function _themename_sanitize_site_info($input)
{
    $allowed = array('a' => array(
        'href' => array(),
        'title' => array(),
    ));
    return wp_kses($input, $allowed);
}

function _themename_sanitize_checkbox($checked)
{
    return (isset($checked) && $checked === true) ? true : false;
}

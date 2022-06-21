<?php
// 1. Add metabox section
function _themename_add_meta_box()
{
    add_meta_box(
        '_themename_post_metabox',
        esc_html__('Post Settings', '_themename'),
        '_themename_post_metabox_html',
        'post',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', '_themename_add_meta_box');

// 2. Create html for metabox
function _themename_post_metabox_html($post)
{
    $subtitle = get_post_meta(get_the_ID($post->ID), '__themename_post_subtitle', true);
    $layout = get_post_meta(get_the_ID($post->ID), '__themename_post_layout', true);

    wp_nonce_field('_themename_update_post_metabox', '__themename_update_post_nonce');
    ?>
    <label for=""><?php esc_html_e('Post Subtitle', '_themename');?></label>
    <input type="text" class="widefat" name="_themename_post_subtitle_field" id="_themename_post_metabox_html" value="<?php echo esc_attr($subtitle); ?>">
    <label for="_themename_post_layout_field"><?php esc_html_e('Layout', '_themename');?></label>
    <select name="_themename_post_layout_field" id="_themename_post_layout_field" class="widefat">
        <option value="full" <?php selected($layout, 'full');?>><?php esc_html_e('Full Width', '_themename');?></option>
        <option value="sidebar" <?php selected($layout, 'sidebar');?>><?php esc_html_e('Post With Sidebar', '_themename');?></option>
    </select>
    <?php
}

// 3. Save metabox values

function _themename_save_post_metabox($post_id, $post)
{
    // get edit_post and edit_page capabilities;
    $edit_cap = get_post_type_object($post->post_type)->cap->edit_post;

    if (!current_user_can($edit_cap, $post_id)) {
        return;
    }

    if (
        !isset($_POST['__themename_update_post_nonce']) ||
        !wp_verify_nonce($_POST['__themename_update_post_nonce'], '_themename_update_post_metabox')) {
        return;
    }

    if (array_key_exists('_themename_post_subtitle_field', $_POST)) {
        update_post_meta(
            $post_id,
            '__themename_post_subtitle',
            sanitize_text_field($_POST['_themename_post_subtitle_field'])
        );
    }

    if (array_key_exists('_themename_post_layout_field', $_POST)) {
        update_post_meta(
            $post_id,
            '__themename_post_layout',
            sanitize_text_field($_POST['_themename_post_layout_field'])
        );
    }

}

add_action('save_post', '_themename_save_post_metabox', 10, 2);
<?php

function _themename_sanitize_sory_by($input)
{
    $valid = array('date', 'rand', 'comment_count');
    if (in_array($input, $valid, true)) {
        return $input;
    }
    return 'date';
}

class _themename_Most_Recent_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            '_themename_mst_recent_widget',
            esc_html__('Latest Posts', '_themename'),
            array(
                'description' => esc_html__('Some Description', '_themename'),
            )
        );
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = 'default';
        }

        if (isset($instance['post_count'])) {
            $post_count = $instance['post_count'];
        } else {
            $post_count = 3;
        }

        if (isset($instance['include_date'])) {
            $include_date = $instance['include_date'];
        } else {
            $include_date = 'off';
        }

        if (isset($instance['sort_by'])) {
            $sort_by = $instance['sort_by'];
        } else {
            $sort_by = 'date';
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', '_themename');?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>" name="<?php echo $this->get_field_name('title'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php esc_html_e('Number Of Posts', '_themename');?></label>
            <input type="number" value="<?php echo intval($post_count); ?>" class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" min="1" name="<?php echo $this->get_field_name('post_count'); ?>">
        </p>
        <p>
            <input <?php if ($include_date === 'on') {
            echo 'checked';
        }
        ?>  type="checkbox" id="<?php echo $this->get_field_id('include_date'); ?>" name="<?php echo $this->get_field_name('include_date'); ?>">
            <label for="<?php echo $this->get_field_id('include_date'); ?>"><?php esc_html_e('Include Date?', '_themename');?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('sort_by'); ?>"><?php esc_html_e('Sort By', '_themename');?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('sort_by'); ?>" id="<?php echo $this->get_field_id('sort_by'); ?>">
                <option <?php selected($sort_by, 'date');?> value="date"><?php esc_html_e('Most Recent', '_themename');?></option>
                <option <?php selected($sort_by, 'rand');?> value="rand"><?php esc_html_e('Random', '_themename');?></option>
                <option <?php selected($sort_by, 'comment_count');?> value="comment_count"><?php esc_html_e('Number Of Comments', '_themename');?></option>
            </select>
        </p>
        <?php
}

    public function widget($args, $instance)
    {
        echo "<h2>" . $instance['title'] . "</h2>";
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['post_count'] = intval($new_instance['post_count']);
        $instance['include_date'] = sanitize_text_field($new_instance['include_date']);
        $instance['sort_by'] = _themename_sanitize_sory_by($new_instance['sort_by']);
        return $instance;
    }
}

function _themename_register_most_recent_widget()
{
    register_widget('_themename_Most_Recent_Widget');
}

add_action('widgets_init', '_themename_register_most_recent_widget');

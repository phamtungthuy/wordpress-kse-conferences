<?php
/**
 * Plugin Name: My Table Plugin
 * Plugin URI: https://example.com/my-table-plugin
 * Description: A plugin to manage and display a table with title, description, and image fields.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://example.com
 */

// Đăng ký trang cài đặt
function my_table_plugin_register_settings_page() {
    add_options_page(
        'My Table Plugin Settings',
        'My Table Plugin',
        'manage_options',
        'my-table-plugin-settings',
        'my_table_plugin_render_settings_page'
    );
}
add_action('admin_menu', 'my_table_plugin_register_settings_page');

// Hiển thị trang cài đặt
function my_table_plugin_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>My Table Plugin Settings</h1>

        <form method="post" action="options.php?">
            <?php settings_fields('my_table_plugin_options'); ?>
            <?php do_settings_sections('my_table_plugin_options'); ?>
            <?php do_settings_sections('my-table-plugin-settings'); ?>

            <table class="my-table-plugin-table styled-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Image URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rows = get_option('my_table_plugin_options', array());

                    foreach ($rows as $index => $row) {
                        echo '<tr>';
                        echo '<td><input type="text" name="my_table_plugin_options[' . $index . '][title]" value="' . esc_attr($row['title']) . '"></td>';
                        echo '<td><textarea name="my_table_plugin_options[' . $index . '][description]">' . esc_textarea($row['description']) . '</textarea></td>';
                        echo '<td>';
                        echo '<input type="hidden" name="my_table_plugin_options[' . $index . '][image_id]" class="my-table-plugin-image-id" value="' . esc_attr($row['image_id']) . '">';
                        echo '<div class="my-table-plugin-image-preview">';
                        if ($row['image_id']) {
                            $image_url = wp_get_attachment_image_src($row['image_id'], 'thumbnail');
                            echo '<img src="' . esc_url($image_url[0]) . '" alt="Preview" style="max-width: 100%;">';
                        }
                        echo '</div>';
                        echo '<button type="button" class="button my-table-plugin-upload-button">Upload Image</button>';
                        echo '</td>';
                        echo '<td><input type="text" name="my_table_plugin_options[' . $index . '][image_url]" value="' . esc_attr($row['image_url']) . '"></td>';
                        echo '<td><button type="button" class="button button-secondary my-table-plugin-remove-row">Remove</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

            <button type="button" class="button button-primary my-table-plugin-add-row">Add Row</button>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function my_table_plugin_register_settings() {
    register_setting('my_table_plugin_options', 'my_table_plugin_options');
}
add_action('admin_init', 'my_table_plugin_register_settings');

function my_table_plugin_enqueue_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('my-table-plugin-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('my-table-plugin-style', plugin_dir_url(__FILE__) . 'style.css', array(), '1.0.0');

}
add_action('admin_enqueue_scripts', 'my_table_plugin_enqueue_scripts');
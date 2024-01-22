<?php
/**
 * Plugin Name: Test
 * Plugin URI: https://example.com/my-test-plugin
 * Description: A plugin to manage and display a test with title, description, and image fields.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://example.com
 */

// Đăng ký trang cài đặt
function my_test_plugin_register_settings_page() {
    add_options_page(
        'My Test Plugin Settings',
        'My Test Plugin',
        'manage_options',
        'my-test-plugin-settings',
        'my_test_plugin_render_settings_page'
    );
}
add_action('admin_menu', 'my_test_plugin_register_settings_page');

// Hiển thị trang cài đặt
function my_test_plugin_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>My Test Plugin Settings</h1>

        <form method="post" action="options.php">
            <?php settings_fields('my_test_plugin_options'); ?>
            <?php do_settings_sections('my_test_plugin_options'); ?>

            <table class="my-test-plugin-test">
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
                    $rows = get_option('my_test_plugin_options', array());

                    foreach ($rows as $index => $row) {
                        echo '<tr>';
                        echo '<td><input type="text" name="my_test_plugin_options[' . $index . '][title]" value="' . esc_attr($row['title']) . '"></td>';
                        echo '<td><textarea name="my_test_plugin_options[' . $index . '][description]">' . esc_textarea($row['description']) . '</textarea></td>';
                        echo '<td>';
                        echo '<input type="hidden" name="my_test_plugin_options[' . $index . '][image_id]" class="my-test-plugin-image-id" value="' . esc_attr($row['image_id']) . '">';
                        echo '<div class="my-test-plugin-image-preview">';
                        if ($row['image_id']) {
                            $image_url = wp_get_attachment_image_src($row['image_id'], 'thumbnail');
                            echo '<img src="' . esc_url($image_url[0]) . '" alt="Preview" style="max-width: 100%;">';
                        }
                        echo '</div>';
                        echo '<button type="button" class="button my-test-plugin-upload-button">Upload Image</button>';
                        echo '</td>';
                        echo '<td><input type="text" name="my_test_plugin_options[' . $index . '][image_url]" value="' . esc_attr($row['image_url']) . '"></td>';

                        echo '<td><button type="button" class="button button-secondary my-test-plugin-remove-row">Remove</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

            <button type="button" class="button button-primary my-test-plugin-add-row">Add Row</button>
            <button type="button" id = "submit" >Submit</button>
            <a href="#" class="click_popup">Thông báo</a>
            <div class="loadpost_result"></div>
<a href="#" class="click_loadpost">Tải 5 bài mới nhất</a>
        </form>
    </div>
    <?php
}
function my_enqueue() {
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );
function my_test_plugin_enqueue_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('my-test-plugin-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'my_test_plugin_enqueue_scripts');

add_action('wp_ajax_my_test_plugin_save_data', 'my_test_plugin_save_data');
add_action( 'wp_ajax_nopriv_my_test_plugin_save_data', 'my_test_plugin_save_data');

function my_test_plugin_save_data() {
    $data = (isset($_POST['data']))?esc_attr($_POST['data']) : '';
    $rows = get_option('my_test_plugin_options', array());
    wp_send_json_success('Chào mừng bạn đến với '. $row);
    die();
}

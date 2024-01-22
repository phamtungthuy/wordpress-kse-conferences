<?php
/**
 * Plugin Name: Header background plugin
 * Plugin URI: https://example.com/my-image-plugin
 * Description: A plugin to manage and display a single image with description.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://example.com
 */

// Đoạn mã plugin sẽ được thêm sau
// Thêm mã sau vào hàm my_image_plugin_render_settings_page()

// Đăng ký các trường cài đặt

function my_image_plugin_settings_fields() {
    add_settings_section(
        'my_image_plugin_section',
        'Image Settings',
        'my_image_plugin_section_callback',
        'my-image-plugin-settings'
    );

    add_settings_field(
        'my_image_plugin_image_field',
        'Image',
        'my_image_plugin_image_field_callback',
        'my-image-plugin-settings',
        'my_image_plugin_section'
    );

    add_settings_field(
        'my_image_plugin_description_field',
        'Description',
        'my_image_plugin_description_field_callback',
        'my-image-plugin-settings',
        'my_image_plugin_section'
    );

    add_settings_field(
        'my_image_plugin_position_field',
        'Position',
        'my_image_plugin_position_field_callback',
        'my-image-plugin-settings',
        'my_image_plugin_section'
    );

    register_setting('my_image_plugin_options', 'my_image_plugin_options');
}
add_action('admin_init', 'my_image_plugin_settings_fields');


// Hiển thị trang cài đặt


// Callback functions cho các trường cài đặt
function my_image_plugin_section_callback() {
    echo '<p>Manage the image and description for your plugin.</p>';
}

// function my_image_plugin_image_field_callback() {
//     $options = get_option('my_image_plugin_options');
//     $image_url = isset($options['image_url']) ? esc_url($options['image_url']) : '';

//     echo '<input type="text" name="my_image_plugin_options[image_url]" value="' . $image_url . '" class="regular-text" />';
//     echo '<p class="description">Enter the URL of the image.</p>';
// }

function my_image_plugin_image_field_callback() {
    $options = get_option('my_image_plugin_options');
    $image_id = isset($options['image_id']) ? absint($options['image_id']) : 0;
    $image_url = wp_get_attachment_image_src($image_id, 'thumbnail');

    echo '<input type="hidden" name="my_image_plugin_options[image_id]" id="my-image-plugin-image-id" value="' . $image_id . '" />';
    echo '<div id="my-image-plugin-image-preview">';
    if ($image_url) {
        echo '<img src="' . $image_url[0] . '" alt="Preview" style="max-width: 100%;" />';
    }
    echo '</div>';
    echo '<p class="description">Drag and drop an image here or click the button below to upload a new image.</p>';
    echo '<button type="button" id="my-image-plugin-upload-button" class="button">Upload Image</button>';
}

function my_image_plugin_description_field_callback() {
    $options = get_option('my_image_plugin_options');
    $description = isset($options['description']) ? sanitize_text_field($options['description']) : '';

    echo '<textarea name="my_image_plugin_options[description]" rows="5" class="large-text">' . $description . '</textarea>';
    echo '<p class="description">Enter the description for the image.</p>';
}

function my_image_plugin_position_field_callback() {
    $options = get_option('my_image_plugin_options');
    $position = isset($options['position']) ? sanitize_text_field($options['position']) : '';

    echo '<input type="text" name="my_image_plugin_options[position]" value="' . $position . '" class="regular-text" />';
    echo '<p class="description">Enter the position information.</p>';
}



// Đăng ký trang cài đặt
function my_image_plugin_register_settings_page() {
    add_options_page(
        'My Image Plugin Settings',
        'Header Background Plugin',
        'manage_options',
        'my-image-plugin-settings',
        'my_image_plugin_render_settings_page'
    );
}
add_action('admin_menu', 'my_image_plugin_register_settings_page');



// Thêm mã JavaScript để hỗ trợ kéo và thả ảnh


function my_image_plugin_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>My Image Plugin Settings</h1>

        <form method="post" action="options.php" class="custom-form">
            <?php settings_fields('my_image_plugin_options'); ?>
            <?php do_settings_sections('my-image-plugin-settings'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}


function my_image_plugin_enqueue_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('my-image-plugin-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('my-image-plugin-style', plugin_dir_url(__FILE__) . 'style.css', array(), '1.0.0');
}
add_action('admin_enqueue_scripts', 'my_image_plugin_enqueue_scripts');



// Đăng ký kích thước hình ảnh mới
function my_image_plugin_add_image_sizes() {
    add_image_size('my_image_plugin_size', 300, 1300, true);
}
add_action('init', 'my_image_plugin_add_image_sizes');



jQuery(document).ready(function($) {
    // Xử lý sự kiện click nút Add Row
    $('.my-test-plugin-add-row').on('click', function() {
        var rowHtml = '<tr>' +
            '<td><input type="text" name="my_test_plugin_options[new_row][title]"></td>' +
            '<td><textarea name="my_test_plugin_options[new_row][description]"></textarea></td>' +
            '<td>' +
            '<input type="hidden" name="my_test_plugin_options[new_row][image_id]" class="my-test-plugin-image-id" value="">' +
            '<div class="my-test-plugin-image-preview"></div>' +
            '<button type="button" class="button my-test-plugin-upload-button">Upload Image</button>' +
            '</td>' +
            '<td><input type="text" name="my_test_plugin_options[new_row][image_url]"></td>' +
            '<td><button type="button" class="button button-secondary my-test-plugin-remove-row">Remove</button></td>' +
            '</tr>';

        $('.my-test-plugin-test tbody').append(rowHtml);
    });

    // Xử lý sự kiện click nút Remove Row
    $('.my-test-plugin-test').on('click', '.my-test-plugin-remove-row', function() {
        $(this).closest('tr').remove();
    });

    // Xử lý sự kiện click nút Upload Image
    $('.my-test-plugin-test').on('click', '.my-test-plugin-upload-button', function() {
        var button = $(this);
        var imagePreview = button.siblings('.my-test-plugin-image-preview');
        var imageIdField = button.siblings('.my-test-plugin-image-id');

        // Tạo một trình chọn hình ảnh mới
        var mediaUploader = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Select'
            },
            multiple: false
        });

        // Xử lý sự kiện khi hình ảnh được chọn
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();

            // Hiển thị hình ảnh được chọn và lưu ID hình ảnh
            imagePreview.html('<img src="' + attachment.url + '" alt="Preview" style="max-width: 100%;">');
            imageIdField.val(attachment.id);
        });

        // Mở trình chọn hình ảnh
        mediaUploader.open();
    });

    // Xử lý sự kiện khi gửi dữ liệu bằng Ajax
    // $('#submit').on('click', function(e) {
    //     console.log('hello');
    //     // Lấy dữ liệu từ bảng
    //     var formData = {
    //         action: 'my_test_plugin_save_data',
    //         data: $('.my-test-plugin-test tbody').serialize()
    //     };

    //     // Gửi yêu cầu Ajax
    //     $.ajax({
    //         url: ajaxurl,
    //         type: 'post',
    //         data: formData,
    //         success: function(response) {
    //             // alert('Data saved successfully.');
    //             if(response.success) {
    //                 alert(response.data);
    //             }
    //             else {
    //                 alert('Đã có lỗi xảy ra');
    //             }
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             console.log(jqXHR.responseText);
    //         }
    //     });
    // });
});


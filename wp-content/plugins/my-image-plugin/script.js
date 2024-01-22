jQuery(document).ready(function($) {
    var imageUploader = wp.media({
        title: 'Select Image',
        button: {
            text: 'Choose Image'
        },
        multiple: false
    });

    // Xử lý khi người dùng click vào nút Upload Image
    $('#my-image-plugin-upload-button').on('click', function(e) {
        e.preventDefault();

        // Mở media uploader
        imageUploader.open();
    });

    // Xử lý khi người dùng chọn ảnh và nhấn nút Choose Image
    imageUploader.on('select', function() {
        var attachment = imageUploader.state().get('selection').first().toJSON();

        // Hiển thị ảnh đã chọn
        $('#my-image-plugin-image-preview').html('<img src="' + attachment.url + '" alt="Preview" style="max-width: 100%;" />');

        // Lưu ID của ảnh vào trường ẩn
        $('#my-image-plugin-image-id').val(attachment.id);
    });
});

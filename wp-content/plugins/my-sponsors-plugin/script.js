jQuery(function($) {
    $(document).on('click', '.my-table-plugin-upload-button', function() {
        var button = $(this);

        // Create a media frame
        var frame = wp.media({
            title: 'Select Image',
            library: { type: 'image' },
            multiple: false,
        });

        // Handle image selection
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();

            // Set image ID and preview
            button.siblings('.my-table-plugin-image-id').val(attachment.id);
            button.siblings('.my-table-plugin-image-preview').html('<img src="' + attachment.url + '" alt="Preview" style="max-width: 100%;">');
        });

        // Open media frame
        frame.open();
    });

    $(document).on('click', '.my-table-plugin-remove-row', function() {
        $(this).closest('tr').remove();
    });

    $('.my-table-plugin-add-row').on('click', function() {
        var tableBody = $('.my-table-plugin-table tbody');
        var rowCount = tableBody.find('tr').length;

        var newRow = '<tr>' +
            '<td><input type="text" name="my_table_plugin_options[' + rowCount + '][title]"></td>' +
            '<td><textarea name="my_table_plugin_options[' + rowCount + '][description]"></textarea></td>' +
            '<td>' +
            '<input type="hidden" name="my_table_plugin_options[' + rowCount + '][image_id]" class="my-table-plugin-image-id">' +
            '<div class="my-table-plugin-image-preview"></div>' +
            '<button type="button" class="button my-table-plugin-upload-button">Upload Image</button>' +
            '</td>' +
            '<td><input type="text" name="my_table_plugin_options[' + rowCount + '][image_url]"></td>' +
            '<td><button type="button" class="button button-secondary my-table-plugin-remove-row">Remove</button></td>' +
            '</tr>';

        tableBody.append(newRow);
    });
});

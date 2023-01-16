require('./bootstrap');

$('[contenteditable]').on('input', function () {
    $.post('/update-editable-content', {
        id: $(this).data('id'),
    });
});

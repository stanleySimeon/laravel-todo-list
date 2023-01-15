require('./bootstrap');

$('[contenteditable]').on('input', function () {
    $.post('/update-editable-content', {
        content: $(this).html()
    });
});

$(document).on("click", ".place_type_edit", function () {
    let cat_id = $(this).attr('data-catid');
    let place_type_id = $(this).attr('data-id');
    let place_type_name = $(this).attr('data-name');
    let translations = JSON.parse($(this).attr('data-translations'));

    translations.forEach(function (value) {
        $(`input[name="${value.locale}[name]"]`).val(value.name);
    });

    $('#submit_add_place_type').hide();
    $('#submit_edit_place_type').show();
    $('#add_place_type_method').val('PUT');

    $('#category_id').val(cat_id);
    $('#place_type_id').val(place_type_id);
    $('#place_type_name').val(place_type_name);

    $('#modal_add_place_type').modal('show');
});

$(document).on("click", ".place_type_delete", function () {
    // $('.place_type_delete').click(function () {
    if (confirm('Are you sure? The place type that deleted can not restore!'))
        $(this).parent().submit();
});

$('#btn_add_place_type').click(function () {
    let selected_category_id = $('#select_category_id').val();
    $('#submit_add_place_type').show();
    $('#submit_edit_place_type').hide();
    $('#add_place_type_method').val('POST');
    $('#category_id').val(selected_category_id);
    $('#modal_add_place_type').modal('show');
});
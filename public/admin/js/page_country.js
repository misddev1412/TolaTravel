(function ($) {
    'use strict';

    $(document).on("click", ".country_edit", function () {
        let country_id = $(this).attr('data-id');
        let country_name = $(this).attr('data-name');
        let country_slug = $(this).attr('data-slug');

        $('#submit_add_country').hide();
        $('#submit_edit_country').show();
        $('#add_country_method').val('PUT');
        $('#country_id').val(country_id);
        $('#country_name').val(country_name);
        $('#country_slug').val(country_slug);

        $('#modal_add_country').modal('show');
    });

    $(document).on("click", ".country_delete", function () {
        if (confirm('Are you sure? The country that deleted can not restore!')) {
            $(this).parent().submit();
        }
    });

    $('#btn_add_country').click(function () {
        $('#submit_add_country').show();
        $('#submit_edit_country').hide();
        $('#add_country_method').val('POST');
        $('#modal_add_country').modal('show');
    });

    $('#country_name').keyup(function () {
        let country_name = $(this).val();
        let slug = toSlug(country_name);
        $('#country_slug').val(slug);
    });
})(jQuery);
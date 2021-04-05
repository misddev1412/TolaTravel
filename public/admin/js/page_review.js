(function ($) {
    'use strict';

    $(document).on("change", ".review_status", function () {
        let review_id = $(this).attr('data-id');
        let status = $(this).is(':checked');
        let data_resp = callAPI({
            url: getUrlAPI('/reviews/status', 'api'),
            method: "put",
            body: {
                "review_id": review_id,
                "status": status
            }
        });
        data_resp.then(res => {
            if (res.code === 200) {
                notify(res.message);
            } else {
                console.log(res);
                notify('Error!', 'error');
            }
        });
    });

    $(document).on("click", ".review_delete", function () {
        if (confirm('Are you sure? The review that deleted can not restore!'))
            $(this).parent().submit();
    });

})(jQuery);
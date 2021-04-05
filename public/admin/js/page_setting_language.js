(function ($) {
    'use strict';

    $('.language_default').change(function (e) {
        let language_id = e.currentTarget.getAttribute('data-id');
        let data_resp = callAPI({
            url: getUrlAPI('/languages/default', 'api'),
            method: "put",
            body: {
                "language_id": language_id
            }
        });
        data_resp.then(res => {
            if (res.code === 200) {
                notify(res.message);
                location.reload();
            } else {
                console.log(res);
                notify('Error!', 'error');
            }
        });
    });

})(jQuery);
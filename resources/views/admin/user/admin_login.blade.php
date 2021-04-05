<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Golo. Dashboard</title>
    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet">
    <script>
        var app_url = window.location.origin;
    </script>
</head>
<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ route('login') }}" method="POST" id="login_admin">
                    @csrf
                    <h1>Golo. Admin</h1>

                    <p id="login_error" class="red"></p>
                    <div>
                        <input type="text" class="form-control" name="email" value="" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" value="" required="" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" id="submit_login">Login</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>

<script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script>
    $('#login_admin').submit(function (event) {
        event.preventDefault();
        let $form = $(this);
        let formData = getFormData($form);
        $('#submit_login').html(`<i class="fa fa-spinner fa-spin"></i>`).prop('disabled', true);
        $.ajax({
            type: "POST",
            url: `${app_url}/login`,
            data: formData,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $('#submit_login').html('Login').prop('disabled', false);
                if (response.code === 200) {
                    window.location = `${app_url}/admincp`;
                } else {
                    $('#login_error').show().text(response.message);
                }
            },
            error: function (jqXHR) {
                $('#submit_login').html('Login').prop('disabled', false);
                var response = $.parseJSON(jqXHR.responseText);
                if (response.message) {
                    alert(response.message);
                }
            }
        });

    });

    /**
     * @param $form
     * return object
     */
    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};
        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }
</script>
</body>
</html>
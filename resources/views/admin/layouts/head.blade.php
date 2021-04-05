<title>Admin Dashboard</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="robots" content="nofollow">

<!-- Bootstrap -->
<link href="{{asset('/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{asset('/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<!-- NProgress -->
<link href="{{asset('/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
<!-- iCheck -->
<link href="{{asset('/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

<!-- bootstrap-progressbar -->
<link href="{{asset('/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
<!-- JQVMap -->
<link href="{{asset('/admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
<link href="{{asset('/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

<!-- switchery -->
<link href="{{asset('/admin/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">

<link href="{{asset('/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{asset('/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{asset('/admin/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">

{{--dataTables--}}
<link href="{{asset('/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<link href="{{asset('/admin/chosen/chosen.min.css')}}" rel="stylesheet" type="text/css"/>

<link href="{{asset('admin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">


<!-- Custom Theme Style -->
<link href="{{asset('/admin/build/css/custom.min.css')}}" rel="stylesheet">
<link href="{{asset('/admin/css/custom.css')}}" rel="stylesheet">
<link rel="icon" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script>
    var app_url = window.location.origin;
</script>
@stack('style')

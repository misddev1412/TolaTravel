<!-- jQuery -->
<script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
{{--<script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('/admin/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('/admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('/admin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('/admin/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset('/admin/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('/admin/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('/admin/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('/admin/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('/admin/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('/admin/vendors/Flot/jquery.flot.resize.js')}}"></script>
{{--Flot plugins--}}
<script src="{{asset('/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('/admin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('/admin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
{{--DateJS--}}
<script src="{{asset('/admin/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('/admin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
{{--bootstrap-daterangepicker--}}
<script src="{{asset('/admin/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

{{--switchery--}}
<script src="{{asset('/admin/vendors/switchery/dist/switchery.min.js')}}"></script>

<script src="{{asset('/admin/vendors/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/admin/vendors/morris.js/morris.min.js')}}"></script>

{{--pnotify--}}
<script src="{{asset('/admin/vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{asset('/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{asset('/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>

{{--dataTables--}}
<script src="{{asset('/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e8cgxme8kbsc3u65sf2y8iixj1z0mzqlejahfw9hp9yoi1to"></script>

<script src="{{asset('admin/chosen/chosen.jquery.min.js')}}"></script>

<script src="{{asset('admin/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('/admin/build/js/custom.min.js')}}"></script>
<script src="{{asset('/admin/js/commons.js?v=1.2')}}"></script>

@stack('scripts')

@if (session('error'))
    <script>
        notify("{{ session('error') }}", "error");
    </script>
@endif
@if (session('success'))
    <script>
        notify("{{ session('success') }}");
    </script>
@endif

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-2mhVoLX7oIOgRQ-6bxlJt4TF5k0xhWc&libraries=places&callback=placeMap"></script>

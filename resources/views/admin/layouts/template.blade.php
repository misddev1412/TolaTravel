<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            @include('admin.layouts.sidebar_menu')
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            @include('admin.layouts.top_nav')
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('main')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                lara.getgolo.com - version {{config('app.version')}}
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


@include('admin.layouts.footer')
</body>
</html>

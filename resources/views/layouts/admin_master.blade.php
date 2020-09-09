<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OSRU</title>
    <link href="{{ asset('/favicon.ico') }}" rel="icon">
    @yield('before-css')
    <link href="{{ asset('/bower_components/skote-template-assets/assets/css/bootstrap.min.css') }}"
          id="bootstrap-style"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/bower_components/skote-template-assets/assets/css/icons.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/bower_components/skote-template-assets/assets/css/app.min.css') }}"
          id="app-style"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/frontend/css/app.css') }}" rel="stylesheet">
</head>
<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('layouts.admin_header')
        @include('layouts.admin_menu')

        <div class="main-content">
            @yield('main-content')

            @include('layouts.admin_footer')
        </div>
    </div>

    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/js/app.js') }}"></script>
    <script src="{{ asset('/admin/js/app.js') }}"></script>
    @stack('after-js')
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OSRU - {{--{{ $title }}--}}</title>
    <link href="{{ asset('/favicon.ico') }}" rel="icon">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/css/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/css/bootsnav.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/owl-carousel/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/owl-carousel/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/css/fluidbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/osru-template-assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/css/app.css') }}" rel="stylesheet">
</head>
<body class="news-layout3">
    <div class="main-content animsition">
        <div class="page-outer-wrap">
            @include('layouts.header')

            @yield('main-content')

            @include('components.newsletter')
            @include('components.instagram')
        </div>
        @include('layouts.footer')
    </div>

    @include('components.auth_form')
    @include('components.search')

    <script data-cfasync="false"
            src="{{ asset('/bower_components/osru-template-assets/assets/js/email-encode.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/animsition.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/macy.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/ResizeSensor.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/jquery.gridrotator.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/parallax-background.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/jquery.simpleSocialShare.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/jquery.fluidbox.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/retina.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/jquery.shuffle.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/readingTime.min.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/custom.js') }}"></script>
    <script src="{{ asset('/bower_components/osru-template-assets/assets/js/rocket-loader.js') }}"></script>
    <script>
        const checkUserRoute = "{{ route('api.check.user') }}";
        const checkUsernameRoute = "{{ route('api.check.username') }}";
        const checkEmailRoute = "{{ route('api.check.email') }}";

        const failLoginMessage = "{{ trans('auth.login_email_fail') }}";
        const duplicateUsernameMessage = "{{ trans('auth.duplicate_username') }}";
        const duplicateEmailMessage = "{{ trans('auth.duplicate_email') }}";
        const passwordLengthMessage = "{{ trans('auth.password_length') }}";
        const notMatchPasswordMessage = "{{ trans('auth.not_match_password') }}";
        const facebookClientId = "{{ config('services.facebook.client_id') }}";
        @if ($errors->any())
            const checkLoginSocialErrors = true;
        @else
            const checkLoginSocialErrors = false;
        @endif
    </script>
    <script src="{{ asset('/frontend/js/app.js') }}"></script>
    @stack('after-js')
</body>
</html>

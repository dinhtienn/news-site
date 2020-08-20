@extends('layouts.frontend_master')

@yield('error-info')

@section('main-content')
    <div class="parallax page_header" data-parallax-bg-image="{{ asset('/bower_components/osru-template-assets/assets/images/header-bg.jpg') }}"
         data-parallax-direction="left">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{ $error_code }}</h3>
                    <ol class="breadcrumb">
                        <li><a href="#">{{ trans('errors.home') }}</a></li>
                        <li class="active">{{ $error_code }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="middle-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-text">
                        <h1>{{ $error_code_split_array[0] }}<span class="error bounce">{{ $error_code_split_array[1] }}</span><span>{{ $error_code_split_array[2] }}</span></h1>
                        <h3><span>{{ $error_message[0] }}</span><br class="hidden-xs"> {{ $error_message[1] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

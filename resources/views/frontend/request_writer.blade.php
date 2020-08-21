@extends('layouts.frontend_master')

@section('main-content')
    <div class="parallax page_header" data-parallax-bg-image="{{ asset('bower_components/osru-template-assets/assets/images/header-bg.jpg') }}"
         data-parallax-direction="left">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{ trans('app.request_writer') }}</h3>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)">{{ trans('app.home') }}</a></li>
                        <li class="active">{{ trans('app.request_writer') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12 p_r_40">
                    <div class="contact-info">
                        <div class="contact-form">
                            <h3>{{ trans('app.request_writer') }}</h3>
                            <div class="form-group row">
                                <label for="name2" class="col-sm-3 col-form-label">{{ trans('app.phone_number') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="name2" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="introduce" class="col-sm-3 col-form-label">{{ trans('app.introduce') }}</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="introduce" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cv" class="col-sm-3 col-form-label">CV</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="cv" type="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="salary" class="col-sm-3 col-form-label">{{ trans('app.salary') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="salary" type="number">
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn link-btn">{{ trans('app.submit') }} ⇾</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

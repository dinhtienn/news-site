@extends('layouts.frontend_master')

@section('main-content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contact-info">
                        <div class="contact-address">
                            <div class="contact-text">
                                <h3>{{ trans('app.contact') }}</h3>
                                <p>{{ config('company.info.short_description') }}</p>
                            </div>
                            <div class="address-info">
                                <div class="media">
                                    <div class="pull-left">
                                        <img src="{{ asset('bower_components/osru-template-assets/assets/images/icon/agenda.png') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="addon-title">{{ trans('app.address') }}</h4>
                                        <div class="addon-text">
                                            {{ config('company.info.address') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="address-info">
                                <div class="media">
                                    <div class="pull-left">
                                        <img src="{{ asset('bower_components/osru-template-assets/assets/images/icon/email.png') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="addon-title">{{ trans('app.email') }}</h4>
                                        <div class="addon-text">
                                            <a href="#">
                                                <strong>
                                                    <span class="__cf_email__">
                                                        {{ config('company.info.email') }}
                                                    </span>
                                                </strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="address-info">
                                <div class="media">
                                    <div class="pull-left">
                                        <img src="{{ asset('bower_components/osru-template-assets/assets/images/icon/phone.png') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="addon-title">{{ trans('app.phone_number') }}</h4>
                                        <div class="addon-text">
                                            {{ config('company.info.phone') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="contact-form">
                        <h3>{{ trans('app.feedback') }}</h3>
                        <a href="{{ config('company.feedback_route') }}"
                           class="btn link-btn"
                           target="_blank"
                        >
                            {{ trans('app.feedback') }} ⇾
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="height_30"></div>
    </div>
@endsection

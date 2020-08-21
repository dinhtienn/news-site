@extends('layouts.frontend_master')

@section('main-content')
    <div class="parallax page_header" data-parallax-bg-image="{{ asset('/bower_components/osru-template-assets/assets/images/header-bg.jpg') }}"
         data-parallax-direction="left">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{ trans('app.contact') }}</h3>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)">{{ trans('app.home') }}</a></li>
                        <li class="active">{{ trans('app.contact') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contact-info">
                        <div class="contact-address">
                            <div class="contact-text">
                                <h3>{{ trans('app.contact') }}</h3>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                            </div>
                            <div class="address-info">
                                <div class="media">
                                    <div class="pull-left">
                                        <img src="{{ asset('/bower_components/osru-template-assets/assets/images/icon/agenda.png') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="addon-title">{{ trans('app.address') }}</h4>
                                        <div class="addon-text"> 1355 Market Street, Suite 900<br>
                                            San Francisco, CA 94103
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="address-info">
                                <div class="media">
                                    <div class="pull-left">
                                        <img src="{{ asset('/bower_components/osru-template-assets/assets/images/icon/email.png') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="addon-title">{{ trans('app.email') }}</h4>
                                        <div class="addon-text"><a href="https://osruhtml.bdtask.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6a191f1a1a05181e2a0519181f040f1d1944090507">[email&#160;protected]</a><br>
                                            <a href="https://osruhtml.bdtask.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="145d7a727b547b6766617a7163673a777b79">[email&#160;protected]</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="address-info">
                                <div class="media">
                                    <div class="pull-left">
                                        <img src="{{ asset('/bower_components/osru-template-assets/assets/images/icon/phone.png') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="addon-title">{{ trans('app.phone_number') }}</h4>
                                        <div class="addon-text">Support: +123 456 789<br>
                                            Sales: +098 765 4321
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
                        <a href="javascript:void(0)" class="btn link-btn">{{ trans('app.feedback') }} ⇾</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="height_30"></div>
    </div>
@endsection

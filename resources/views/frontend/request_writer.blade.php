@extends('layouts.frontend_master')

@section('main-content')
    <div class="parallax page_header"
        data-parallax-bg-image="{{ asset('bower_components/osru-template-assets/assets/images/header-bg.jpg') }}"
        data-parallax-direction="left">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{ trans('app.request_writer') }}</h3>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">
                                {{ trans('app.home') }}
                            </a>
                        </li>
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
                            <form action="{{ route('writer-requests.store') }}"
                                enctype="multipart/form-data"
                                method="POST">
                                <h3>{{ trans('app.request_writer') }}</h3>
                                @csrf
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">
                                        {{ trans('app.phone_number') }}
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="phone"
                                            type="number"
                                            name="phone"
                                            value="{{ old('phone') }}"
                                            required>
                                        @error('phone')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">
                                        {{ trans('app.introduce') }}
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control"
                                                id="description"
                                                rows="10"
                                                name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cv" class="col-sm-3 col-form-label">
                                        CV
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="cv"
                                            name="cv_path"
                                            value="{{ old('cv_path') }}"
                                            type="file">
                                        @error('cv_path')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="salary" class="col-sm-3 col-form-label">
                                        {{ trans('app.salary') }}
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="salary"
                                            type="number"
                                            name="salary"
                                            value="{{ old('salary') }}"
                                            required>
                                        @error('salary')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn link-btn">
                                    {{ trans('app.submit') }} ⇾
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

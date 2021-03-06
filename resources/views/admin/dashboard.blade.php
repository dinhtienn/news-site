@extends('layouts.admin_master')

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">
                            {{ config('view.dashboard') }}
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">
                                        {{ config('view.dashboard') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ config('view.dashboard') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">
                                            {{ trans('app.welcome_back') }}
                                        </h5>
                                        <p>
                                            OSRU {{ config('view.dashboard') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('/bower_components/skote-template-assets/assets/images/profile-img.png') }}"
                                         alt="cover"
                                         class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{ asset(config('company.default_user_avatar')) }}"
                                             alt="avatar"
                                             class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">
                                        {{ auth()->user()->username }}
                                    </h5>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">
                                                    {{ auth()->user()->posts()->count() }}
                                                </h5>
                                                <p class="text-muted mb-0">
                                                    {{ trans('app.posts') }}
                                                </p>
                                            </div>
                                            @if (auth()->user()->role->name === 'writer')
                                                <div class="col-6">
                                                    <h5 class="font-size-15">
                                                        {{ $personalMonthSalary }} VNĐ
                                                    </h5>
                                                    <p class="text-muted mb-0">
                                                        {{ trans('app.month_salary') }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (auth()->user()->role->name === 'admin')
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">
                                                    {{ trans('app.posts') }}
                                                </p>
                                                <h4 class="mb-0">
                                                    {{ $monthPosts }}
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">
                                                    {{ trans('app.total_salary') }}
                                                </p>
                                                <h4 class="mb-0">
                                                    {{ $monthSalary }} VNĐ
                                                </h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-money font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">
                                                    {{ trans('app.month_views') }}
                                                </p>
                                                <h4 class="mb-0">
                                                    {{ $monthViews }}
                                                </h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-happy-heart-eyes font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if (auth()->user()->role->name === 'admin')
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">
                                {{ trans('app.most_posts_users') }}
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('app.username') }}</th>
                                            <th>{{ trans('app.email') }}</th>
                                            <th>{{ trans('app.joined_at') }}</th>
                                            <th>{{ trans('app.posts') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 0; @endphp
                                        @foreach ($topWriters as $writer)
                                            @php $index++; @endphp
                                            <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $writer->username }}</td>
                                                <td>{{ $writer->email }}</td>
                                                <td>
                                                    {{ $writer->created_at ? $writer->created_at->diffForHumans() : trans('app.no_info') }}
                                                </td>
                                                <td>
                                                    {{ $writer->posts()->count() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

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
                                        <img src="{{ asset('/bower_components/skote-template-assets/assets/images/users/avatar-2.jpg') }}"
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
                                                        $1245 {{-- Demo data --}}
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
                                                    1,235 {{-- Demo data --}}
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
                                                    $35, 723 {{-- Demo data --}}
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
                                                    $16.2 {{-- Demo data --}}
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
                                {{-- Demo data --}}
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Order ID</th>
                                            <th>Billing Name</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="text-body font-weight-bold">#SK2540</a> </td>
                                            <td>Neal Matthews</td>
                                            <td>
                                                07 Oct, 2019
                                            </td>
                                            <td>
                                                $400
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                            </td>
                                            <td>
                                                <i class="fab fa-cc-mastercard mr-1"></i> Mastercard
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-body font-weight-bold">
                                                    #SK2541
                                                </a>
                                            </td>
                                            <td>Jamal Burnett</td>
                                            <td>
                                                07 Oct, 2019
                                            </td>
                                            <td>
                                                $380
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-danger font-size-12">
                                                    Chargeback
                                                </span>
                                            </td>
                                            <td>
                                                <i class="fab fa-cc-visa mr-1"></i> Visa
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><a href="#" class="text-body font-weight-bold">#SK2544</a> </td>
                                        <td>Ronald Taylor</td>
                                        <td>
                                            04 Oct, 2019
                                        </td>
                                        <td>
                                            $404
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Refund</span>
                                        </td>
                                        <td>
                                            <i class="fab fa-cc-visa mr-1"></i> Visa
                                        </td>
                                    </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="text-body font-weight-bold">#SK2545</a> </td>
                                            <td>Jacob Hunter</td>
                                            <td>
                                                04 Oct, 2019
                                            </td>
                                            <td>
                                                $392
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                            </td>
                                            <td>
                                                <i class="fab fa-cc-paypal mr-1"></i> Paypal
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- End demo data --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

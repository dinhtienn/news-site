@extends('layouts.admin_master')

@section('before-css')
    <link href="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
@endsection

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">
                            {{ trans('app.pending_requests') }}
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">
                                        {{ config('view.dashboard') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ trans('app.pending_requests') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ trans('app.pending_requests') }}
                            </h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('app.username') }}</th>
                                        <th>{{ trans('app.email') }}</th>
                                        <th>{{ trans('app.phone_number') }}</th>
                                        <th>{{ trans('app.description') }}</th>
                                        <th>{{ trans('app.salary') }}</th>
                                        <th>{{ trans('app.action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $index = count($pendingRequests); @endphp
                                @foreach ($pendingRequests as $request)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $request->user->username }}</td>
                                        <td>{{ $request->user->email }}</td>
                                        <td>{{ $request->phone }}</td>
                                        <td>{{ $request->description }}</td>
                                        <td>{{ $request->salary }} VNĐ</td>
                                        <td>
                                            <a href="{{ asset("$request->cv_path") }}"
                                               class="btn btn-sm btn-primary"
                                               target="_blank">
                                                {{ trans('app.see') }}
                                            </a>
                                            <a href="{{ route('writer-requests.accept', ['id' => $request->id]) }}"
                                               class="btn btn-sm btn-success">
                                                {{ trans('app.accept') }}
                                            </a>
                                            <a href="{{ route('writer-requests.reject', ['id' => $request->id]) }}"
                                               class="btn btn-sm btn-danger">
                                                {{ trans('app.reject') }}
                                            </a>
                                        </td>
                                    </tr>
                                    @php $index--; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/js/pages/datatables.init.js') }}"></script>
@endpush

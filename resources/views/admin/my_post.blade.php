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
                            {{ trans('app.my_posts') }}
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">
                                        {{ config('view.dashboard') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ trans('app.my_posts') }}
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
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <h4 class="card-title">
                                        {{ trans('app.my_posts') }}
                                    </h4>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-right">
                                        <a href="{{ route('post.create') }}"
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
                                            <i class="mdi mdi-plus mr-1"></i>
                                            {{ trans('app.create') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('app.title') }}</th>
                                    <th>{{ trans('app.category') }}</th>
                                    <th>{{ trans('app.status') }}</th>
                                    <th>{{ trans('app.views_count') }}</th>
                                    <th>{{ trans('app.created_at') }}</th>
                                    <th>{{ trans('app.action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $index = count($posts); @endphp
                                @foreach ($posts as $post)
                                    @php $status = config("company.status_post.$post->status"); @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ trans("app.$status") }}</td>
                                        <td>{{ views($post)->count() }}</td>
                                        <td>
                                            {{ $post->created_at ? $post->created_at->diffForHumans() : trans('app.no_info') }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#"
                                                   class="dropdown-toggle card-drop"
                                                   data-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    @if ($post->status !== config('company.post_status.rejected'))
                                                    <li>
                                                        <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                                           class="dropdown-item"
                                                           target="_blank"
                                                        >
                                                            <i class="mdi mdi-eye font-size-16 text-primary mr-1"></i>
                                                            {{ trans('app.see') }}
                                                        </a>
                                                    </li>
                                                    @endif

                                                    @if (
                                                        $post->status === config('company.post_status.waiting') ||
                                                        $post->status === config('company.post_status.commented')
                                                    )
                                                        <li>
                                                            <a href="{{ route('post.edit', ['post' => $post->id]) }}"
                                                               class="dropdown-item">
                                                                <i class="mdi mdi-pencil font-size-16 text-success mr-1"></i>
                                                                {{ trans('app.edit') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('post.destroy', ['id' => $post->id]) }}"
                                                               class="dropdown-item btn-delete">
                                                                <i class="mdi mdi-trash-can font-size-16 text-danger mr-1"></i>
                                                                {{ trans('app.delete') }}
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if ($post->status === config('company.post_status.commented'))
                                                        <li>
                                                            <a href="{{ route('post.review', ['id' => $post->id]) }}"
                                                                class="dropdown-item">
                                                                <i class="mdi mdi-comment font-size-16 text-primary mr-1"></i>
                                                                {{ trans('app.see') }} {{ trans('app.review') }}
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if (auth()->user()->role->name === 'admin')
                                                        <li>
                                                            <a href="{{ route('post.accept', ['id' => $post->id]) }}"
                                                               class="dropdown-item">
                                                                <i class="mdi mdi-publish font-size-16 text-warning mr-1"></i>
                                                                {{ trans('app.public') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('post.hide', ['id' => $post->id]) }}"
                                                               class="dropdown-item">
                                                                <i class="mdi mdi-file-hidden font-size-16 text-warning mr-1"></i>
                                                                {{ trans('app.hide') }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $index--; @endphp
                                @endforeach
                                </tbody>
                            </table>
                            <div class="empty-div-200"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script>
        const confirmDeleteTitle = "{{ trans('app.are_you_sure') }}";
        const confirmDeleteMessage = "{{ trans('app.post_delete_forever') }}";
        const deleteAccept = "{{ trans('app.yes') }}";
        const deleteCancel = "{{ trans('app.cancel') }}";
    </script>
    <script src="{{ asset('/admin/js/post.js') }}"></script>
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

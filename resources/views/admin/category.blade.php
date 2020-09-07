@extends('layouts.admin_master')

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">
                            {{ trans('app.category') }}
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">
                                        {{ config('view.dashboard') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ trans('app.category') }}
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
                                        {{ trans('app.category') }}
                                    </h4>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-right">
                                        <a href="{{ route('category.create') }}"
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
                                            <i class="mdi mdi-plus mr-1"></i>
                                            {{ trans('app.create') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('app.name') }}</th>
                                            <th>{{ trans('app.parent_category') }}</th>
                                            <th>{{ trans('app.depth') }}</th>
                                            <th>{{ trans('app.num_posts') }}</th>
                                            <th>{{ trans('app.created_at') }}</th>
                                            <th>{{ trans('app.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 0; @endphp
                                        @foreach ($categories as $category)
                                            @php $index++; @endphp
                                            <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    {{ $category->parent ? $category->parent->name : trans('app.none') }}
                                                </td>

                                                <td>
                                                    {{ $category->parent ? config('company.category.child') : config('company.category.parent') }}
                                                </td>
                                                <td>
                                                    {{ $category->posts()->count() }}
                                                </td>
                                                <td>
                                                    {{ $category->created_at ? $category->created_at->diffForHumans() : trans('app.no_info') }}
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
                                                            <li>
                                                                <a href="{{ route('category.edit', ['category' => $category->id]) }}"
                                                                   class="dropdown-item">
                                                                    <i class="mdi mdi-pencil font-size-16 text-success mr-1"></i>
                                                                    {{ trans('app.edit') }}
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('category.destroy', ['id' => $category->id]) }}"
                                                                   class="dropdown-item btn-delete">
                                                                    <i class="mdi mdi-trash-can font-size-16 text-danger mr-1"></i>
                                                                    {{ trans('app.delete') }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
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
        </div>
    </div>
@endsection

@push('after-js')
    <script>
        const confirmDeleteTitle = "{{ trans('app.are_you_sure') }}";
        const confirmDeleteMessage = "{{ trans('app.category_and_child_delete_forever') }}";
        const deleteAccept = "{{ trans('app.yes') }}";
        const deleteCancel = "{{ trans('app.cancel') }}";
    </script>
    <script src="{{ asset('/admin/js/category.js') }}"></script>
@endpush

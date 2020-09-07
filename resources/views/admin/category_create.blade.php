@extends('layouts.admin_master')

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">
                            {{ trans('app.create') }} {{ trans('app.category') }}
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">
                                        {{ config('view.dashboard') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ trans('app.create') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('category.store') }}"
                              method="POST"
                        >
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ trans('app.create') }}
                                </h4>

                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label">
                                        {{ trans('app.name') }}
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control"
                                               type="text"
                                               value="{{ old('name') }}"
                                               id="name"
                                               name="name"
                                               placeholder="{{ trans('app.type_name') }}"
                                               required
                                        >
                                        @error('name')
                                            <p class="text-danger mb-0 mt-2 ml-1">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-md-2 col-form-label">
                                        {{ trans('app.parent_category') }}
                                    </label>
                                    <div class="col-md-10">
                                        <select class="custom-select"
                                                name="parent_id"
                                        >
                                            <option value="null" selected>
                                                {{ trans('app.none') }}
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-5">
                                    <div class="col-md-10">
                                        <button type="submit"
                                                class="btn btn-success mr-2">
                                            {{ trans('app.submit') }}
                                        </button>
                                        <a href="{{ route('category.index') }}"
                                           class="btn btn-danger">
                                            {{ trans('app.back') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

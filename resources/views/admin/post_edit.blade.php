@extends('layouts.admin_master')

@section('before-css')
    <link href="{{ asset('/bower_components/skote-template-assets/assets/libs/summernote/summernote-bs4.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}"
          rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap-tagsinput/examples/assets/app.css') }}"
          rel="stylesheet">
@endsection

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">
                            {{ trans('app.edit') }} {{ trans('app.posts') }}
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">
                                        {{ config('view.dashboard') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ trans('app.edit') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{
                            auth()->id() === $post->user_id ?
                            route('post.update', ['post' => $post->id]) :
                            '#'
                        }}"
                            enctype="multipart/form-data"
                            method="POST"
                        >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ trans('app.edit') }}
                                </h4>

                                <div class="form-group row">
                                    <label for="title" class="col-md-2 col-form-label">
                                        {{ trans('app.title') }}
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control"
                                            type="text"
                                            value="{{ old('title') ?? $post->title }}"
                                            id="title"
                                            name="title"
                                            placeholder="{{ trans('app.type_title') }}"
                                            required
                                        >
                                        @error('title')
                                        <p class="text-danger mb-0 mt-2 ml-1">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="category"
                                        class="col-md-2 col-form-label">
                                        {{ trans('app.category') }}
                                    </label>
                                    <div class="col-md-10">
                                        <select class="custom-select"
                                            name="category_id"
                                            id="category"
                                        >
                                            <option value="{{ null }}">
                                                {{ trans('app.select_category') }}
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id === $post->category_id)
                                                        selected
                                                    @endif
                                                >
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger mb-0 mt-2 ml-1">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mt-2">
                                    <label for="content"
                                           class="col-md-2 col-form-label"
                                    >
                                        {{ trans('app.content') }}
                                    </label>
                                    <div class="col-md-10">
                                        <textarea id="editor-content"
                                                  name="content"
                                        >
                                            {{ old('content') ?? $post->content }}
                                        </textarea>
                                        @error('content')
                                        <p class="text-danger mb-0 mt-2 ml-1">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mt-2">
                                    <label for="tags" class="col-md-2 col-form-label">
                                        {{ config('view.tags') }}
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text"
                                            name="tags"
                                            value="{{ old('tags') ?? $tags }}"
                                            data-role="tagsinput"
                                        >
                                        @error('tags')
                                        <p class="text-danger mb-0 mt-2 ml-1">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mt-2">
                                    <label for="thumbnail"
                                        class="col-md-2 col-form-label"
                                    >
                                        {{ trans('app.thumbnail') }}
                                    </label>
                                    <div class="col-md-10">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input"
                                                id="thumbnail"
                                                name="thumbnail"
                                                value="{{ old('thumbnail') }}"
                                            >
                                            <label class="custom-file-label" for="thumbnail">
                                                {{ trans('app.choose_file') }}
                                            </label>
                                        </div>
                                        @error('thumbnail')
                                        <p class="text-danger mb-0 mt-2 ml-1">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                @if (isset($review))
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-md-2">
                                            @if (auth()->id() === $post->user_id)
                                                <button id="btn-mark-read"
                                                    data-id="{{ $reviewContent ? $reviewContent->id : '' }}"
                                                    data-post-id="{{ $post->id }}"
                                                    class="btn btn-outline-success mt-5">
                                                    {{ trans('app.mark_as_read') }}
                                                </button>
                                            @else
                                                <button id="btn-save-comment"
                                                    data-id="{{ $reviewContent ? $reviewContent->id : '' }}"
                                                    data-post-id="{{ $post->id }}"
                                                    data-user-id="{{ auth()->id() }}"
                                                    class="btn btn-outline-success mt-5">
                                                    {{ trans('app.save') }}
                                                </button>
                                            @endif
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="form-control"
                                                id="review-content"
                                                rows="6"
                                                @if (auth()->id() === $post->user_id)
                                                    readonly
                                                @endif
                                            >@if (auth()->id() === $post->user_id){{ $reviewContent ? $reviewContent->content : '' }} @endif</textarea>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row mt-5">
                                    <div class="col-md-10">
                                        @if (auth()->id() === $post->user_id)
                                            <button type="submit"
                                                class="btn btn-success mr-2">
                                                {{ trans('app.submit') }}
                                            </button>
                                        @endif
                                        <a href="{{ url()->previous() }}"
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

@push('after-js')
    <script src="{{ asset('/bower_components/skote-template-assets/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('/bower_components/skote-template-assets/assets/js/pages/form-element.init.js') }}"></script>
    <script src={{ asset('/bower_components/ckeditor/ckeditor.js') }}></script>
    <script>
        const ckFinderRoute = "{{ route('ckfinder_browser') }}";
        const maskCommentReadRoute = "{{ route('api.mask.comment.read') }}";
        const errorHappenMessage = "{{ trans('app.error_happen') }}";
        const successTitle = "{{ trans('app.success') }}";
        const successMaskMessage = "{{ trans('app.mask_as_read_successfully') }}";
        const insertCommentRoute = "{{ route('api.insert.comment') }}";
        const successSaveMessage = "{{ trans('app.save_comment_successfully') }}";
    </script>
    <script src="{{ asset('/admin/js/ckeditor.js') }}"></script>
    @include('ckfinder::setup')
    <script src="{{ asset('/admin/js/post.js') }}"></script>
@endpush

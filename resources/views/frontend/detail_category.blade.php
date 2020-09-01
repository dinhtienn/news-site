@extends('layouts.frontend_master')

@section('main-content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <main class="col-sm-8 col-md-9 content p_r_40">
                    <div id="macy-container">
                        @foreach ($posts as $post)
                            <article class="grid_post">
                                <figure>
                                    <a href="{{ route('post.detail', ['slug' => $post->slug]) }}" class="grid_image">
                                        <img src="{{ $post->thumbnail }}"
                                             class="img-responsive"
                                             alt="{{ $post->slug }}">
                                    </a>
                                    <figcaption>
                                        <div class="post-cat">
                                            <a href="#">
                                                {{ $category->name }}
                                            </a>
                                        </div>
                                        <div class="entry-meta">
                                            <span class="entry-date">
                                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                <time>{{ $post->created_at->diffForHumans() }}</time>
                                            </span>
                                            <span class="comment-link">
                                                <a href="#">
                                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                    9 {{ trans('app.comments') }}
                                                </a>
                                            </span>
                                            <span>
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                {{ views($post)->count() }}
                                            </span>
                                        </div>
                                        <h4 class="grid_post_title two-lines two-lines-fix-height">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h4>
                                        <div class="element-block">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                               class="btn link-btn btn-outline btn-rounded">
                                                {{ trans('app.reading') }} &#8702;
                                            </a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        @endforeach
                    </div>

                    @include('components.pagination')
                </main>
                <aside class="col-sm-4 col-md-3 rightSidebar">
                    @include('components.sidebar_recent_posts')
                    @include('components.sidebar_tags')
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script src="{{ asset('frontend/js/detail_category.js') }}"></script>
@endpush

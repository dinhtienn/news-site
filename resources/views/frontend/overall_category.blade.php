@extends('layouts.frontend_master')

@section('main-content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <main class="col-sm-8 col-md-8 content">
                    @foreach ($categories as $category)
                        <div class="category-holder style1">
                        <div class="title-holder2">
                            <h3>{{ $category->name }}</h3>
                            <div class="title-alignright">
                                <ul class="title-filter">
                                    <li class="active">
                                        <a href="#">
                                            {{ trans('app.all') }}
                                        </a>
                                    </li>
                                    @foreach ($category->children as $childCategory)
                                        <li>
                                            <a href="{{ route('category.detail', ['slug' => $childCategory->slug]) }}">
                                                {{ $childCategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <article class="grid_post">
                                    <figure>
                                        <a href="{{ route('post.detail', ['slug' => $category->posts[0]->slug]) }}" class="grid_image">
                                            <img src="{{ $category->posts[0]->thumbnail }}"
                                                 class="img-responsive"
                                                 alt="{{ $category->posts[0]->slug }}">
                                        </a>
                                        <figcaption>
                                            <div class="entry-meta">
                                                <span class="entry-date">
                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                    <time>{{ $category->posts[0]->created_at->diffForHumans() }}</time>
                                                </span>
                                                <span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{ views($category->posts[0])->count() }}
                                                </span>
                                            </div>
                                            <h4 class="grid_post_title two-lines">
                                                <a href="{{ route('post.detail', ['slug' => $category->posts[0]->slug]) }}">
                                                    {{ $category->posts[0]->title }}
                                                </a>
                                            </h4>
                                            <p class="two-lines">
                                                {{ $category->posts[0]->content }}
                                            </p>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-sm-6">
                                @foreach ($category->posts->slice(1, config('company.limit_posts.latest_posts_sidebar')) as $post)
                                <div class="media latest_post">
                                    <a class="media-left" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                        <img src="{{ $post->thumbnail }}"
                                             class="media-object"
                                             alt="{{ $post->slug }}">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading two-lines">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h6>
                                        <div class="entry-meta">
                                            <span>
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                {{ views($post)->count() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </main>
                <aside class="col-sm-4 col-md-4 rightSidebar">
                    @include('components.sidebar_recent_posts')
                    @include('components.sidebar_tags')
                </aside>
            </div>
        </div>
    </div>
@endsection

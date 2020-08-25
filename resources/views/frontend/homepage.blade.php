@extends('layouts.frontend_master')

@section('main-content')
    <div class="container">
        <div class="newstricker_inner"></div>
    </div>

    <div class="news-masonry">
        <div class="container">
            <div class="row mas-m">
                <div class="col-sm-6 mas-p">
                    <div class="mas-item mas-big">
                        <a href="{{ route('post.detail', ['slug' => $hotPosts[0]->slug]) }}">
                            <figure>
                                <img src="{{ $hotPosts[0]->thumbnail }}"
                                     class="img-responsive"
                                     alt="{{ $hotPosts[0]->slug }}">
                            </figure>
                        </a>
                        <div class="mas-text">
                            <div class="post-cat">
                                <a href="{{ route('category.detail', ['slug' => $hotPosts[0]->category->slug]) }}">
                                    {{ $hotPosts[0]->category->name }}
                                </a>
                            </div>
                            <h2 class="mas-title">
                                <a href="{{ route('post.detail', ['slug' => $hotPosts[0]->slug]) }}">
                                    {{ $hotPosts[0]->title }}
                                </a>
                            </h2>
                            <div class="mas-details">
                                <p class="two-lines">
                                    {{ $hotPosts[0]->content }}
                                </p>
                                <a href="{{ route('post.detail', ['slug' => $hotPosts[0]->slug]) }}" class="read-more">
                                    {{ trans('app.read_more') }} &#8702;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mas-p">
                    <div class="row mas-m hidden-xs">
                        <div class="col-xs-12 col-sm-12 mas-p">
                            <div class="mas-item masonry-sm mas-m-b">
                                <a href="{{ route('post.detail', ['slug' => $hotPosts[1]->slug]) }}">
                                    <figure>
                                        <img src="{{ $hotPosts[1]->thumbnail }}"
                                             class="img-responsive"
                                             alt="{{ $hotPosts[1]->slug }}">
                                    </figure>
                                </a>
                                <div class="mas-text">
                                    <div class="post-cat">
                                        <a href="{{ route('category.detail', ['slug' => $hotPosts[1]->category->slug ]) }}">
                                            {{ $hotPosts[1]->category->name }}
                                        </a>
                                    </div>
                                    <h4 class="mas-title">
                                        <a href="{{ route('post.detail', ['slug' => $hotPosts[1]->slug]) }}">
                                            {{ $hotPosts[1]->category->title }}
                                        </a>
                                    </h4>
                                    <div class="mas-details">
                                        <p class="two-lines">
                                            {{ $hotPosts[1]->content }}
                                        </p>
                                        <a href="{{ route('post.detail', ['slug' => $hotPosts[1]->slug]) }}" class="read-more">
                                            {{ trans('app.read_more') }} &#8702;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mas-m">
                        <div class="col-xs-6 col-sm-6 mas-p">
                            <div class="masonry-slide1 owl-carousel owl-theme">
                                @foreach ($hotPosts->slice(2, 2) as $post)
                                    <div class="item">
                                        <div class="mas-item masonry-sm">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                                <figure>
                                                    <img src="{{ $post->thumbnail }}"
                                                         class="img-responsive"
                                                         alt="{{ $post->slug }}">
                                                </figure>
                                            </a>
                                            <div class="mas-text">
                                                <div class="post-cat">
                                                    <a href="{{ route('category.detail', ['slug' => $post->category->slug]) }}">
                                                        {{ $post->category->name }}
                                                    </a>
                                                </div>
                                                <h4 class="mas-title">
                                                    <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h4>
                                                <div class="mas-details">
                                                    <p class="two-lines">
                                                        {{ $post->content }}
                                                    </p>
                                                    <a href="{{ route('post.detail', ['slug' => $post->slug]) }}" class="read-more">
                                                        {{ trans('app.read_more') }} &#8702;
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 mas-p">
                            <div class="masonry-slide2 owl-carousel owl-theme">
                                @foreach ($hotPosts->slice(4, 2) as $post)
                                    <div class="item">
                                        <div class="mas-item masonry-sm">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                                <figure>
                                                    <img src="{{ $post->thumbnail }}"
                                                         class="img-responsive"
                                                         alt="{{ $post->slug }}">
                                                </figure>
                                            </a>
                                            <div class="mas-text">
                                                <div class="post-cat">
                                                    <a href="{{ route('category.detail', ['slug' => $post->category->slug]) }}">
                                                        {{ $post->category->name }}
                                                    </a>
                                                </div>
                                                <h4 class="mas-title">
                                                    <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h4>
                                                <div class="mas-details">
                                                    <p class="two-lines">
                                                        {{ $post->content }}
                                                    </p>
                                                    <a href="{{ route('post.detail', ['slug' => $post->slug]) }}" class="read-more">
                                                        {{ trans('app.read_more') }} &#8702;
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="hidden-sm col-md-2 leftSidebar">
                    <div class="trending-post">
                        <div class="title-holder">
                            <h3 class="title">{{ trans('app.trending') }}</h3>
                            <span class="title-shape title-shape-dark"></span>
                        </div>

                        @foreach ($hotPosts as $post)
                            <div class="single-post">
                                <div class="entry-meta">
                                    <span class="comment-link">
                                        <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                                            9 {{ trans('app.comments') }}
                                        </a>
                                    </span>
                                    <span>
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        {{ views($post)->count() }}
                                    </span>
                                </div>
                                <h4 class="two-lines">
                                    <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                            </div>
                        @endforeach
                    </div>
                </div>
                <main class="col-sm-8 col-md-7 content p_r_40">
                    @foreach ($latestPosts as $post)
                        <div class="media meida-md">
                            <div class="media-left">
                                <a href="
                                    {{ route('post.detail', ['slug' => $post->slug]) }}
                                ">
                                    <img src="{{ $post->thumbnail }}"
                                         class="media-object"
                                         alt="{{ $post->slug }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="post-header">
                                    <div class="post-cat">
                                        <span>{{ trans('app.in') }}</span>
                                        <a href="{{ route('category.detail', ['slug' => $post->category->slug]) }}">
                                            {{ $post->category->name }}
                                        </a>
                                    </div>
                                    <h3 class="media-heading two-lines">
                                        <a href="
                                            {{ route('post.detail', ['slug' => $post->slug]) }}
                                        ">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <div class="entry-meta">
                                        <span class="entry-date">
                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                            <time>{{ $post->created_at->diffForHumans() }}</time>
                                        </span>
                                        <span class="comment-link">
                                            <a href="
                                                {{ route('post.detail', ['slug' => $post->slug]) }}
                                            ">
                                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                9 {{ trans('app.comments') }}
                                            </a>
                                        </span>
                                        <span>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            {{ views($post)->count() }}
                                        </span>
                                    </div>
                                </div>
                                <p class="two-lines">
                                    {!! $post->content !!}
                                </p>
                                <div class="element-block">
                                    <a href="
                                        {{ route('post.detail', ['slug' => $post->slug]) }}
                                    " class="btn link-btn btn-outline btn-rounded">
                                        {{ trans('app.reading') }} &#8702;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @include('components.pagination')
                </main>
                <aside class="col-sm-4 col-md-3 rightSidebar">
                    <div class="latest_post_widget">
                        <div class="title-holder">
                            <h3 class="title">{{ trans('app.popular') }}</h3>
                            <span class="title-shape title-shape-dark"></span>
                        </div>
                        @foreach ($popularPosts as $post)
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
                                        <span class="entry-date">
                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                            <time>{{ $post->created_at->diffForHumans() }}</time>
                                        </span>
                                        <span>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            {{ views($post)->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="social_share_btn">
                        <div class="title-holder">
                            <h3 class="title">{{ trans('app.subscribe') }}</h3>
                            <span class="title-shape title-shape-dark"></span>
                        </div>

                        <ul>
                            <li class="li-facebook">
                                <a href="{{ config('company.social.facebook') }}" target="_blank">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a>
                            </li>
                            <li class="li-twitter">
                                <a href="{{ config('company.social.twitter') }}" target="_blank">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                            </li>
                            <li class="li-google-plus">
                                <a href="{{ config('company.social.google') }}" target="_blank">
                                    <i class="fa fa-google-plus"></i> Google +
                                </a>
                            </li>
                            <li class="li-pinterest">
                                <a href="{{ config('company.social.pinterest') }}" target="_blank">
                                    <i class="fa fa-pinterest-p"></i> Pinterest
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script src="{{ asset('frontend/js/home.js') }}"></script>
@endpush

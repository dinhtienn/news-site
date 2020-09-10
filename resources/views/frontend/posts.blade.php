@extends('layouts.frontend_master')

@section('main-content')
    <div class=" page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="details-body">
                        <div class="post_details stickydetails">
                            <header class="details-header">
                                <div class="post-cat">
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('tag.detail', ['name' => $tag->name]) }}">
                                            {{ $tag->name }}
                                        </a>
                                    @endforeach
                                    @php $postId = $post->id; @endphp
                                </div>
                                <h2>{{ $post->title }}</h2>
                                <div class="element-block">
                                    <div class="entry-meta">
                                        <span class="entry-date">
                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                            <time>
                                                {{ $post->created_at->diffForHumans() }}
                                            </time>
                                        </span>
                                        <span class="comment-link">
                                            <a href="#">
                                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                {{ count($comments) }} {{ trans('app.comments') }}
                                            </a>
                                        </span>
                                        <span>
                                            <a href="#">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                {{ $viewNumber }}
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </header>
                            <figure>
                                <img
                                        src="{{ $post->thumbnail }}"
                                        alt="{{ $post->slug }}"
                                        class="aligncenter img-responsive">
                            </figure>
                            <div>
                                {!! $post->content !!}
                            </div>
                        </div>

                        <div class="stickyshare">
                            <aside class="share_article">
                                <a href="{{ config('company.social.facebook') }}"
                                   class="boxed_icon facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="{{ config('company.social.twitter') }}"
                                   class="boxed_icon twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="{{ config('company.social.google') }}"
                                   class="boxed_icon google-plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="{{ config('company.social.pinterest') }}"
                                   class="boxed_icon pinterest">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                                <button class="boxed_icon btn-like"
                                        id="btn-like"
                                        data-post-id="{{ $post->id }}">
                                    <i id="icon-no-like"
                                       class="fa fa-heart-o
                                        @if ($liked) d-none @else d-block @endif"
                                    ></i>
                                    <i id="icon-like"
                                       class="fa fa-heart
                                        @if ($liked) d-block @else d-none @endif"
                                    ></i>
                                    <span id="like-count">
                                        {{ $post->likes()->count() }}
                                    </span>
                                </button>
                            </aside>
                        </div>
                    </div>

                    @if (
                        ($post->status === config('company.post_status.waiting') ||
                        $post->status === config('company.post_status.commented')) &&
                        auth()->check() &&
                        auth()->user()->role->name !== 'user'
                    )
                        <div class="details-body">
                            @if (auth()->user()->role->name === 'admin')
                                <a href="{{ route('post.accept', ['id' => $post->id]) }}"
                                   class="btn btn-warning">
                                    {{ trans('app.public') }}
                                </a>
                                <a href="{{ route('post.reject', ['id' => $post->id]) }}"
                                   class="btn btn-danger">
                                    {{ trans('app.reject') }}
                                </a>
                            @endif
                        </div>
                    @endif

                    @if (
                        $post->status === config('company.post_status.accepted') &&
                        auth()->check() &&
                        auth()->user()->role->name === 'admin'
                    )
                        <div class="details-body">
                            <a href="{{ route('post.hide', ['id' => $post->id]) }}"
                               class="btn btn-danger">
                                {{ trans('app.hide') }}
                            </a>
                        </div>
                    @endif

                    <aside class="about-author">
                        <h3>{{ trans('app.about_author') }}</h3>
                        <div class="author-bio">
                            <div class="author-img">
                                <a href="#">
                                    <img alt="{{ $post->user->username }}"
                                         src="{{ asset(config('company.default_user_avatar')) }}"
                                         class="avatar img-responsive">
                                </a>
                            </div>

                            <div class="author-info">
                                <h4 class="author-name">
                                    {{ $post->user->username }}
                                </h4>
                                {{-- Data author --}}
                                <p>
                                    Johnny Doe was born in Ulm, in the Kingdom of Württemberg in the German Empire on 14 March 1879. His father was Hermann Einstein, a salesman and engineer. He was a really good man for sure.
                                </p>
                                {{-- End data author --}}
                                <p>
                                    <a class="social-link facebook"
                                       href="{{ config('company.social.facebook') }}">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="social-link twitter"
                                       href="{{ config('company.social.twitter') }}">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a class="social-link instagram"
                                       href="{{ config('company.social.instagram') }}">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </aside>

                    <div class="post_related">
                        <h3 class="related_post_title">
                            {{ trans('app.also_like') }}...
                        </h3>
                        <div class="row">
                            @foreach ($relatedPosts as $post)
                                <div class="col-sm-3">
                                    <article class="post_article item_related">
                                        <a class="post_img"
                                           href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                            <figure>
                                                <img class="img-responsive"
                                                     src="{{ $post->thumbnail }}"
                                                     alt="{{ $post->slug }}">
                                            </figure>
                                        </a>
                                        <h4 class="two-lines">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h4>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="comments">
                        <h3 class="comment_title">
                            {{ count($comments) }} {{ trans('app.comments') }}
                        </h3>
                        @foreach ($comments as $comment)
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset(config('company.default_user_avatar')) }}"
                                         class="media-object">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        {{ $comment->user->username }}
                                        @if ($comment->created_at)
                                            <small>
                                                {{ trans('app.posted_on') }}
                                                {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                        @endif
                                    </h4>
                                    <p>
                                        {{ $comment->content }}
                                    </p>
                                    @if (auth()->check())
                                        <button class="btn link-btn btn-rounded btn-reply"
                                                data-comment-id="{{ $comment->id }}"
                                                data-username="{{ $comment->user->username }}">
                                            {{ trans('app.reply') }} ⇾
                                        </button>
                                        @if (auth()->user()->role->name === 'admin')
                                            <a href="{{ route('comment.hide', ['id' => $comment->id]) }}"
                                               class="btn link-btn btn-rounded">
                                                {{ trans('app.hide') }}
                                            </a>
                                        @endif
                                        @if (auth()->id() === $comment->user_id)
                                            <button class="btn link-btn btn-rounded btn-edit"
                                                    data-comment-id="{{ $comment->id }}"
                                                    data-content="{{ $comment->content }}">
                                                {{ trans('app.edit') }}
                                            </button>
                                            <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"
                                               class="btn link-btn btn-rounded">
                                                {{ trans('app.delete') }}
                                            </a>
                                        @endif
                                    @endif
                                    @if (!empty($comment->children))
                                        @foreach ($comment->children as $childComment)
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="{{ asset(config('company.default_user_avatar')) }}"
                                                         class="media-object">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        {{ $childComment->user->username }}
                                                        @if ($childComment->created_at)
                                                            <small>
                                                                {{ trans('app.posted_on') }}
                                                                {{ $childComment->created_at->diffForHumans() }}
                                                            </small>
                                                        @endif
                                                    </h4>
                                                    <p>
                                                        {{ $childComment->content }}
                                                    </p>
                                                    @if (auth()->user()->role->name === 'admin')
                                                        <a href="{{ route('comment.hide', ['id' => $childComment->id]) }}"
                                                           class="btn link-btn btn-rounded">
                                                            {{ trans('app.hide') }}
                                                        </a>
                                                    @endif
                                                    @if (auth()->id() === $childComment->user_id)
                                                        <button class="btn link-btn btn-rounded btn-edit"
                                                                data-comment-id="{{ $childComment->id }}"
                                                                data-content="{{ $childComment->content }}">
                                                            {{ trans('app.edit') }}
                                                        </button>
                                                        <a href="{{ route('comment.delete', ['id' => $childComment->id]) }}"
                                                           class="btn link-btn btn-rounded">
                                                            {{ trans('app.delete') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (auth()->check())
                        <div class="comment_form">
                            <form action="{{ route('comment') }}"
                                  method="GET">
                                @csrf
                                <h3 class="replay_title">
                                    {{ trans('app.comments') }}
                                </h3>
                                <h5 id="reply-display"
                                    class="text-danger">
                                </h5>
                                <button id="btn-cancel-reply"
                                        class="btn link-btn d-none">
                                    {{ trans('app.cancel_reply') }}
                                </button>
                                <button id="btn-cancel-edit"
                                        class="btn link-btn d-none">
                                    {{ trans('app.cancel_edit') }}
                                </button>
                                <input type="hidden"
                                       value="{{ $postId }}"
                                       name="post_id">
                                <input type="hidden"
                                       value="{{ $post->slug }}"
                                       name="slug">
                                <input id="input-parent"
                                       type="hidden"
                                       name="parent_id"
                                       value="{{ null }}">
                                <div class="form-group">
                                    <textarea class="form-control"
                                              name="content"
                                              id="textarea"
                                              rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn link-btn">
                                    {{ trans('app.post_comment') }} ⇾
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="comment_form">
                            <h3 class="replay_title">
                                {{ trans('app.login_to_comment') }}
                            </h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script>
        let liked = "{{ $liked }}";
        let loggedIn = "{{ auth()->check() }}";
        let authUserId = "{{ auth()->check() ? auth()->id() : null }}";
        const replyDisplay = "{{ trans('app.reply') }}";
        const editDisplay = "{{ trans('app.edit_your_comment') }}";
        const likeRoute = "{{ route('api.like') }}";
        const loginToLikeMessage = "{{ trans('app.login_to_like') }}";
        const errorHappenMessage = "{{ trans('app.error_happen') }}";
    </script>
    <script src="{{ asset('/frontend/js/post.js') }}"></script>
@endpush

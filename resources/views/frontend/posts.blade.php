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
                                </div>
                                <h2>{{ $post->title }}</h2>
                                <div class="element-block">
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
                                    class="aligncenter img-responsive"
                                >
                            </figure>
                            <div>
                                {!! $post->content !!}
                            </div>
                        </div>

                        <div class="stickyshare">
                            <aside class="share_article">
                                <a href="{{ config('company.social.facebook') }}" class="boxed_icon facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="{{ config('company.social.twitter') }}" class="boxed_icon twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="{{ config('company.social.google') }}" class="boxed_icon google-plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="{{ config('company.social.pinterest') }}" class="boxed_icon pinterest">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                            </aside>
                        </div>

                    </div>

                    <aside class="about-author">
                        <h3>{{ trans('app.about_author') }}</h3>
                        <div class="author-bio">
                            <div class="author-img">
                                <a href="javascript:void(0)"><img alt="Johnny Doe" src="{{ asset('bower_components/osru-template-assets/assets/images/about-avatar.jpg') }}" class="avatar img-responsive"></a>
                            </div>

                            <div class="author-info">
                                <h4 class="author-name">Johnny Doe</h4>
                                {{-- Data author --}}
                                <p>Johnny Doe was born in Ulm, in the Kingdom of Württemberg in the German Empire on 14 March 1879. His father was Hermann Einstein, a salesman and engineer. He was a really good man for sure.</p>
                                {{-- End data author --}}
                                <p>
                                    <a class="social-link facebook" href="{{ config('company.social.facebook') }}">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="social-link twitter" href="{{ config('company.social.twitter') }}">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a class="social-link instagram" href="{{ config('company.social.instagram') }}">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </aside>

                    <div class="post_related">
                        <h3 class="related_post_title">{{ trans('app.also_like') }}...</h3>
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
                        <h3 class="comment_title">2 {{ trans('app.comments') }}</h3>
                        {{-- Data comments --}}
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('bower_components/osru-template-assets/assets/images/img_avatar1.png') }}" alt="" class="media-object">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Jahangir Alom
                                    <small>{{ trans('app.posted_on') }} February 19, 2016</small>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="javascript:void(0)" class="btn link-btn btn-rounded">{{ trans('app.reply') }} ⇾</a>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{ asset('bower_components/osru-template-assets/assets/images/img_avatar2.png') }}" alt="Demo Avatar Jane Doe" class="media-object">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jane Doe
                                            <small>{{ trans('app.posted_on') }} February 20, 2016</small>
                                        </h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <a href="javascript:void(0)" class="btn link-btn btn-rounded">{{ trans('app.reply') }} ⇾</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('bower_components/osru-template-assets/assets/images/img_avatar1.png') }}" alt="" class="media-object">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe
                                    <small><i>{{ trans('app.posted_on') }} February 19, 2016</i></small>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <a href="javascript:void(0)" class="btn link-btn btn-rounded">{{ trans('app.reply') }} ⇾</a>
                            </div>
                        </div>
                        {{-- End data comments --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

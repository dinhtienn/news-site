@extends('layouts.frontend_master')

@section('main-content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <main class="col-sm-8 col-md-8 content">
                    {{-- Data category's posts --}}
                    <div class="category-holder style1">
                        <div class="title-holder2">
                            <h3>Technology</h3>
                            <div class="title-alignright">
                                <ul class="title-filter">
                                    {{-- Data children categories --}}
                                    <li class="active"><a href="javascript:void(0)">All</a></li>
                                    <li><a href="javascript:void(0)">Foods</a></li>
                                    <li><a href="javascript:void(0)">Life Style</a></li>
                                    <li><a href="javascript:void(0)">Sports</a></li>
                                    <li><a href="javascript:void(0)">Technology</a></li>
                                    {{-- End data children categories --}}
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Data category's posts --}}
                            <div class="col-sm-6">
                                <article class="grid_post">
                                    <figure>
                                        <a href="javascript:void(0)" class="grid_image"><img src="{{ asset('bower_components/osru-template-assets/assets/images/400x280-24.jpg') }}" class="img-responsive" alt=""></a>
                                        <figcaption>
                                            <div class="entry-meta">
                                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time></span>
                                                <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                                            </div>
                                            <h4 class="grid_post_title"><a href="javascript:void(0)">There are <em>many variations</em> of passages of Lorem Ipsum available</a></h4>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                                        </figcaption>
                                    </figure>
                                </article>

                            </div>
                            <div class="col-sm-6">
                                @for ($i = 4; $i < 9; $i++)
                                <div class="media latest_post">
                                    <a class="media-left" href="javascript:void(0)">
                                        <img src="{{ asset("bower_components/osru-template-assets/assets/images/100x70-$i.jpg") }}" class="media-object" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="javascript:void(0)">Vestibulum <em>quis ex euismod</em>, tristique diam.</a></h6>
                                        <div class="entry-meta">
                                            <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            {{-- End data category's posts --}}
                        </div>
                    </div>
                    {{-- End data category's posts --}}
                </main>
                <aside class="col-sm-4 col-md-4 rightSidebar">
                    @include('components.sidebar_recent_posts')
                    @include('components.sidebar_tags')
                </aside>
            </div>
        </div>
    </div>
@endsection

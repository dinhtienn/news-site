@extends('layouts.frontend_master')

@section('main-content')
    <div class="container">
        <div class="newstricker_inner">
            <div class="trending"><strong>{{ trans('app.trending') }}</strong></div>
            <div id="newsTicker" class="owl-carousel owl-theme">
                {{-- Data trending posts --}}
                <div class="item">
                    <a href="javascript:void(0)">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                </div>
                {{-- End data trending posts --}}
            </div>
        </div>
    </div>

    {{-- Data slide posts --}}
    <div class="news-masonry">
        <div class="container">
            <div class="row mas-m">
                <div class="col-sm-6 mas-p">
                    <div class="mas-item mas-big">
                        <a href="javascript:void(0)"><figure><img src="{{ asset(config('images_path.masonry_2')) }}" class="img-responsive" alt=""></figure></a>
                        <div class="mas-text">
                            <div class="post-cat"><a href="javascript:void(0)">Fashion</a></div>
                            <h2 class="mas-title"><a href="javascript:void(0)">It is a long <em>established</em> fact that a reader will be distracted by the readable content</a></h2>
                            <div class="mas-details">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
                                <a href="javascript:void(0)" class="read-more">{{ trans('app.read_more') }} &#8702;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mas-p">
                    <div class="row mas-m hidden-xs">
                        <div class="col-xs-12 col-sm-12 mas-p">
                            <div class="mas-item masonry-sm mas-m-b">
                                <a href="javascript:void(0)"><figure><img src="{{ asset(config('images_path.masonry_1')) }}" class="img-responsive" alt=""></figure></a>
                                <div class="mas-text">
                                    <div class="post-cat"><a href="javascript:void(0)">Fashion</a></div>
                                    <h4 class="mas-title"><a href="javascript:void(0)">It is a long <em>established</em> fact that a reader</a></h4>
                                    <div class="mas-details">
                                        <p>There are many variations of passages of Lorem Ipsum available</p>
                                        <a href="javascript:void(0)" class="read-more">{{ trans('app.read_more') }} &#8702;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mas-m">
                        <div class="col-xs-6 col-sm-6 mas-p">
                            <div class="masonry-slide1 owl-carousel owl-theme">
                                @for ($i = 9; $i < 11; $i++)
                                    <div class="item">
                                        <div class="mas-item masonry-sm">
                                            <a href="javascript:void(0)"><figure><img src="{{ asset(config("images_path.masonry_$i")) }}" class="img-responsive" alt=""></figure></a>
                                            <div class="mas-text">
                                                <div class="post-cat"><a href="javascript:void(0)">Fashion</a></div>
                                                <h4 class="mas-title"><a href="javascript:void(0)">It is a long <em>established</em> fact that a reader</a></h4>
                                                <div class="mas-details">
                                                    <p>There are many variations of passages of Lorem Ipsum available</p>
                                                    <a href="javascript:void(0)" class="read-more">{{ trans('app.read_more') }} &#8702;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 mas-p">
                            <div class="masonry-slide2 owl-carousel owl-theme">
                                @for ($i = 11; $i < 13; $i++)
                                    <div class="item">
                                        <div class="mas-item masonry-sm">
                                            <a href="javascript:void(0)"><figure><img src="{{ asset(config("images_path.masonry_$i")) }}" class="img-responsive" alt=""></figure></a>
                                            <div class="mas-text">
                                                <div class="post-cat"><a href="javascript:void(0)">Fashion</a></div>
                                                <h4 class="mas-title"><a href="javascript:void(0)">It is a long <em>established</em> fact that a reader</a></h4>
                                                <div class="mas-details">
                                                    <p>There are many variations of passages of Lorem Ipsum available</p>
                                                    <a href="javascript:void(0)" class="read-more">{{ trans('app.read_more') }} &#8702;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End data slide posts --}}

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="hidden-sm col-md-2 leftSidebar">
                    <div class="trending-post">
                        <div class="title-holder">
                            <h3 class="title">{{ trans('app.trending') }}</h3>
                            <span class="title-shape title-shape-dark"></span>
                        </div>

                        <div class="single-post">
                            <div class="entry-meta">
                                <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                            </div>
                            <h4><a href="javascript:void(0)">Ut ac <em><strong>justo ut nulla</strong></em> semper imperdiet.</a></h4>
                        </div>
                    </div>
                </div>
                <main class="col-sm-8 col-md-7 content p_r_40">
                    {{-- Demo data latest posts --}}
                    @for ($i = 1; $i < 7; $i++)
                        <div class="media meida-md">
                            <div class="media-left">
                                <a href="javascript:void(0)"><img src="{{ asset(config("images_path.homepage_main_latest_$i")) }}" class="media-object" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="post-header">
                                    <div class="post-cat"><span>{{ trans('app.in') }}</span> <a href="javascript:void(0)">Fashion</a></div>
                                    <h3 class="media-heading"><a href="javascript:void(0)">It is a long <em>established fact</em> that a reader will be distracted.</a></h3>
                                    <div class="entry-meta">
                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time> </span>
                                        <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                                    </div>
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                                <div class="element-block">
                                    <a href="javascript:void(0)" class="btn link-btn btn-outline btn-rounded">{{ trans('app.reading') }} &#8702;</a>
                                    <div class="post_share">
                                        <a class="smedia facebook fa fa-facebook" href="javascript:void(0)"></a>
                                        <a class="smedia twitter fa fa-twitter" href="javascript:void(0)"></a>
                                        <a class="smedia googleplus fa fa-google-plus" href="javascript:void(0)"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    {{-- End demo data latest posts --}}

                    <div id="macy-container" class="grid-masonry">
                        {{-- Data trending posts (slide) --}}
                        @for ($i = 1; $i < 4; $i++)
                            <article class="grid_post card-post">
                                <figure>
                                    <a href="javascript:void(0)" class="grid_image">
                                        <img src="{{ asset(config("images_path.homepage_masonry_between_$i")) }}" class="img-responsive" alt="">
                                    </a>
                                    <figcaption>
                                        <div class="post-cat"><a href="javascript:void(0)">Fashion</a></div>
                                        <h4 class="grid_post_title"><a href="javascript:void(0)">Aenean consectetur justo et finibus ornare.</a></h4>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time> </span>
                                            <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        @endfor
                        {{-- End data trending posts (slide) --}}
                    </div>
                    {{-- Demo data lastest posts --}}
                    @for ($i = 6; $i < 8; $i ++)
                        <div class="media meida-md">
                            <div class="media-left">
                                <a href="javascript:void(0)"><img src="{{ asset(config("images_path.homepage_main_latest_$i")) }}" class="media-object" alt=""></a>
                            </div>
                            <div class="media-body">
                                <div class="post-header">
                                    <div class="post-cat"><span>{{ trans('app.in') }}</span> <a href="javascript:void(0)">Fashion</a></div>
                                    <h4 class="media-heading"><a href="javascript:void(0)">It is a long <em>established fact</em> that a reader will be distracted.</a></h4>
                                    <div class="entry-meta">
                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time> </span>
                                        <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                                    </div>
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                                <div class="element-block">
                                    <a href="javascript:void(0)" class="btn link-btn btn-outline btn-rounded">{{ trans('app.reading') }} &#8702;</a>
                                    <div class="post_share">
                                        <a class="smedia facebook fa fa-facebook" href="javascript:void(0)"></a>
                                        <a class="smedia twitter fa fa-twitter" href="javascript:void(0)"></a>
                                        <a class="smedia googleplus fa fa-google-plus" href="javascript:void(0)"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    {{-- End demo data latest posts --}}

                    {{-- Data pagination --}}
                    <ul class="pagination">
                        <li class="disabled"><a href="javascript:void(0)">&#8701;</a></li>
                        <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li class="page-numbers"><span>...</span></li>
                        <li><a href="javascript:void(0)">5</a></li>
                        <li><a href="javascript:void(0)">&#8702;</a></li>
                    </ul>
                    {{-- End data pagination --}}
                </main>
                <aside class="col-sm-4 col-md-3 rightSidebar">
                    <div class="latest_post_widget">
                        <div class="title-holder">
                            <h3 class="title">{{ trans('app.popular') }}</h3>
                            <span class="title-shape title-shape-dark"></span>
                        </div>
                        {{-- Data popular posts --}}
                        <div class="media latest_post">
                            <a class="media-left" href="javascript:void(0)">
                                <img src="{{ asset(config('images_path.small_latest_post_image')) }}" class="media-object" alt="">
                            </a>
                            <div class="media-body">
                                <h6 class="media-heading"><a href="javascript:void(0)">The <em>Best Street-Style</em> Pics From Copenhagen</a></h6>
                                <div class="entry-meta">
                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time> </span>
                                </div>
                            </div>
                        </div>
                        {{-- End data popular posts --}}
                    </div>

                    <div class="social_share_btn">
                        <div class="title-holder">
                            <h3 class="title">{{ trans('app.subscribe') }}</h3>
                            <span class="title-shape title-shape-dark"></span>
                        </div>

                        <ul>
                            <li class="li-facebook"><a href="javascript:void(0)" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
                            <li class="li-twitter"><a href="javascript:void(0)" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
                            <li class="li-google-plus"><a href="javascript:void(0)" target="_blank"><i class="fa fa-google-plus"></i> Google +</a></li>
                            <li class="li-pinterest"><a href="javascript:void(0)" target="_blank"><i class="fa fa-pinterest-p"></i> Pinterest</a></li>
                        </ul>
                    </div>

                    <div class="category_widget">
                        <div class="title-holder">
                            <h3 class="title">{{ trans('app.category') }}</h3>
                            <span class="title-shape title-shape-dark"></span>
                        </div>
                        {{-- Data category --}}
                        @for ($i = 1; $i < 4; $i++)
                            <a class="category" href="javascript:void(0)">
                                <figure><img src="{{ asset(config("images_path.category_image_$i")) }}" class="img-responsive" alt=""></figure>
                                <div class="category_name">Fashion</div>
                            </a>
                        @endfor
                        {{-- End data category --}}
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script>
        var masonry = new Macy({
            container: '#macy-container',
            trueOrder: false,
            waitForImages: false,
            useOwnImageLoader: false,
            debug: true,
            mobileFirst: true,
            columns: 1,
            margin: 2,
            breakAt: {
                1200: 2,
                992: 3,
                768: 2,
                480: 1
            }
        });
    </script>
@endpush

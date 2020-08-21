@extends('layouts.frontend_master')

@section('main-content')
    <div class="parallax page_header" data-parallax-bg-image="{{ asset('/bower_components/osru-template-assets/assets/images/header-bg.jpg') }}"
         data-parallax-direction="left">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{-- Data category header and breadcrumb --}}
                    <h3>Post Masonry Right Sidebar</h3>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)">Home</a></li>
                        <li><a href="javascript:void(0)">Post Formats</a></li>
                        <li class="active">Masonry</li>
                    </ol>
                    {{-- End data category header and breadcrumb --}}
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <main class="col-sm-8 col-md-9 content p_r_40">
                    <div id="macy-container">
                        {{-- Demo data category's posts --}}
                        @for ($i = 1; $i < 9; $i++)
                            <article class="grid_post">
                                <figure>
                                    <a href="javascript:void(0)" class="grid_image">
                                        <img src="{{ asset("/bower_components/osru-template-assets/assets/images/grid-$i.jpg") }}" class="img-responsive" alt="">
                                    </a>
                                    <figcaption>
                                        <div class="post-cat"><a href="javascript:void(0)">Fashion</a></div>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time></span>
                                            <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                                        </div>
                                        <h4 class="grid_post_title"><a href="javascript:void(0)">There are <em>many variations</em> of passages of Lorem Ipsum available</a></h4>
                                        <div class="element-block">
                                            <a href="javascript:void(0)" class="btn link-btn btn-outline btn-rounded">{{ trans('app.reading') }} &#8702;</a>
                                            <div class="post_share">
                                                <a class="smedia facebook fa fa-facebook" href="javascript:void(0)"></a>
                                                <a class="smedia twitter fa fa-twitter" href="javascript:void(0)"></a>
                                                <a class="smedia googleplus fa fa-google-plus" href="javascript:void(0)"></a>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        @endfor
                        {{-- End demo data category's posts --}}
                    </div>
                    <ul class="pagination">
                        <li class="disabled"><a href="javascript:void(0)">&#8701;</a></li>
                        <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li class="page-numbers"><span>...</span></li>
                        <li><a href="javascript:void(0)">5</a></li>
                        <li><a href="javascript:void(0)">&#8702;</a></li>
                    </ul>
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
    <script>
        var masonry = new Macy({
            container: '#macy-container',
            trueOrder: false,
            waitForImages: false,
            useOwnImageLoader: false,
            debug: true,
            mobileFirst: true,
            columns: 1,
            margin: 30,
            breakAt: {
                1200: 3,
                992: 3,
                768: 2,
                480: 2
            }
        });
    </script>
@endpush

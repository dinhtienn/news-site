<div class="top-header dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-7">
                <div class="header-nav">
                    <ul>
                        <li><span class="headre-weather"><i class="fa fa-calendar-check-o"></i>&nbsp; Thursday, January 25 {{-- data --}}</span></li>
                        <li><a href="javascript:void(0)">{{ trans('app.contact') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <ul class="top-socia-share">
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                        <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                        <a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#user-modal">{{ trans('auth.login') }} / {{ trans('auth.register') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse navbar-sticky navbar-mobile bootsnav">
    <div class="container">
        <div class="attr-nav">
            <ul>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#user-modal"><i
                                class="fa fa-user"></i></a></li>
                <li class="side-menu"><a href="javascript:void(0)"><i class="fa fa-bars"></i></a></li>
                <li id="btn-search1"><a href="javascript:void(0)" id="btn-search2"><i class="fa fa-search"></i></a>
                </li>
            </ul>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="javascript:void(0)"><img src="{{ asset('/bower_components/osru-template-assets/assets/images/logo-white.png') }}" class="logo" alt="logo"></a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-center" data-in="navFadeInDown" data-out="navFadeOutUp">
                {{-- Data menu --}}
                <li class="dropdown {{-- active --}}">
                    <a href="javascript:void(0)" class="dropdown-toggle">Features</a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">About</a></li>
                        <li><a href="javascript:void(0)">Portfolio</a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle">Category Type</a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Classic</a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0)" class="dropdown-toggle">List Layout</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="post-list%2bleft-right.html">Post List + Left Right Sidebar</a>
                                        </li>
                                        <li><a href="post-list%2bleft-sidebar.html">Post List + Left Sidebar</a>
                                        </li>
                                        <li><a href="post-list%2bright-sidebar.html">Post List + Right Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0)" class="dropdown-toggle">Masonry Layout</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="post-masonry%2bleft-sidebar.html">Post Masonry + Left
                                                Sidebar</a></li>
                                        <li><a href="post-masonry%2bno-sidebar.html">Post Masonry + no Sidebar</a>
                                        </li>
                                        <li><a href="post-masonry%2bright-sidebar.html">Post Masonry + Right
                                                Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle">Post Type</a>
                            <ul class="dropdown-menu">
                                <li><a href="details-classic.html">Post - Classic</a></li>
                                <li><a href="details-image.html">Post - Image</a></li>
                                <li><a href="details-gallery.html">Post - Gallery</a></li>
                                <li><a href="details-video.html">Post - Video</a></li>
                                <li><a href="details-video-2.html">Post - Video - Two</a></li>
                                <li><a href="details-video-scrolldown.html">Post - Youtube - Video and
                                        Scrolldown</a></li>
                                <li><a href="details-youtube.html">Post - Video - Youtube</a></li>
                                <li><a href="details-vimeo.html">Post - Video - Vimeo</a></li>
                                <li><a href="details-dailymotion.html">Post - Video - Dailymotion</a></li>
                                <li><a href="details-soundcloud.html">Post - Audio - SoundCloud</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="contact-2.html">Contact Two</a></li>
                        <li><a href="shortcodes.html">Shortcodes</a></li>
                        <li><a href="authors.html">Authors</a></li>
                        <li><a href="author-post.html">Author Single Page</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="typography.html">Typography</a></li>
                    </ul>
                </li>

                <li class="dropdown megamenu-fw megamenu-nav-tabs">
                    <a href="javascript:void(0)" class="dropdown-toggle">News</a>
                    <ul class="dropdown-menu megamenu-content">
                        <li>
                            <div class="block-mega-menu">
                                <div class="mega-cat-menu">

                                    <ul class="nav nav-tabs menu-tabs">
                                        <li><a href="#cat1" data-toggle="tab">Fashion</a></li>
                                        <li><a href="#cat2" data-toggle="tab">Travel</a></li>
                                        <li class="active"><a href="#cat3" data-toggle="tab">Health & Fitness</a>
                                        </li>
                                        <li><a href="#cat4" data-toggle="tab">Business</a></li>
                                        <li><a href="#cat5" data-toggle="tab">Foods</a></li>
                                    </ul>
                                </div>
                                <div class="mega-cat-article">

                                    <div class="tab-content menu-tab-content">
                                        <div class="tab-pane" id="cat1">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-video.html">
                                                            <figure><img class="img-responsive" alt=""
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-1.jpg') }}"></figure>
                                                            <span class="post__icon post__icon--video"></span>
                                                        </a>
                                                        <h4><a href="details-video.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-2.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-3.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam eu nunc at nulla
                                                                efficitur <em>pellentesque .</em></a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-4.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cat2">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-8.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-9.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-video.html">
                                                            <figure><img class="img-responsive" alt=""
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-10.jpg') }}"></figure>
                                                            <span class="post__icon post__icon--video"></span>
                                                        </a>
                                                        <h4><a href="details-video.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-11.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="cat3">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-12.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-video.html">
                                                            <figure><img class="img-responsive" alt=""
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-13.jpg') }}"></figure>
                                                            <span class="post__icon post__icon--video"></span>
                                                        </a>
                                                        <h4><a href="details-video.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-14.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam eu nunc at nulla
                                                                efficitur <em>pellentesque.</em></a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-video.html">
                                                            <figure><img class="img-responsive" alt=""
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-15.jpg') }}"></figure>
                                                            <span class="post__icon post__icon--video"></span>
                                                        </a>
                                                        <h4><a href="details-video.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cat4">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-16.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-17.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-18.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam eu nunc at nulla
                                                                efficitur <em>pellentesque.</em></a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-19.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cat5">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-20.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Ut et nunc a <em><strong>dolor
                                                                        sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-21.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-22.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam eu nunc at nulla
                                                                efficitur <em>pellentesque.</em></a></h4>
                                                    </article>
                                                </div>
                                                <div class="col-sm-3">
                                                    <article class="post_article">
                                                        <a class="post_img" href="details-post.html">
                                                            <figure><img class="img-responsive"
                                                                         src="{{ asset('/bower_components/osru-template-assets/assets/images/400x280-23.jpg') }}" alt="">
                                                            </figure>
                                                        </a>
                                                        <h4><a href="details-post.html">Aliquam <em>gravida
                                                                    urna</em> ut ipsum hendrerit cursus.</a></h4>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                {{-- End data menu --}}

                <li><a href="javascript:void(0)">{{ trans('app.contact') }}</a></li>
            </ul>
        </div>
    </div>

    <div class="side" id="side">
        <a href="javascript:void(0)" class="close-side"><i class="ti-close"></i></a>
        <div class="widget">
            <h3 class="widget-title">{{ trans('app.popular') }}</h3>
            <ul class="link">
                <li><a href="javascript:void(0)">{{ trans('app.contact') }}</a></li>
                <li><a href="javascript:void(0)">{{ trans('app.register_writer') }}</a></li>
            </ul>
        </div>
        <div class="latest_post_widget">
            <h3 class="widget-title">{{ trans('app.latest_post') }}</h3>

            {{-- Data latest posts --}}
            <div class="media latest_post">
                <a class="media-left" href="javascript:void(0)">
                    <img src="{{ asset('/bower_components/osru-template-assets/assets/images/100x70-1.jpg') }}" class="media-object" alt="">
                </a>
                <div class="media-body">
                    <h6 class="media-heading"><a href="javascript:void(0)">The <em>Best Street-Style</em> Pics Copenhagen</a></h6>
                    <div class="entry-meta">
                        <span class="entry-date">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            <time datetime="2018-01-21T19:00">Jan 21, 2018</time>
                        </span>
                    </div>
                </div>
            </div>
            {{-- End data latest posts --}}
        </div>

        <div class="social_share_btn">
            <h3 class="widget-title">{{ trans('app.subscribe') }}</h3>
            <ul>
                <li class="li-facebook"><a href="javascript:void(0)" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
                <li class="li-twitter"><a href="javascript:void(0)" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
                <li class="li-google-plus"><a href="javascript:void(0)" target="_blank"><i class="fa fa-google-plus"></i> Google
                        +</a></li>
                <li class="li-pinterest"><a href="javascript:void(0)" target="_blank"><i class="fa fa-pinterest-p"></i> Pinterest</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="side-overlay"></div>
</nav>
<div class="clearfix"></div>

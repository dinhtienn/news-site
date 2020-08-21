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
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#user-modal"><i class="fa fa-user"></i></a></li>
                <li class="side-menu"><a href="javascript:void(0)"><i class="fa fa-bars"></i></a></li>
                <li id="btn-search1"><a href="javascript:void(0)" id="btn-search2"><i class="fa fa-search"></i></a></li>
            </ul>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="javascript:void(0)"><img src="{{ asset(config('images_path.logo_white')) }}" class="logo" alt="logo"></a>
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
                                        <li><a href="javascript:void(0)">Post List + Left Right Sidebar</a>
                                        </li>
                                        <li><a href="javascript:void(0)">Post List + Left Sidebar</a>
                                        </li>
                                        <li><a href="javascript:void(0)">Post List + Right Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0)" class="dropdown-toggle">Masonry Layout</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)">Post Masonry + Left Sidebar</a></li>
                                        <li><a href="javascript:void(0)">Post Masonry + no Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle">Post Type</a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Post - Classic</a></li>
                                <li><a href="javascript:void(0)">Post - Image</a></li>
                                <li><a href="javascript:void(0)">Post - Gallery</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Contact</a></li>
                    </ul>
                </li>

                <li class="dropdown megamenu-fw megamenu-nav-tabs">
                    <a href="javascript:void(0)" class="dropdown-toggle">News</a>
                    <ul class="dropdown-menu megamenu-content">
                        <li>
                            <div class="block-mega-menu">
                                <div class="mega-cat-menu">
                                    <ul class="nav nav-tabs menu-tabs">
                                        @for ($i = 1; $i < 4; $i++)
                                            <li class="@if ($i == 3) active @endif"><a href="#cat{{ $i }}" data-toggle="tab">Fashion</a></li>
                                        @endfor
                                    </ul>
                                </div>
                                <div class="mega-cat-article">
                                    <div class="tab-content menu-tab-content">
                                        @for ($j = 1; $j < 4; $j++)
                                            <div class="tab-pane @if ($j == 3) active @endif" id="cat{{ $j }}">
                                                <div class="row">
                                                    @for ($i = 1; $i < 5; $i++)
                                                        <div class="col-sm-3">
                                                            <article class="post_article">
                                                                <a class="post_img" href="javascript:void(0)">
                                                                    <figure><img class="img-responsive" alt="" src="{{ asset(config("images_path.submenu_thumbnail_$i")) }}"></figure>
                                                                    <span class="post__icon post__icon--video"></span>
                                                                </a>
                                                                <h4><a href="javascript:void(0)">Ut et nunc a <em><strong>dolor sodales</strong></em> lacinia quis ac justo.</a></h4>
                                                            </article>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor
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
                    <img src="{{ asset(config('images_path.small_latest_post_image')) }}" class="media-object" alt="">
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

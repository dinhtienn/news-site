<div class="top-header dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-7">
                <div class="header-nav">
                    <ul>
                        <li>
                            <span class="headre-weather">
                                <i class="fa fa-calendar-check-o"></i>
                                &nbsp; {{ $dateNow ?? '' }}
                            </span>
                        </li>
                        <li>
                            <a href="{{ route('set_locale', ['locale' => 'en']) }}">
                                {{ trans('app.english') }}
                            </a> /
                            <a href="{{ route('set_locale', ['locale' => 'vi']) }}">
                                {{ trans('app.vietnamese') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <ul class="top-socia-share">
                    <li>
                        <a href="{{ config('company.social.facebook') }}" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{ config('company.social.twitter') }}" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="{{ config('company.social.instagram') }}" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    @if (!auth()->check())
                        <li>
                            <a href="#"
                               id="btn-auth"
                               data-toggle="modal"
                               data-target="#user-modal">
                                {{ trans('auth.login') }} / {{ trans('auth.register') }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="#">
                                {{ auth()->user()->username }}
                            </a>
                        </li>
                        <li>
                            <a id="btn-logout" href="#">
                                {{ trans('auth.logout') }}
                            </a>
                            <form id="logout-form"
                                  class="d-none"
                                  action="{{ route('logout') }}"
                                  method="POST">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse navbar-sticky navbar-mobile bootsnav">
    <div class="container">
        <div class="attr-nav">
            <ul>
                @if (auth()->check())
                    @if (
                        auth()->user()->role->name == 'admin' ||
                        auth()->user()->role->name == 'writer'
                    )
                        <li>
                            <a href="#" data-toggle="modal" data-target="#user-modal">
                                <i class="fa fa-user"></i>
                            </a>
                        </li>
                    @endif
                @endif
                <li class="side-menu">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li id="btn-search1">
                    <a href="#" id="btn-search2">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset(config('images_path.logo_white')) }}" class="logo" alt="logo">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-center" data-in="navFadeInDown" data-out="navFadeOutUp">
                @if (isset($categories))
                    <li class="dropdown">
                        <a href="{{ route('category.overall') }}" class="dropdown-toggle">
                            {{ trans('app.overall_category') }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li @if (count($category->children) > 0) class="dropdown" @endif>
                                    <a href="{{ route('category.detail', ['slug' => $category->slug]) }}"
                                        @if (count($category->children) > 0)
                                            class="dropdown-toggle"
                                        @endif
                                    >
                                        {{ $category->name }}
                                    </a>
                                    @if (count($category->children) > 0)
                                        <ul class="dropdown-menu">
                                            @foreach($category->children as $childCate)
                                                <li>
                                                    <a href="{{ route('category.detail', ['slug' => $category->slug]) }}">
                                                        {{ $childCate->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    @foreach($categories as $category)
                        <li @if (count($category->children) > 0) class="dropdown" @endif>
                            <a
                                href="{{ route('category.detail', ['slug' => $category->slug]) }}"
                                @if (count($category->children) > 0)
                                class="dropdown-toggle"
                                @endif
                            >
                                {{ $category->name }}
                            </a>
                            @if (count($category->children) > 0)
                                <ul class="dropdown-menu">
                                    @foreach($category->children as $childCate)
                                        <li>
                                            <a href="{{ route('category.detail', ['slug' => $category->slug]) }}">
                                                {{ $childCate->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif

                <li>
                    <a href="{{ route('contact') }}">
                        {{ trans('app.contact') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="side" id="side">
        <a href="#" class="close-side"><i class="ti-close"></i></a>
        <div class="widget">
            <h3 class="widget-title">{{ trans('app.popular') }}</h3>
            <ul class="link">
                <li>
                    <a href="{{ config('company.feedback_route') }}"
                       target="_blank"
                    >
                        {{ trans('app.contact') }}
                    </a>
                </li>
                @if (auth()->user()->role->name === 'user')
                    <li>
                        <a href="{{ route('writer-requests.create') }}">
                            {{ trans('app.register_writer') }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="latest_post_widget">
            <h3 class="widget-title">{{ trans('app.latest_post') }}</h3>

            @if (isset($latestPostsSidebar))
                @foreach ($latestPostsSidebar as $post)
                    <div class="media latest_post">
                        <a class="media-left" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                            <img src="{{ $post->thumbnail }}"
                                 class="media-object"
                                 alt="{{ $post->slug }}">
                        </a>
                        <div class="media-body">
                            <h6 class="media-heading two-lines">
                                <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
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
            @endif
        </div>

        <div class="social_share_btn">
            <h3 class="widget-title">{{ trans('app.subscribe') }}</h3>
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
                    <a href="{{ config('company.social.google') }}" target="_blank">
                        <i class="fa fa-pinterest-p"></i> Pinterest
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="side-overlay"></div>
</nav>
<div class="clearfix"></div>

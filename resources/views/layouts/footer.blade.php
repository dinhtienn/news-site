<footer class="footer-black">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="footer-box">
                        <div class="footer-logo">
                            <img
                                src="{{ asset(config('images_path.logo_white')) }}"
                                class="img-responsive"
                                alt="logo"
                            >
                        </div>
                        <p>{{ config('company.info.short_description') }}</p>
                        <div class="textwidget">
                            <p>
                                {{ config('company.info.address') }}<br>
                                <span>
                                    {{ config('company.info.phone') }}
                                </span><br>
                            </p>
                        </div>
                        <p>{{ trans('app.contact_us_on') }}
                            <a href="#">
                                <strong>
                                    <span class="__cf_email__">
                                        {{ config('company.info.email') }}
                                    </span>
                                </strong>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="hidden-sm col-md-3">
                    <div class="footer-box">
                        <h3 class="widget-title title-white">Twitter</h3>
                        <ul class="twitter-widget">
                            <li>
                                <div class="icon"><i class="ti-twitter"></i></div>
                                <div class="tweet-text">
                                    {{ trans('app.source') }}
                                    <a
                                        target="_blank"
                                        href="{{ config('company.social.instagram') }}"
                                    >
                                        @dinhtienn
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="footer-box">
                        <h3 class="widget-title title-white">{{ trans('app.need_help') }}</h3>
                        <ul class="footer-cat">
                            @if (auth()->user()->role->name === 'user')
                                <li>
                                    <a href="{{ route('writer-requests.create') }}">
                                        {{ trans('app.register_writer') }}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ config('company.feedback_route') }}"
                                   target="_blank"
                                >
                                    {{ trans('app.feedback') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5 col-md-3">
                    <div class="footer-box">
                        @if (isset($latestPostsFooter))
                            <h3 class="widget-title title-white">{{ trans('app.latest_post') }}</h3>
                            @foreach($latestPostsFooter as $post)
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
                                                <time>
                                                    {{ $post->created_at->diffForHumans() }}
                                                </time>
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
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        {{ trans('app.copyright') }} © 2017 {{ trans('app.by') }} Bdtask. {{ trans('app.all_rights_reserved') }}.
    </div>
</footer>

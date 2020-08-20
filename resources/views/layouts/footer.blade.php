<footer class="footer-black">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    {{-- Data company info --}}
                    <div class="footer-box">
                        <div class="footer-logo">
                            <img src="{{ asset(config('images_path.logo_white')) }}" class="img-responsive" alt="logo">
                        </div>
                        <p>It is a long established fact that a reader<br>
                            will be distracted by the readable content of<br>
                            a page when looking at its layout. The point<br>
                            of using Lorem Ipsum</p>
                        <div class="textwidget">
                            <p>
                                457 BIgBlue Street, Suite 4A<br>
                                New York, NY 10013<br>
                                <span>(315) 5512-2579</span><br>
                            </p>
                        </div>
                        <p>{{ trans('app.contact_us_on') }} <a href="https://osruhtml.bdtask.com/cdn-cgi/l/email-protection#563f38303916332e373b263a337835393b"><strong><span class="__cf_email__" data-cfemail="046d6a626b44617c65697468612a676b69">[email&#160;protected]</span></strong></a></p>
                    </div>
                    {{-- End data company info --}}
                </div>
                <div class="hidden-sm col-md-3">
                    <div class="footer-box">
                        <h3 class="widget-title title-white">Twitter</h3>
                        <ul class="twitter-widget">
                            <li>
                                <div class="icon"><i class="ti-twitter"></i></div>
                                <div class="tweet-text">
                                    {{ trans('app.source') }} <a target="_blank" href="javascript:void(0)">@envato</a> #ThemeForest: <a target="_blank" href="javascript:void(0)">https://t.co/jGyLLggygN</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="footer-box">
                        <h3 class="widget-title title-white">{{ trans('app.need_help') }}</h3>
                        <ul class="footer-cat">
                            <li><a href="javascript:void(0)">{{ trans('app.feedback') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5 col-md-3">
                    <div class="footer-box">
                        <h3 class="widget-title title-white">{{ trans('app.latest_post') }}</h3>
                        {{-- Data latest posts --}}
                        <div class="media latest_post">
                            <a class="media-left" href="javascript:void(0)">
                                <img src="{{ asset(config('images_path.small_latest_post_image')) }}" class="media-object" alt="">
                            </a>
                            <div class="media-body">
                                <h6 class="media-heading"><a href="javascript:void(0)">The <em>Best Street-Style</em> Pics Copenhagen</a></h6>
                                <div class="entry-meta">
                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time></span>
                                </div>
                            </div>
                        </div>
                        {{-- End data latest posts --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        {{ trans('app.copyright') }} © 2017 {{ trans('app.by') }} Bdtask. {{ trans('app.all_rights_reserved') }}.
    </div>
</footer>

@extends('layouts.frontend_master')

@section('main-content')
    <div class="parallax page_header" data-parallax-bg-image="{{ asset('bower_components/osru-template-assets/assets/images/header-bg.jpg') }}" data-parallax-direction="left">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{-- Data post header and breadcrumb --}}
                    <h3>Post Details Single</h3>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)">Home</a></li>
                        <li><a href="javascript:void(0)">Post Formats</a></li>
                        <li class="active">Post</li>
                    </ol>
                    {{-- End data post header and breadcrumb --}}
                </div>
            </div>
        </div>
    </div>

    <div class=" page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{-- Data detail post content --}}
                    <div class="details-body">
                        <div class="post_details stickydetails">
                            <header class="details-header">
                                <div class="post-cat"><a href="javascript:void(0)">Fashion</a><a href="javascript:void(0)">Travel</a><a href="javascript:void(0)">Lifestyle</a>
                                </div>
                                <h2>There are many <em>variations of passages</em> of Lorem Ipsum available, but the majority.</h2>
                                <div class="element-block">
                                    <div class="entry-meta">
                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time></span>
                                        <span class="comment-link"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i>9 {{ trans('app.comments') }}</a></span>
                                    </div>
                                </div>
                            </header>
                            <figure>
                                <img src="{{ asset('bower_components/osru-template-assets/assets/images/details-4.jpg') }}" alt="" class="aligncenter img-responsive">
                            </figure>
                            <h3>It is a long established fact that a reader will be distracted. </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle.</p>
                            <a href="{{ asset('bower_components/osru-template-assets/assets/images/details-2.jpg') }}" class="fluidbox_img">
                                <img src="{{ asset('bower_components/osru-template-assets/assets/images/details-2.jpg') }}" alt="Image" class="alignright img-responsive">
                            </a>
                            <p> Oh, you're gonna be in a coma, all right. I care deeply for nature. I care deeply for nature. I'm a monster. I don't criticize you! And if you're worried about criticism, sometimes a diet is the best defense.</p>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                            <blockquote>
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                            </blockquote>
                            <h3>There are many variations of passages of Lorem Ipsum available.</h3>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                            <p>
                                <a href="{{ asset('bower_components/osru-template-assets/assets/images/details-5.jpg') }}" class="fluidbox_img"><img src="{{ asset('bower_components/osru-template-assets/assets/images/details-5.jpg') }}" alt="Image" class="alignleft img-responsive"></a>
                                Oh, you're gonna be in a coma, all right. I care deeply for nature. I care deeply for nature. I'm a monster. I don't criticize you! And if you're worried about criticism, sometimes a diet is the best defense.
                            </p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                            <h4>It is a long established fact that a reader will be distracted</h4>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                <li>Quisque mollis quam vitae arcu cursus lacinia.</li>
                                <li>Praesent condimentum nunc eget ligula rutrum pretium.</li>
                                <li>Fusce rhoncus eros et auctor tincidunt.</li>
                                <li>Donec eu neque at turpis tempus pretium rhoncus sed neque.</li>
                                <li>In nec metus commodo, semper dolor vitae, volutpat lacus.</li>
                                <li>Donec maximus dolor in felis ornare, et euismod enim lobortis.</li>
                            </ul>
                            <p>Source:&nbsp;https://unsplash.com/</p>
                        </div>

                        <div class="stickyshare">
                            <aside class="share_article">
                                <a href="javascript:void(0)" class="boxed_icon facebook" data-share-url="http://mightymedia.nl" data-share-network="facebook" data-share-text="Share this awesome link on Facebook" data-share-title="Facebook Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-facebook"></i><span>28</span></a>
                                <a href="javascript:void(0)" class="boxed_icon twitter" data-share-url="http://mightymedia.nl" data-share-network="twitter" data-share-text="Share this awesome link on Twitter" data-share-title="Twitter Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-twitter"></i></a>
                                <a href="javascript:void(0)" class="boxed_icon google-plus" data-share-url="http://mightymedia.nl" data-share-network="googleplus" data-share-text="Share this awesome link on Google+" data-share-title="Google+ Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-google-plus"></i></a>
                                <a href="javascript:void(0)" class="boxed_icon pinterest" data-share-url="http://mightymedia.nl" data-share-network="pinterest" data-share-text="Share this awesome link on Pinterest" data-share-title="Pinterest Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-pinterest-p"></i></a>
                                <a href="javascript:void(0)" class="boxed_icon comment">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="14" height="14" viewBox="0 0 14 14" enable-background="new 0 0 14 14" xml:space="preserve"><path d="M3.6 14c0 0-0.1 0-0.1 0 -0.1-0.1-0.2-0.2-0.2-0.3v-2.7h-2.9C0.2 11 0 10.8 0 10.6V0.4C0 0.2 0.2 0 0.4 0h13.3C13.8 0 14 0.2 14 0.4v10.2c0 0.2-0.2 0.4-0.4 0.4H6.9L3.9 13.9C3.8 14 3.7 14 3.6 14zM0.7 10.2h2.9c0.2 0 0.4 0.2 0.4 0.4v2.2l2.5-2.4c0.1-0.1 0.2-0.1 0.2-0.1h6.6v-9.5H0.7V10.2z"></path></svg>
                                    <span>3</span></a>
                            </aside>
                        </div>

                    </div>
                    {{-- End data detail post content --}}

                    <aside class="about-author">
                        <h3>{{ trans('app.about_author') }}</h3>
                        <div class="author-bio">
                            {{-- Data author --}}
                            <div class="author-img">
                                <a href="javascript:void(0)"><img alt="Johnny Doe" src="{{ asset('bower_components/osru-template-assets/assets/images/about-avatar.jpg') }}" class="avatar img-responsive"></a>
                            </div>

                            <div class="author-info">
                                <h4 class="author-name">Johnny Doe</h4>
                                <p>Johnny Doe was born in Ulm, in the Kingdom of Württemberg in the German Empire on 14 March 1879. His father was Hermann Einstein, a salesman and engineer. He was a really good man for sure.</p>
                                <p>
                                    <a class="social-link facebook" href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                                    <a class="social-link twitter" href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                                    <a class="social-link vine" href="javascript:void(0)"><i class="fa fa-vine"></i></a>
                                    <a class="social-link dribbble" href="javascript:void(0)"><i class="fa fa-dribbble"></i></a>
                                    <a class="social-link instagram" href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
                                </p>
                            </div>
                            {{-- End data author --}}
                        </div>
                    </aside>

                    <div class="post_related">
                        <h3 class="related_post_title">{{ trans('app.also_like') }}...</h3>
                        <div class="row">
                            {{-- Data also like posts --}}
                            @for ($i = 7; $i < 11; $i++)
                            <div class="col-sm-3">
                                <article class="post_article item_related">
                                    <a class="post_img" href="javascript:void(0)">
                                        <figure>
                                            <img class="img-responsive" src="{{ asset("bower_components/osru-template-assets/assets/images/400x280-$i.jpg") }}" alt="">
                                        </figure>
                                    </a>
                                    <h4><a href="javascript:void(0)">Ut et nunc a <em><strong>dolor sodales</strong></em> lacinia quis ac justo.</a></h4>
                                </article>
                            </div>
                            @endfor
                            {{-- End data also like posts --}}
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

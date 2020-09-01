@if (isset($latestPostsSidebar) && isset($popularPostsSidebar))
    <div class="tab-widget">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#recent" data-toggle="tab">{{ trans('app.recent') }}</a></li>
            <li><a href="#popular" data-toggle="tab">{{ trans('app.popular') }}</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="recent">
                @foreach ($latestPostsSidebar as $post)
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
            </div>
            <div class="tab-pane fade" id="popular">
                @foreach ($popularPostsSidebar as $post)
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
            </div>
        </div>
    </div>
@endif

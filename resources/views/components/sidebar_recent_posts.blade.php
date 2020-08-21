<div class="tab-widget">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#recent" data-toggle="tab">{{ trans('app.recent') }}</a></li>
        <li><a href="#popular" data-toggle="tab">{{ trans('app.popular') }}</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="recent">
            {{-- Data recent posts --}}
            @for ($i = 1; $i < 5; $i++)
                <div class="media latest_post">
                    <a class="media-left" href="javascript:void(0)">
                        <img src="{{ asset("bower_components/osru-template-assets/assets/images/100x70-$i.jpg") }}" class="media-object" alt="">
                    </a>
                    <div class="media-body">
                        <h6 class="media-heading"><a href="javascript:void(0)">The <em>Best Street-Style</em> Pics Copenhagen</a></h6>
                        <div class="entry-meta">
                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time> </span>
                        </div>
                    </div>
                </div>
            @endfor
            {{-- End data recent posts --}}
        </div>
        <div class="tab-pane fade" id="popular">
            {{-- Data popular posts --}}
            @for ($i = 1; $i < 5; $i++)
                <div class="media latest_post">
                    <a class="media-left" href="javascript:void(0)">
                        <img src="{{ asset("bower_components/osru-template-assets/assets/images/100x70-$i.jpg") }}" class="media-object" alt="">
                    </a>
                    <div class="media-body">
                        <h6 class="media-heading"><a href="javascript:void(0)">The <em>Best Street-Style</em> Pics Copenhagen</a></h6>
                        <div class="entry-meta">
                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="2018-01-21T19:00">Jan 21, 2018</time> </span>
                        </div>
                    </div>
                </div>
            @endfor
            {{-- End data popular posts --}}
        </div>
    </div>
</div>

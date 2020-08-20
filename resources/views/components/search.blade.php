<div class="search">
    <button id="btn-search-close" class="btn btn--search-close" aria-label="Close search form"> <i class="ti-close"></i></button>
    <form class="search__form" action="javascript:void(0)" method="post">
        <input class="search__input" name="search" type="search" placeholder="{{ trans('app.search_and_hit_enter') }}..." />
        <span class="search__info">{{ trans('app.hit_enter_to_search_or_esc_to_close') }}</span>
    </form>
    <div class="search__related">
        <div class="search__suggestion"></div>
        <div class="search__suggestion">
            <h3>{{ trans('app.result') }}?</h3>
            {{-- Data search --}}
            <p>#good #red #hilarious #blue #nono #why #yes #yesyes #aliens #green #drone #funny #catgif #broken #lost</p>
            {{-- End data search --}}
        </div>
        <div class="search__suggestion"></div>
    </div>
</div>

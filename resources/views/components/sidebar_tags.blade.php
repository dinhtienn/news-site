@if (isset($latestTags))
    <div class="tag_widget category-holder">
        <div class="title-holder2"><h3>{{ config('view.tags') }}</h3></div>

        @foreach ($latestTags as $tag)
            @if ($tag->posts()->count() > 0)
                <a href="{{ route('tag.detail', ['name' => $tag->name]) }}">{{ $tag->name }}</a>
            @endif
        @endforeach
    </div>
@endif

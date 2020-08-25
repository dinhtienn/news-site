<div class="insta-content">
    <div class="insta-link">
        <a href="{{ config('company.social.instagram') }}" rel="me" target="_blank" class="">
            {{ trans('app.follow_me') }}!
        </a>
    </div>
    <div id="ri-grid" class="ri-grid ri-grid-size-2">
        <img class="ri-loading-image" src="{{ asset(config('images_path.instagram_loading_gif')) }}" alt="" />
        <ul>
            @for ($i = 1; $i < config('app.number_instagram_images') + 1; $i++)
                <li>
                    <a href="#">
                        <img src="{{ asset(config("images_path.instagram_images_$i")) }}" alt="" />
                    </a>
                </li>
            @endfor
        </ul>
    </div>
</div>

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('/bower_components/skote-template-assets/assets/images/logo-light.svg') }}"
                             alt="logo-sm"
                             height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset(config('images_path.logo_white')) }}"
                             alt="logo-lg"
                             height="19">
                    </span>
                </a>
            </div>

            <button type="button"
                    class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button"
                        class="btn header-item waves-effect"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <img src="{{ asset("/bower_components/skote-template-assets/assets/images/flags/$locale_image_name") }}"
                         alt="Header Language"
                         height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @if (app()->getLocale() === 'en')
                        <a href="{{ route('set_locale', ['locale' => 'vi']) }}"
                           class="dropdown-item notify-item">
                            <img src="{{ asset('/bower_components/skote-template-assets/assets/images/flags/vi.png') }}"
                                 alt="user-image"
                                 class="mr-1"
                                 height="12">
                            <span class="align-middle">
                                {{ trans('app.vietnamese') }}
                            </span>
                        </a>
                    @endif

                    @if (app()->getLocale() === 'vi')
                        <a href="{{ route('set_locale', ['locale' => 'en']) }}"
                           class="dropdown-item notify-item">
                            <img src="{{ asset('/bower_components/skote-template-assets/assets/images/flags/us.jpg') }}"
                                 alt="user-image"
                                 class="mr-1"
                                 height="12">
                            <span class="align-middle">
                                {{ trans('app.english') }}
                            </span>
                        </a>
                    @endif
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button"
                        class="btn header-item waves-effect"
                        id="page-header-user-dropdown"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{ asset(config('company.default_user_avatar')) }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">
                        {{ auth()->check() ? auth()->user()->username : '' }}
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a id="btn-logout" class="dropdown-item text-danger" href="#">
                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                        {{ trans('auth.logout') }}
                    </a>
                    <form id="logout-form"
                          class="d-none"
                          action="{{ route('logout') }}"
                          method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

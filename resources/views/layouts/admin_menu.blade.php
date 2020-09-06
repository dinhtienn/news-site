<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">{{ trans('app.main') }}</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>{{ config('view.dashboard') }}</span>
                    </a>
                </li>

                <li class="menu-title">{{ trans('app.content') }}</li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-news"></i>
                        <span>{{ trans('app.posts') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-note"></i>
                        <span>{{ trans('app.waiting_posts') }}</span>
                    </a>
                </li>
                @if (auth()->user()->role->name === 'admin')
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="bx bx-list-check"></i>
                            <span>{{ trans('app.category') }}</span>
                        </a>
                    </li>

                    <li class="menu-title">{{ trans('app.company') }}</li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="bx bx-user"></i>
                            <span>{{ trans('app.users') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="bx bx-user-plus"></i>
                            <span>{{ trans('app.request_writer') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="bx bx-error"></i>
                            <span>{{ trans('app.feedback') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
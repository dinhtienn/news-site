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
                        <a href="{{ route('category.index') }}"
                           class="waves-effect">
                            <i class="bx bx-list-check"></i>
                            <span>{{ trans('app.category') }}</span>
                        </a>
                    </li>

                    <li class="menu-title">{{ trans('app.company') }}</li>
                    <li>
                        <a href="#" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span>{{ trans('app.users') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('users.user') }}">
                                    {{ trans('app.user') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.writer') }}">
                                    {{ trans('app.writer') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.admin') }}">
                                    {{ trans('app.admin') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow waves-effect">
                            <i class="bx bx-user-plus"></i>
                            <span>{{ trans('app.request_writer') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('writer-requests.index') }}">
                                    {{ trans('app.pending_requests') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('writer-requests.rejected') }}">
                                    {{ trans('app.rejected_requests') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ config('company.feedback_result') }}"
                           target="_blank"
                           class="waves-effect">
                            <i class="bx bx-error"></i>
                            <span>{{ trans('app.feedback') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

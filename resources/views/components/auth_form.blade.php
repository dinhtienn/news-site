@if (!auth()->check())
    <div class="modal fade user-modal" id="user-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#login" data-toggle="tab">
                                {{ trans('auth.login') }}
                            </a>
                        </li>
                        <li>
                            <a href="#register" data-toggle="tab">
                                {{ trans('auth.register') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="login">
                            <form id="login-form"
                                action="{{ route('login') }}"
                                method="POST">
                                @csrf
                                <div class="form-content text-center">
                                    <h2>{{ trans('auth.login') }}</h2>
                                    <p>{{ trans('app.choose_one_following_method') }}.</p>
                                    <div class="social-btn">
                                        <a href="{{ route('auth.social.login', ['provider' => 'facebook']) }}"
                                            class="btn btn-fb">
                                            <i class="fa fa-facebook"></i>
                                            {{ trans('app.with') }} Facebook
                                        </a>
                                    </div>
                                    <div class="ui horizontal divider">
                                        {{ trans('app.or') }}
                                    </div>
                                    <p>{{ trans('auth.login_by_email') }}</p>
                                    <div class="form-group">
                                        <input class="form-control"
                                            name="email"
                                            id="login-email"
                                            placeholder="{{ trans('app.email') }}"
                                            type="email"
                                            value="{{ old('email') }}"
                                            autocomplete="email"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control"
                                            name="password"
                                            id="login-password"
                                            placeholder="{{ trans('app.password') }}"
                                            type="password"
                                            autocomplete="current-password"
                                            required>
                                    </div>
                                    <p id="login-error"
                                       class="text-red-theme">
                                        @if ($errors->any())
                                            {{ implode('', $errors->all(':message')) }}
                                        @endif
                                    </p>
                                    <div class="block-content">
                                        <div class="checkbox checkbox-danger">
                                            <input id="checkbox8"
                                                type="checkbox"
                                                name="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label for="checkbox8">
                                                {{ trans('auth.remember_me') }}
                                            </label>
                                        </div>
                                        <a href="#" class="forgot">{{ trans('auth.forgot_password') }}?</a>
                                    </div>
                                    <button type="submit"
                                        id="btn-submit-login"
                                        class="btn link-btn btn-block btn-rounded">
                                        {{ trans('auth.login') }} &#8702;
                                    </button>
                                    <div>
                                        {{ trans('auth.dont_have_account') }}?
                                        <a href="#">{{ trans('auth.sign_up_now') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="register">
                            <form id="register-form"
                                action="{{ route('register') }}"
                                method="POST">
                                @csrf
                                <div class="form-content">
                                    <h2 class="text-center">
                                        {{ trans('auth.sign_up_for_free') }}
                                    </h2>
                                    <div class="form-group">
                                        <input class="form-control"
                                            name="username"
                                            id="register-username"
                                            placeholder="{{ trans('app.username') }}"
                                            type="text"
                                            value="{{ old('username') }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control"
                                            name="email"
                                            id="register-email"
                                            placeholder="{{ trans('app.email') }}"
                                            type="email"
                                            value="{{ old('email') }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control"
                                            name="password"
                                            id="register-password"
                                            placeholder="{{ trans('app.password') }}"
                                            type="password"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control"
                                            id="confirm-password"
                                            placeholder="{{ trans('app.confirm_password') }}"
                                            type="password"
                                            required>
                                    </div>
                                    <p id="register-error"
                                       class="text-red-theme">

                                    </p>
                                    <div class="block-content">
                                        <div>
                                            <i class="fa fa-shield"></i>
                                            <span>
                                                {{ trans('auth.password_are_encrypted') }}
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn link-btn btn-block btn-rounded">
                                        {{ trans('auth.register') }} &#8702;
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

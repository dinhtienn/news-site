<div class="modal fade user-modal" id="user-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">{{ trans('auth.login') }}</a></li>
                    <li><a href="#register" data-toggle="tab">{{ trans('auth.register') }}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="login">
                        <div class="form-content text-center">
                            <h2>{{ trans('auth.login') }}</h2>
                            <p>{{ trans('app.choose_one_of_the_following_methods') }}.</p>
                            <div class="social-btn">
                                <a href="javascript:void(0)" class="btn btn-fb"><i class="fa fa-facebook"></i>{{ trans('app.with') }} Facebook</a>
                            </div>
                            <div class="ui horizontal divider">{{ trans('app.or') }} </div>
                            <p>{{ trans('auth.login_by_email') }}</p>
                            <div class="form-group">
                                <input class="form-control" name="email" id="f_name" placeholder="{{ trans('app.email') }}" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password" id="pass" placeholder="{{ trans('app.password') }}" type="text">
                            </div>
                            <div class="block-content">
                                <div class="checkbox checkbox-danger">
                                    <input id="checkbox8" type="checkbox">
                                    <label for="checkbox8">
                                        {{ trans('auth.remember_me') }}
                                    </label>
                                </div>
                                <a href="javascript:void(0)" class="forgot">{{ trans('auth.forgot_password') }}?</a>
                            </div>
                            <a href="javascript:void(0)" class="btn link-btn btn-block btn-rounded">{{ trans('auth.login') }} &#8702;</a>
                            <div>{{ trans('auth.dont_have_account') }}? <a href="javascript:void(0)">{{ trans('auth.sign_up_now') }}</a></div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="register">
                        <div class="form-content">
                            <h2 class="text-center">{{ trans('auth.sign_up_for_free') }}</h2>
                            <div class="form-group">
                                <input class="form-control" name="username" id="name" placeholder="{{ trans('app.username') }}" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" placeholder="{{ trans('app.email') }}" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password" id="pass2" placeholder="{{ trans('app.password') }}" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="confirm_password" id="r_pass" placeholder="{{ trans('app.confirm_password') }}" type="text">
                            </div>
                            <div class="block-content">
                                <div><i class="fa fa-shield"></i><span>{{ trans('auth.your_password_are_encrypted_and_secured') }}</span></div>
                            </div>
                            <a href="javascript:void(0)" class="btn link-btn btn-block btn-rounded">{{ trans('auth.register') }} &#8702;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

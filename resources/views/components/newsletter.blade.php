<div class="newslatter">
    <div class="container">
        <h3>{{ trans('app.register_to_follow') }} <em>{{  trans('app.newsletter') }}</em></h3>
        <p>{{ trans('app.subscribe_to_get_notified') }}<br> {{ trans('app.every_week') }}!</p>
        <form class="navbar-form" role="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{ trans('app.email') }}" name="">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">{{ trans('auth.register') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

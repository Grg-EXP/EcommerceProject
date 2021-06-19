@extends('core.master')
@section('content')
    <div class="container  signup-form">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-4">
                <form action="register" id="register" role="form" name="register" method="post">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <h2>{{ trans('header.register') }}</h2>
                    <p class="hint-text">{{ trans('content.create_your_account_free') }}</p>
                    <div class="form-group">
                        <input type="name" class="form-control" id="name" name="name"
                            placeholder="{{ trans('login_custom.name') }}" required="required">
                        <span class="invalid-input" style="display:none" id="empty-name">
                            {{ trans('login_custom.empty_name') }}
                        </span>
                        <span class="invalid-input" style="display:none" id="invalid-name">
                            {{ trans('login_custom.name_format') }}
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="{{ trans('login_custom.email') }}" required="required">
                        <span class="invalid-input" style="display:none" id="empty-email">
                            {{ trans('login_custom.empty_email') }}
                        </span>
                        <span class="invalid-input" style="display:none" id="invalid-email">
                            {{ trans('login_custom.email_format') }}
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="{{ trans('login_custom.password') }}" required="required">
                        <span class="invalid-input" style="display:none" id="empty-pw">
                            {{ trans('login_custom.empty_pw') }}
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="{{ trans('login_custom.confirm') }}" required="required">
                        <span class="invalid-input" style="display:none" id="empty-cpw">
                            {{ trans('login_custom.empty_cpw') }}
                        </span>
                    </div>
                    <span class="invalid-input" style="display:none" id="registration_alert">
                        {{ trans('login_custom.registration_alert') }}
                    </span>
                    <br>
                    <br>
                    <div class="form-group">
                        <button type="submit" id="register_button" onclick="event.preventDefault(); checkRegistration();"
                            class="btn btn-success btn-lg btn-block">{{ trans('content.register_now') }}</button>
                    </div>

                </form>
                <div class="text-center">{{ trans('content.already_account') }} <a
                        href="login">{{ trans('header.login') }}</a></div>
                <br>
            </div>
        </div>
    </div>


@endsection

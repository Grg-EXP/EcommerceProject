@extends('core.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-4">
                <h2>{{ trans('header.login') }}</h2>
                <form action="login" name='login' method="POST">
                    <div class="form-group">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <label for="exampleInputEmail1">{{ trans('content.email_address') }}</label>
                        <input type="email" required="required" id="email" name="email" class="form-control"
                            id="exampleInputEmail1" placeholder="Email">
                        <span class="invalid-input" style="display:none" id="empty-email">
                            {{ trans('login_custom.empty_email') }}
                        </span>
                        <span class="invalid-input" style="display:none" id="invalid-email">
                            {{ trans('login_custom.email_format') }}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('content.password') }}</label>
                        <input type="password" required="required" id="password" name="password" class="form-control"
                            id="exampleInputPassword1" placeholder="Password">
                        <span class="invalid-input" style="display:none" id="empty-pw">
                            {{ trans('login_custom.empty_pw') }}
                        </span>

                    </div>
                    <span class="invalid-input" style="display:none" id="login-alert">
                        {{ trans('login_custom.alert') }}
                    </span>

                    <br><br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block"
                            onclick="event.preventDefault(); checkLogin();">{{ trans('header.login') }}</button>
                    </div>

                    <div class="text-center">
                        {{ trans('content.not_registered_yet') }} <a href="register">{{ trans('header.register') }}</a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection

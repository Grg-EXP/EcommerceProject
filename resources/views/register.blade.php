@extends('master')
@section('content')
    <div class="container  signup-form">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-4">
                <form action="register" id="register" role="form" name="register" method="post">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <h2>Register</h2>
                    <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                    <div class="form-group">
                        <input type="name" class="form-control" id="name" name="name" placeholder="Name"
                            required="required">
                        <span class="invalid-input" id="invalid-name">

                        </span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required="required">
                        <span class="invalid-input" id="invalid-email">

                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required="required">
                        <span class="invalid-input" id="invalid-password">

                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Confirm Password" required="required">
                        <span class="invalid-input" id="invalid-confirm_password">

                        </span>
                    </div>

                    <span class="invalid-input" id="registration_alert">

                    </span>
                    <br>


                    <div class="form-group">
                        <button type="submit" id="register_button" onclick="event.preventDefault(); checkRegistration();"
                            class="btn btn-success btn-lg btn-block">Register Now</button>
                    </div>


                </form>
                <div class="text-center">Already have an account? <a href="login">Login</a></div>
                <br>
            </div>
        </div>
    </div>


@endsection

@extends('core.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-4">
                <h2>Login</h2>
                <form action="login" name='login' method="POST">
                    <div class="form-group">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" required="required" id="email" name="email" class="form-control"
                            id="exampleInputEmail1" placeholder="Email">
                        <span class="invalid-input" id="invalid-email">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" required="required" id="password" name="password" class="form-control"
                            id="exampleInputPassword1" placeholder="Password">
                        <span class="invalid-input" id="invalid-password">

                        </span>
                    </div>
                    <span class="invalid-input text-center" id="registration_alert">

                    </span>
                    <br><br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block"
                            onclick="event.preventDefault(); checkLogin();">Login</button>
                    </div>

                    <div class="text-center">
                        Not registered yet? <a href="register">Register</a></div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection

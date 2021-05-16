@extends('master')
@section('content')
    <div class="container  signup-form">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-4">
                <form action="register" method="post">
                    @csrf
                    <h2>Register</h2>
                    <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                    <div class="form-group">
                        <input type="name" class="form-control" name="name" placeholder="Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password"
                            required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a
                                href="#">Terms
                                of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
                    </div>
                </form>
                <div class="text-center">Already have an account? <a href="login">Login</a></div>
            </div>
        </div>
    </div>
@endsection

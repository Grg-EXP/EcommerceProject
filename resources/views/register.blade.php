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
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Confirm Password" required="required">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a
                                href="#">Terms
                                of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                    </div>

                    <div id="registration_alert" class="alert alert-danger">

                    </div>

                    <div class="form-group">
                        <button type="submit" id="register_button" onclick="event.preventDefault(); checkRegistration()"
                            class="btn btn-success btn-lg btn-block">Register Now</button>
                    </div>


                </form>
                <div class="text-center">Already have an account? <a href="login">Login</a></div>
                <br>
            </div>
        </div>
    </div>

    <script>
        $("#register").on("submit", function(e) {
            e.preventDefault();
            var registerationdata = $(this).serialize(); // i use serialize() 
            //to capture all the form data without having to pick them  individually.  csrf_field() is also included.
            var postregistration = $.ajax({
                url: 'ajaxRegister',
                data: registrationdata, //$(this).serialize(),
                type: 'post',
                dataType: 'json',
            });
            postregistration.success(function(response) {
                $("#results").html(response);
            });
        });

    </script>
@endsection

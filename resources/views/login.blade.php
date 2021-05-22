  @extends('master')
  @section('content')
      <div class="container">
          <div class="row">
              <div class="col-sm-5 col-sm-offset-4">
                  <h2>Login</h2>
                  <form action="login" method="POST">
                      <div class="form-group">
                          @csrf
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" required="required" name="email" class="form-control" id="exampleInputEmail1"
                              placeholder="Email">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" required="required" name="password" class="form-control"
                              id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
                      </div>
                      @if ($error)
                          <div class="alert alert-danger" role="alert">
                              The email or password is incorrect
                          </div>
                      @endif
                      <div class="text-center">
                          Not registered yet? <a href="register">Register</a></div>
                      <br>
                  </form>
              </div>
          </div>
      </div>
  @endsection

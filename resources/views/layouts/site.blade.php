<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/font-awesome/css/all.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>

<body>



    <!-- Navigation -->
    <nav class="navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/#">Greg's store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for 
               toggling -->
            <div class="collapse navbar-collapse" id="navbar1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="active dropdown-toggle" data-toggle="dropdown"> Categories <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="category.html">Laptops</a></li>
                            <li><a href="category.html">Desktops</a></li>
                            <li><a href="category.html">Phones</a></li>
                            <li><a href="category.html">Software</a></li>
                            <li><a href="category.html">Printer</a></li>
                            <li><a href="category.html">Networking Devices</a></li>
                            <li><a href="category.html">TV</a></li>
                            <li class="divider"></li>
                            <li><a href="ecommerce.html">All Categories</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="badge pull-right">0</span><i
                                class="glyphicon glyphicon-shopping-cart"></i></a></li>
                    <li><a href="account.html"><i class="glyphicon glyphicon-user"></i></a></li>
                    <li><a href="loging.html">Sign in</a></li>
                </ul>
            </div>
        </div>


    </nav> <!-- Navigation -->

    <div class=" container-fluid">
        <div id="site" class="container">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start" style="background-color: #e0ebeb">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Greg's store</h5>

                    <p>
                        Project developed by Andreoli Gregorio
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-dark">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-dark">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            Gregorio Andreoli © 2021 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">-----</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
</body>

</html>

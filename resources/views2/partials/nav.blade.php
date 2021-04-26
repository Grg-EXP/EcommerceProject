<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        @if (!request()->is('checkout'))
            <ul>
                <a class="navbar-brand" href="{{ url('/') }}">Greg's store</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                    aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{ url('/') }}">Laptops</a>
                                <a class="dropdown-item" href="{{ url('/') }}">Desktops</a>
                                <a class="dropdown-item" href="{{ url('/') }}">Phones</a>
                            </div>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="badge pull-right">0</span><i
                                    class="fa fa-shopping-cart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" account.html"> <i class="fa fa-user" aria-hidden="true"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href=" loging.html">Sign in</a>
                        </li>

                    </ul>
                </div>
            </ul>
        @endif
    </div>
</nav>

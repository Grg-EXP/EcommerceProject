<?php
use App\Http\Controllers\ProductController;
$total = 0;
if (Session::has('user')) {
$total = ProductController::cartItem(Session::get('user')['id']);
}
?>
<nav class=" navbar-default fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ trans('header.title') }}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class=""><a href="/">{{ trans('header.home') }}</a></li>
                <li class=""><a href="/myorders">{{ trans('header.orders') }}</a></li>

            </ul>
            <form action="/search" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" name="query" required class="form-control"
                        placeholder="{{ trans('header.submit') }}">
                </div>
                <button type="submit" class="btn btn-default">{{ trans('header.submit') }}</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/cartlist"
                        class="glyphicon glyphicon-shopping-cart">{{ trans('header.cart') }}({{ $total }})</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ trans('header.setLanguage') }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('locale/en') }}">English</a></li>
                        <li><a href="{{ url('locale/it') }}">Italiano</a></li>
                    </ul>
                </li>
                @if (Session::has('user'))
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Session::get('user')['name'] }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/logout">{{ trans('header.logout') }}</a></li>
                            <li><a href="/address">{{ trans('header.address') }}</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/login">{{ trans('header.login') }}</a></li>
                    <li><a href="/register">{{ trans('header.register') }}</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

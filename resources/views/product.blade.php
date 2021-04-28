@extends('master')
@section('content')

    <div class="custom-product">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach ($products as $item)
                    <div class="item {{ $item['id'] == 8 ? 'active' : '' }}">
                        <a href="detail/{{ $item['id'] }}">
                            <img class="slider-img container-fluid" src="{{ $item['gallery'] }}">

                        </a>
                    </div>

                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-3 col-md-4 col-md-6  col-xs-6">
                        <br>
                        <div class="container">
                            <a href="detail/{{ $item['id'] }}">
                                <img class="trending-image" src="{{ $item['gallery'] }}">
                                <h3>{{ $item['name'] }}</h3>
                            </a>
                            <div>
                                <ul class="product_price list-unstyled">
                                    <li class="old_price">{{ $item['price'] }}</li>
                                    <li class="new_price">$13.00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    </div>

@endsection

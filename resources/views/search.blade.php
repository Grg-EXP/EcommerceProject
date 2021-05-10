@extends('master')
@section('content')
    <br>
    <h4 class="text-center">Results</h4>
    <br><br>
    <div class="container">
        <div class="row">

            @foreach ($searched_products as $s_product)
                <div class="col-lg-3 col-md-4 col-md-6 col-xs-6">
                    <br>
                    <div class="">
                        <a href="detail/{{ $s_product['id'] }}">
                            <img class="trending-image" src="{{ $s_product['gallery'] }}">
                            <div class="">
                                <h2>{{ $s_product['name'] }}</h2>
                                <h5>{{ $s_product['description'] }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

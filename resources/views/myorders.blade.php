@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h1>My orders </h1>
                @foreach ($orders as $item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-3">
                            <a href="detail/{{ $item->id }}">
                                <img class="trending-image" src="{{ $item->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2> {{ $item->name }}</h2>
                                <h5>Delivery Status : {{ $item->status }}</h5>
                                <h5>Address : {{ $item->address }}</h5>
                                <h5>Payment Status : {{ $item->payment_status }}</h5>
                                <h5>Payment Method : {{ $item->payment_method }}</h5>
                                <h5>Total price : € {{ $item->total_price }}</h5>
                                <h5>Date : {{ $item->date }}</h5>
                            </div>
                        </div>

                    </div>
                @endforeach
                <a class="btn btn-success" href="cartlist">View Shopping Cart </a> <br> <br>
            </div>

        </div>
    </div>
@endsection

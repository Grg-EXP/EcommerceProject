@extends('core.master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">

                @if (count($products) > 0)
                    <h4>{{ trans('content.result_products') }}</h4>
                    <a class="btn btn-success" href="ordernow">{{ trans('content.order_now') }}</a> <br> <br>
                @else
                    <h4>{{ trans('content.empty_cart') }}</h4>
                @endif

                @foreach ($products as $item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-3">
                            <a href="detail/{{ $item->id }}">
                                <img class="trending-image" src="{{ url('/') }}/images/{{ $item->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2>{{ $item->name }}</h2>
                                <h4>{{ trans('content.quantity') }} {{ $item->quantity }}</h4>
                                <h4>{{ trans('content.price') }} {{ $item->price }} €</h4>
                                <h4>{{ trans('content.total') }} {{ $item->price * $item->quantity }} €</h4>
                                <h4>{{ $item->description }}</h4>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a href="/removecart/{{ $item->cart_id }}"
                                onclick="return confirm('Are you sure you want to remove this item?');"
                                class="btn btn-warning">{{ trans('content.remove_tocart') }}</a>
                        </div>

                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection

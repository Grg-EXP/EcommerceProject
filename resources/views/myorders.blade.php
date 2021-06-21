@extends('core.master')
@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="trending-wrapper">
                @if (count($orders) > 0)
                    <div>
                        {{ $orders->links('vendor.pagination.custom') }}
                    </div>
                    <h1>{{ trans('content.my_orders') }} </h1>
                    @foreach ($orders as $item)
                        <div class=" row searched-item cart-list-devider">
                            <div class="col-sm-3">
                                <a href="detail/{{ $item->id }}">
                                    <img class="trending-image" src="{{ url('/') }}/images/{{ $item->gallery }}">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="">
                                    <h2> {{ $item->name }}</h2>
                                    <h5>{{ trans('content.delivery_status') }} {{ $item->status }}</h5>
                                    <h5>{{ trans('content.address') }}: {{ $item->name }}, {{ $item->address }}
                                        {{ $item->city }}</h5>
                                    <h5>{{ trans('content.payment_status') }} {{ $item->payment_status }}</h5>
                                    <h5>{{ trans('content.payment_method') }} {{ $item->payment_method }}</h5>
                                    <h5>{{ trans('content.item_quantity') }} {{ $item->quantity }}</h5>
                                    <h5>{{ trans('content.total_price') }} {{ $item->total_price }}</h5>
                                    <h5>{{ trans('content.date') }} {{ $item->date }}</h5>
                                </div>
                            </div>

                        </div>
                    @endforeach


                @else
                    <h1>{{ trans('content.no_order') }} </h1>
                @endif
                <a class="btn btn-success" href="cartlist">{{ trans('content.view_shopping_cart') }} </a> <br> <br>
            </div>

        </div>
    </div>
@endsection

@extends('core.master')
@section('content')
    <br>
    <div class="container">
        <div class="row">

            @foreach ($products as $item)
                <div class=" row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $item->id }}">
                            <img class="trending-image" src="{{ url('/') }}/images/{{ $item->gallery }}">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h3>{{ $item->name }}</h3>
                            <h5>{{ trans('content.quantity') }} {{ $item->quantity }}</h5>
                            <h5>{{ trans('content.price') }} {{ $item->price }} €</h5>
                            <h5>{{ trans('content.total') }} {{ $item->price * $item->quantity }} €</h5>
                            <h5>{{ $item->description }}</h5>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
    <div class="container">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{ trans('content.amount') }}</td>
                        <td>$ {{ $total }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('content.tax') }}</td>
                        <td>$ 0</td>
                    </tr>
                    <tr>
                        <td>{{ trans('content.delivery') }} </td>
                        <td>$ 10</td>
                    </tr>
                    <tr>
                        <td>{{ trans('content.total_amount') }}</td>
                        <td>$ {{ $total + 10 }}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <form action="/orderplace" method="POST">
                    @csrf

                    <div class="form-group">
                        <div>
                            {{ trans('content.choose_address') }}
                        </div>
                        <br>
                        @foreach ($addresses as $address)
                            <input type="radio" value="{{ $address['id'] }}" name="chosen_address" required
                                id="{{ $address['address'] }}">
                            <label for="{{ $address['address'] }}">
                                <h5>{{ $address['name'] }}, {{ $address['address'] }},
                                    {{ $address['city'] }}, {{ $address['region'] }}, {{ $address['country'] }},
                                    {{ $address['zip'] }}
                                </h5>
                            </label> <br> <br>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="pwd"> {{ trans('content.payment_method') }}</label> <br> <br>
                        <input type="radio" value="cash" name="payment" id="p1" required> <label for="p1">PayPal</label>
                        <br> <br>
                        <input type="radio" value="cash" name="payment" id="p3"> <label for="p3">
                            {{ trans('content.payment_delivery') }}</label>
                        <br> <br>
                        <input type="hidden" value="{{ $item->price * $item->quantity }}" name="total">
                    </div>
                    <button type="submit" class="btn btn-default">{{ trans('content.order_now') }}</button>
                </form>
            </div>
        </div>
    </div>
    <br>
@endsection

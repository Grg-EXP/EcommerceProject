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
                            <h5>Quantity : {{ $item->quantity }}</h5>
                            <h5>Price : {{ $item->price }} €</h5>
                            <h5>Total : {{ $item->price * $item->quantity }} €</h5>
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
                        <td>Amount</td>
                        <td>$ {{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$ 0</td>
                    </tr>
                    <tr>
                        <td>Delivery </td>
                        <td>$ 10</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td>$ {{ $total + 10 }}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <form action="/orderplace" method="POST">
                    @csrf

                    <div class="form-group">
                        <div>
                            Choose your address:
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
                        <label for="pwd">Payment Method</label> <br> <br>
                        <input type="radio" value="cash" name="payment" id="p1" required> <label for="p1">PayPal</label>
                        <br> <br>
                        <input type="radio" value="cash" name="payment" id="p2"> <label for="p2">ATM card</label> <br><br>
                        <input type="radio" value="cash" name="payment" id="p3"> <label for="p3">Payment on Delivery</label>
                        <br> <br>
                        <input type="hidden" value="{{ $item->price * $item->quantity }}" name="total">
                    </div>
                    <button type="submit" class="btn btn-default">Order Now</button>
                </form>
            </div>
        </div>
    </div>
    <br>
@endsection

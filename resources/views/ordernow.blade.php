@extends('master')
@section('content')
    <br>
    <div class="container">
        <div class="row">

            @foreach ($products as $item)
                <div class=" row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $item->id }}">
                            <img class="trending-image" src="{{ $item->gallery }}">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h2>{{ $item->name }}</h2>
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
                            <input type="radio" value="{{ $address['address'] }}" name="chosen_address"
                                id="{{ $address['address'] }}"> <label
                                for="{{ $address['address'] }}">{{ $address['address'] }}
                            </label> <br> <br>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="pwd">Payment Method</label> <br> <br>
                        <input type="radio" value="cash" name="payment" id="p1"> <label for="p1">PayPal</label> <br> <br>
                        <input type="radio" value="cash" name="payment" id="p2"> <label for="p2">ATM card</label> <br><br>
                        <input type="radio" value="cash" name="payment" id="p3"> <label for="p3">Payment on Delivery</label>
                        <br> <br>

                    </div>
                    <button type="submit" class="btn btn-default">Order Now</button>
                </form>
            </div>
        </div>
    </div>
    <br>
@endsection

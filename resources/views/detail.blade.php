@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="detail-img img-fluid" src="{{ $product['gallery'] }}" alt="">
            </div>
            <div class="col-sm-6">
                <a href="/">Go Back</a>
                <h3>{{ $product['name'] }}</h3>
                <h3>Price : € {{ $product['price'] }}</h3>
                <h4>Details: {{ $product['description'] }}</h4>
                <h4>Category: {{ $product['category'] }}</h4>




                <form action="/add_to_cart" method="POST">
                    @csrf
                    <div class="input-group ">
                        <h4>Quantity:</h4>

                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class=" btn-success">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        <input class="form-control input-number" min="1" name="quantity" value="1" type="number">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class=" btn-danger ">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>

                    </div>
                    <br><br>
                    <input type="hidden" name="product_id" value={{ $product['id'] }}>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
                <br><br>

            </div>
        </div>
    </div>
@endsection

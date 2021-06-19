@extends('core.master')
@section('content')
    <div class="container">


        <div class="row">
            <div class="col-sm-6">
                <img class="detail-img img-fluid" src="{{ url('/') }}/images/{{ $product->gallery }}">
            </div>
            <div class="col-sm-6">
                <a href="/">Go Back</a>
                <h3>{{ $product->name }}</h3>
                <h3>{{ trans('content.price') }} € {{ $product->price }}</h3>
                <h4>{{ trans('content.details') }} {{ $product->description }}</h4>
                <h4>{{ trans('content.category') }} {{ $product->category }}</h4>



                <form action="/add_to_cart" method="POST">
                    @csrf
                    <div class="input-group ">
                        <h4>{{ trans('content.quantity') }}</h4>

                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class=" btn-success">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        <input class="form-control input-number" name="quantity" value="1" type="number" min="1" max="100">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class=" btn-danger ">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>

                    </div>


                    <br><br>
                    <input type="hidden" name="product_id" value={{ $product->id }}>
                    <button type="submit" class="btn btn-primary">{{ trans('content.add_tocart') }}</button>
                </form>
                <br><br>

            </div>
        </div>
    </div>

@endsection

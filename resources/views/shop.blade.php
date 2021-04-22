@extends('layouts.site')
@section('content')
    <article id="product">
        <header class="mb-5">
            <h1>{{ $product['title'] }}</h1>
        </header>
        <figure>
            <img src="{{ url('assets/images') }}/{{ $product['image'] }}" alt="" class="img-fluid">
        </figure>
        <div class="row mt-4 mb-4">
            <div class="col-md-2">
                &euro; {{ $product['price'] }}
            </div>
            <div class="col-md-6">
                <form class="form-inline" action="{{ route('add-to-cart') }}" method="post">
                    <div class="form-group">
                        <input type="number" name="quantity" value="1" min="1" step="1" class="form-control qty">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                        <input type="submit" class="btn btn-success" value="Aggiungi">
                    </div>
                </form>
            </div>
        </div>
        <p>{{ $product['description'] }}</p>
    </article>
@endsection
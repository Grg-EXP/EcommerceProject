@extends('layouts.site')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <h3>Categories</h3>
                <div class="list-group">
                    <a href="{{ url('/') }}" class="list-group-item active">Laptops</a>
                    <a href="{{ url('/') }}" class="list-group-item">Desktops</a>
                    <a href="{{ url('/') }}" class="list-group-item">Phones</a>
                    <a href="{{ url('/') }}" class="list-group-item">Software</a>
                    <a href="{{ url('/') }}" class="list-group-item">Printer</a>
                    <a href="{{ url('/') }}" class="list-group-item">Networking Devices</a>
                    <a href="{{ url('/') }}" class="list-group-item">TV</a>
                </div>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="row">


                    @foreach ($products as $product)
                        @include('product', ['product' => $product])
                    @endforeach
                    {{ $products->links() }}

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

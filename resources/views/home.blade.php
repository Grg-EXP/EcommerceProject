@extends('layouts.site')
@section('content')
    <section class="row products">
        @foreach($products as $product)
            @include('product', ['product' => $product])
        @endforeach
        {{ $products->links() }}
    </section>
@endsection
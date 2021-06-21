@extends('core.master')
@section('content')
    <br>
    @if (count($searched_products) > 0)
        <h4 class="text-center">{{ trans('content.result_found') }}</h4>

    @else
        <h4 class="text-center">{{ trans('content.no_result_found') }}</h4>
    @endif
    <br><br>
    <div class="container">
        <div class="row">
            <div>
                {{ $searched_products->links('vendor.pagination.custom') }}
            </div>
            @foreach ($searched_products as $s_product)
                <div class="col-lg-3 col-md-4 col-md-6 col-xs-6">
                    <br>
                    <div class="">
                        <a href="detail/{{ $s_product['id'] }}">
                            <img class="trending-image" src="{{ url('/') }}/images/{{ $s_product['gallery'] }}">
                            <div class="">
                                <h2>{{ $s_product['name'] }}</h2>
                                <h5>{{ $s_product['description'] }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br><br>
@endsection

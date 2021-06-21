@extends('core.master')
@section('content')



    <div class="custom-product">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach ($products as $item)
                    <div class="item {{ $item->id == $products[0]->id ? 'active' : '' }}">
                        <a href="detail/{{ $item->id }}">
                            <img class="slider-img container-fluid" src="{{ url('/') }}/images/{{ $item->gallery }}">

                        </a>
                    </div>

                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">}</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only"></span>
            </a>
        </div>


        <div class="container-fluid">


            <div class=" row">
                <div class="col-md-3">
                    <div class="">
                        <h3>{{ trans('content.categories') }}</h3>

                        <div class="list-group">
                            @if (!isset($set_c))
                                <a href="/" class="list-group-item active">{{ trans('content.all') }}</a>
                            @else
                                <a href="/" class="list-group-item">{{ trans('content.all') }}</a>
                            @endif

                            @foreach ($categories as $category)
                                @if (isset($set_c))
                                    @if ($category['id'] == $set_c)
                                        <a href="/category/{{ $category['id'] }}"
                                            class="list-group-item active">{{ $category['name'] }}</a>
                                    @else
                                        <a href="/category/{{ $category['id'] }}"
                                            class="list-group-item">{{ $category['name'] }}</a>

                                    @endif
                                @else
                                    <a href="/category/{{ $category['id'] }}"
                                        class="list-group-item">{{ $category['name'] }}</a>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="col-md-9">
                    <div>
                        {{ $products->links('vendor.pagination.custom') }}
                    </div>
                    @foreach ($products as $item)

                        <div class="col-lg-3 col-md-4  col-xs-6">
                            <br>
                            <div class="">
                                <a href="/detail/{{ $item->id }}">
                                    <img class="trending-image" src="{{ url('/') }}/images/{{ $item->gallery }}">
                                    <h3>{{ $item->name }}</h3>
                                </a>
                                <div>
                                    <ul class="product_price list-unstyled">
                                        <li>€{{ $item->price }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            </div>




        </div>



    </div>

@endsection

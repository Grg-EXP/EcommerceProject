@extends('layouts.site')
@section('content')
    <div class=" container-fluid">
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
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <!-- List group-->
                            <ul class="list-group shadow">
                                <!-- list group item-->
                                <li class="list-group-item">
                                    <!-- Custom content-->
                                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                        <div class="media-body order-2 order-lg-1">
                                            <h2>{{ $product['title'] }}</h2>
                                            <p class="font-italic text-muted mb-0 small">{{ $product['description'] }}</p>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <h6 class="font-weight-bold my-2">&euro;{{ $product['price'] }}</h6>
                                            </div>
                                            <a href="{{ url('/') }}/add-to-cart/{{ $product['id'] }}"
                                                class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
                                                Aggiungi</a>
                                        </div>
                                        <img src="{{ url('assets/images') }}/{{ $product['image'] }}"
                                            alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                                    </div> <!-- End -->

                                </li> <!-- End -->
                        </div>
                    </div>
                    <hr>
                    <div class="thumbnail container py-5 ">
                        <div class="row">
                            <div class="col-md-12  ">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                David More
                                <span class="pull-right">1 day ago</span>
                                <p>From <em>Italia</em></p>
                                <p>This product was great in terms of quality. I would
                                    definitely buy another!</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@endsection

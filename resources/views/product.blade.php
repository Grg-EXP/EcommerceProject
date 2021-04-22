<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{ url('assets/images') }}/{{ $product['image'] }}" alt="Generic placeholder image">
        <h5 class="mt-0 font-weight-bold mb-2"><a
                href="{{ url('/') }}/details/{{ $product['id'] }}">{{ $product['title'] }}</a>
        </h5>
        <h6 class="font-weight-bold my-2">&euro;{{ $product['price'] }}</h6>

        <ul class="list-inline small">
            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i>
            </li>
            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i>
            </li>
            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i>
            </li>
            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i>
            </li>
            <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
        </ul>
        <a href="{{ url('/') }}/add-to-cart/{{ $product['id'] }}" class="btn btn-success"><i class="fa fa-plus"
                aria-hidden="true"></i>Aggiungi</a>

    </div>

    <br>
</div>

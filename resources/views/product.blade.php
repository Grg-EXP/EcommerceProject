<!--
<header>
    <h3>{{ $product['title'] }}</h3>
</header>
<figure>questo è ...
    <a href="{{ url('/') }}/prodotti/{{ $product['slug'] }}">
        <img src="{{ url('assets/images') }}/{{ $product['image'] }}" class="img-fluid" alt="">
    </a>
</figure>
<p class="text-muted text-truncate">{{ $product['description'] }}</p>
<footer class="row">
    <div class="col-md-6">&euro; {{ $product['price'] }}</div>
    <div class="text-right col-md-6">
        <a href="{{ url('/') }}/add-to-cart/{{ $product['id'] }}" class="btn btn-success">Aggiungi</a>
    </div>
</footer> 
-->
<article class="col-sm-8 col-md-9 product">
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ url('assets/images') }}/{{ $product['image'] }}" alt="http://placehold.it/750x600">
                <div class="add-to-cart">
                    <!--   <a href="#" class="glyphicon glyphicon-plus-sign" data-toggle="tooltip" data-placement="top"
                        title="Add to cart"></a> -->
                    <a href="{{ url('/') }}/add-to-cart/{{ $product['id'] }}"
                        class="glyphicon glyphicon-plus-sign" class="btn btn-success">Aggiungi</a>
                </div>
                <div class="caption">
                    <h4 class="pull-right">&euro;{{ $product['price'] }}</h4>
                    <h4><a href="product.html">1<sup>st</sup> {{ $product['title'] }}</a>
                    </h4>
                    <p>{{ $product['description'] }}</p>
                    <div class="ratings">
                        <p class="pull-right"><a href="product.html#comments">15 reviews</a></p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article>

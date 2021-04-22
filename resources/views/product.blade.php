<article class="col-md-6 product">
    <header>
        <h3>{{ $product['title'] }}</h3>
    </header>
    <figure>
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
</article>
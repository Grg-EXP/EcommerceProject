<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Ecommerce Example</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



</head>

<body>
    <header class="with-background">
        <div class="top-nav container">
            <div class="logo">Laravel Ecommerce</div>
            <ul>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Cart</a></li>
            </ul>
        </div> <!-- end top-nav -->
        <div class="hero container">
            <div class="hero-copy">
                <h1>Laravel Ecommerce Demo</h1>
                <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe
                    integration.</p>
                <div class="hero-buttons">
                    <a href="#" class="button button-white">Blog Post</a>
                    <a href="#" class="button button-white">GitHub</a>
                </div>
            </div> <!-- end hero-copy -->

            <div class="hero-image">
                <img src="img/macbook-pro-laravel.png" alt="hero image">
            </div> <!-- end hero-image -->
        </div> <!-- end hero -->
    </header>

    <div class="featured-section">

        <div class="container">
            <h1 class="text-center">Laravel Ecommerce</h1>

            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi,
                consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit
                sunt aliquid possimus temporibus enim eum hic.</p>

            <div class="text-center button-container">
                <a href="#" class="button">Featured</a>
                <a href="#" class="button">On Sale</a>
            </div>

            {{-- <div class="tabs">
                    <div class="tab">
                        Featured
                    </div>
                    <div class="tab">
                        On Sale
                    </div>
                </div> --}}

            <div class="products text-center">
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="/img/macbook-pro.png" alt="product"></a>
                    <a href="#">
                        <div class="product-name">MacBook Pro</div>
                    </a>
                    <div class="product-price">$2499.99</div>
                </div>
            </div> <!-- end products -->

            <div class="text-center button-container">
                <a href="#" class="button">View more products</a>
            </div>

        </div> <!-- end container -->

    </div> <!-- end featured-section -->

    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">From Our Blog</h1>

            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi,
                consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit
                sunt aliquid possimus temporibus enim eum hic.</p>

            <div class="blog-posts">
                <div class="blog-post" id="blog1">
                    <a href="#"><img src="/img/blog1.png" alt="Blog Image"></a>
                    <a href="#">
                        <h2 class="blog-title">Blog Post Title 1</h2>
                    </a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi,
                        tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog2">
                    <a href="#"><img src="/img/blog2.png" alt="Blog Image"></a>
                    <a href="#">
                        <h2 class="blog-title">Blog Post Title 2</h2>
                    </a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi,
                        tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog3">
                    <a href="#"><img src="/img/blog3.png" alt="Blog Image"></a>
                    <a href="#">
                        <h2 class="blog-title">Blog Post Title 3</h2>
                    </a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi,
                        tenetur numquam ipsam reiciendis.</div>
                </div>
            </div>
        </div> <!-- end container -->
    </div> <!-- end blog-section -->

    @include('partials.footer')
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>

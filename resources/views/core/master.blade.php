<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Greg's Store</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <script src="{{ url('/') }}/js/myScript.js"></script>
</head>

<body>
    {{ View::make('core.header') }}
    @yield('content')
    {{ View::make('core.footer') }}

</body>
<style>
    .custom-login {
        height: 500px;
        padding-top: 100px;
    }

    img.slider-img {
        height: 300px !important
    }

    .custom-product {
        height: 600px
    }

    .trending-image {
        height: 100px;
    }


    .trending-wrapper {
        margin: 30px;
    }

    .detail-img {
        width: 100%;
        height: auto;
    }


    .cart-list-devider {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px
    }

    .invalid-input {
        color: #bd2626;
        font-weight: bold;

    }

    </html>

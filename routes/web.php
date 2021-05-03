<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login'); // user:mia email, pw=1234
});
Route::get('/logout', function () {
    Session::forget('user');
    return view('login');
});
Route::post("/login", [UserController::class, 'login']);
Route::get("/", [ProductController::class, 'index']);
Route::get('/detail/{Product:id}', [ProductController::class, 'detail']);
Route::get('/search', [ProductController::class, 'search']);
Route::post('add_to_cart', [ProductController::class, 'addToCart']);

/*
Route::view('/', 'main');
Route::view('/products', 'products');
Route::view('/product', 'product');
Route::view('/cart', 'cart');
Route::view('/checkout', 'checkout');
Route::view('/thankyou', 'thankyou');



Route::get('/', 'HomeController@index')->name('home');

Route::get('/details/{Product:id}', 'ShopController@ShowDetails');

//Route::get('/', ['as'=>'home','uses'=>'FrontController@getHome']);
//Route::get('/user/login', [NomeClasseController::class, 'nomeMetodo']);

Route::get('/user/login',['as'=>'user.login','uses'=>'AuthController@authentication']);
Route::post('/user/login',['as'=>'user.login','uses'=>'AuthController@login']);
Route::get('/user/logout',['as'=>'user.logout','uses'=>'AuthController@logout']);
Route::post('/user/register',['as'=>'user.register','uses'=>'AuthController@registration']);

Route::resource('product', 'ProductController');
Route::get('/product/{id}/destroy',['as'=>'product.destroy','uses'=>'ProductController@destroy']);
*/
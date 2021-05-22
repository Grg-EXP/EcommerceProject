<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAuth;
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


Route::get('login', [UserController::class, 'showLogin']);
Route::get('register', [UserController::class, 'showRegister']);
Route::get('logout', [UserController::class, 'logout']);

Route::post("login", [UserController::class, 'login']);
Route::post("register", [UserController::class, 'addNewUser']);

Route::get("/", [ProductController::class, 'index']);
Route::get('/detail/{Product:id}', [ProductController::class, 'detail']);
Route::get('/search', [ProductController::class, 'search']);

Route::group(['middleware' => ['UserAuth']], function () {
    Route::post('add_to_cart', [ProductController::class, 'addToCart']);
    Route::get('cartlist', [ProductController::class, 'cartlist']);
    Route::get('removecart/{id}', [ProductController::class, 'removeCart']);
    Route::get('ordernow', [ProductController::class, 'orderNow']);
    Route::post('orderplace', [ProductController::class, 'orderPlace']);
    Route::get('myorders', [ProductController::class, 'myOrders']);
    Route::get('address', [UserController::class, 'showAddress']);
    Route::get('removeaddress/{id}', [ProductController::class, 'removeAddress']);
    Route::post('address', [UserController::class, 'addAddress']);
});


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
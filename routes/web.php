<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/prodotti/{product}', function (Product $product) {
    return view('products.single', compact('product'));
});
Route::get('/prodotti/{product}', 'ShopController@single');

/*
//Route::get('/', ['as'=>'home','uses'=>'FrontController@getHome']);
//Route::get('/user/login', [NomeClasseController::class, 'nomeMetodo']);

Route::get('/user/login',['as'=>'user.login','uses'=>'AuthController@authentication']);
Route::post('/user/login',['as'=>'user.login','uses'=>'AuthController@login']);
Route::get('/user/logout',['as'=>'user.logout','uses'=>'AuthController@logout']);
Route::post('/user/register',['as'=>'user.register','uses'=>'AuthController@registration']);

Route::resource('product', 'ProductController');
Route::get('/product/{id}/destroy',['as'=>'product.destroy','uses'=>'ProductController@destroy']);
*/
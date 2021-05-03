<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('product', ['products' => $products]);
    }

    function detail($id)
    {
        $product = Product::find($id);
        return view('detail', ['product' => $product]);
    }

    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['searched_products' => $data]);
    }

    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem($userId)
    {
        return Cart::where('user_id', $userId)->count();
    }
}

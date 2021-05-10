<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Address;
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
        $cart = new Cart;
        $cart->user_id = $req->session()->get('user')['id'];
        $cart->product_id = $req->product_id;
        $cart->save();
        return redirect('cartlist');
    }

    static function cartItem($userId)
    {

        return Cart::where('user_id', $userId)->count();
    }

    function cartlist(Request $req)
    {

        $userId = $req->session()->get('user')['id'];
        $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('cartlist', ['products' => $products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(Request $req)
    {
        $userId =  $req->session()->get('user')['id'];
        $addresses = Address::where('user_id', $userId)->select('address')->get();;

        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');
        $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)->get();
        return view('ordernow', ['total' => $total, 'addresses' => $addresses, 'products' => $products]);
    }
}

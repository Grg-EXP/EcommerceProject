<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        //view details
        $req->validate([
            'quantity' => 'required|integer|min:1|max:100',
        ]);
        //

        $userId = $req->session()->get('user')['id'];


        if (Cart::where('user_id', $userId)->where('product_id', $req->product_id)->count() > 0) {
            print(Cart::where('user_id', $userId)->where('product_id', $req->product_id)->get());
            $newQuantity = Cart::where('user_id', $userId)->where('product_id', $req->product_id)->first()->quantity;
            $newQuantity = $newQuantity + $req->quantity;
            Cart::where('user_id', $userId)->where('product_id', $req->product_id)->update(['quantity' => $newQuantity]);
        } else {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->quantity = $req->quantity;
            $cart->save();
        }
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
            ->select('products.*', 'cart.id as cart_id', 'cart.quantity as quantity')
            ->get();

        return view('cartlist', ['products' => $products,]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(Request $req)
    {
        $userId =  $req->session()->get('user')['id'];

        if (Address::where('user_id', $userId)->count() > 0) {

            $addresses = Address::where('user_id', $userId)->get();
            $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)->get();

            $total = 0;
            foreach ($products as $product) {
                $total = $total + $product->quantity * $product->price;
            }
            if (count($products) > 0) {
                return view('ordernow', ['total' => $total, 'addresses' => $addresses, 'products' => $products]);
            } else {
                return redirect('cartlist');
            }
        } else {
            return redirect('address');
        }
    }

    function orderPlace(Request $req)
    {
        $userId = $req->session()->get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();

        foreach ($allCart as $cart) {
            $order = new Order();
            $order->user_id = $cart['user_id'];
            $order->product_id = $cart['product_id'];
            $order->quantity = $cart['quantity'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address_id = $req->chosen_address;
            $order->total_price = $req->total;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        return redirect('/myorders');
    }

    function myOrders(Request $req)
    {
        $userId = $req->session()->get('user')['id'];
        $ordersDetail = DB::table('orders')->orderBy('orders.created_at', 'DESC')
            ->join('products', 'orders.product_id', '=', 'products.id')->join('address', 'orders.address_id', 'address.id')
            ->where('orders.user_id', $userId)->get();
        return view('myorders', ['orders' => $ordersDetail]);
    }
    function removeAddress($id)
    {
        Address::destroy($id);
        return redirect('address');
    }
}

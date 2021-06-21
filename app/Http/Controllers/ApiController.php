<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Cont;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ApiController extends Controller
{
    //

    function bestProduct()
    {
        // return response()->json(['validation' => True]);
        //return "ciao";
        //$products = DB::table('products')->first();
        $id = 11;
        // $quantity_for_product = array();

        $quantity_for_product = collect();

        foreach (Product::where('id', '>', 0)->pluck('id')->toArray() as $id) {

            $quantity_p = DB::table('products')->join('orders', 'products.id', '=', 'orders.product_id')
                ->groupBy('products.id')->where('products.id', $id)->sum('quantity');
            $name_p = Product::where('products.id', $id)->select('name', 'price', 'description')->first();
            $quantity_for_product->push(
                [
                    'name' => $name_p,
                    'quantity' => $quantity_p
                ]
            );
        }
        return $quantity_for_product->sort(
            static function ($a, $b) {
                return $a['quantity'] < $b['quantity'];
            }
        )->values();
    }
}

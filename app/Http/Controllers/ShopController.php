<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    public function single(Product $product)
    {
        $title = $product->title;
        return view('products.single', compact('title', 'product'));
    }
   
}

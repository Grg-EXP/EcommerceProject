<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\DataLayer;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('price', 'asc')->paginate(10);
        return view('home', [
            'title' => 'PHP E-commerce',
            'products' => $products
        ]);
    }

  
}

<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function single(Product $product)
    {
        $title = $product->title;
        return view('products.single', compact('title', 'product'));
    }

    public function ShowDetails($id)
    {
        $dl = new DataLayer();
        $product = $dl->getProduct($id);
        return view('detail', [
            'title' => 'details',
            'product' => $product,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('s');
        $products = Product::whereRaw('MATCH (title, description) AGAINST (?)', [$query])->paginate(10)->setPath('');
        $pagination = $products->appends([
            'q' => $query
        ]);
        return view('search', [
            'title' => 'Risultati della ricerca',
            'description' => 'Risultati della ricerca',
            'products' => $products
        ])->withQuery($query);
    }
}

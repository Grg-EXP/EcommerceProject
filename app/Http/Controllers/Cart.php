<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Cart {
    private $items;
    private $total;
    public function __construct() {
        $this->items = [];
        $this->total = 0.00;
    }
    public function emptyCart() {
        $this->items = [];
        $this->total = 0.00;
    }   
    public function setItems($items) {
        $this->items = $items;
    }

    public function getItems() {
        $items = [];
        if($this->hasItems()) {
            foreach($this->items as $item) {
                $items[] = [
                        'id' => $item['id'],
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'price' => $item['price'],
                        'manufacturer' => $item['manufacturer'],
                        'image' => $item['image'],
                        'quantity' => $item['quantity'],
                        'subtotal' => $item['subtotal'],
                        'slug' => $item['slug']
                ];
            }
        }
        return $items;
    }
    public function setTotal($value) {
        $this->total = $value;
    }
    public function getTotal() {
        return $this->total;
    }
    public function updateCart(Product $product, $quantity) {
        if($this->hasItems()) {
            foreach($this->items as &$item)  {
                if($product->id == $item['id']) {
                    $item['quantity'] = $quantity;
                    $item['subtotal'] = ($product->price * $quantity);
                    $this->calculateTotal();
                }
            }
        }
    }
    public function removeFromCart(Product $product) {
        if($this->hasItems()) {
            $i = -1;
            foreach($this->items as $item) {
                $i++;
                if($product->id == $item['id']) {
                    unset($this->items[$i]);
                    $this->calculateTotal();
                }
            }
        }
    }
    public function addToCart(Product $product, $quantity) {
        if($quantity < 1 || $this->isInCart($product)) {
            return;
        }
        $item = [
            'id' => $product->id,
            'name' => $product->title,
            'description' => $product->description,
            'price' => $product->price,
            'manufacturer' => $product->manufacturer,
            'image' => $product->image,
            'quantity' => $quantity,
            'subtotal' => ($product->price * $quantity),
            'slug' => $product->slug
        ];
        $this->items[] = $item;
        $this->calculateTotal();
    }
    private function isInCart(Product $product) {
        if( $this->hasItems()) {
           foreach( $this->items as $item ) {
               if($item['id'] == $product->id) {
                   return true;
               }
           }
           return false;
        } else {
            return false;
        }
    }
    private function calculateTotal() {
        $this->total = 0.00;
        if($this->hasItems()) {
            $tot = 0.00;
            foreach($this->items as $item) {
                $tot += $item['subtotal'];
            }
            $this->total = $tot;
        }
    }
    private function hasItems() {
        return ( count( $this->items ) > 0 );
    }

    public function add(Request $request, $id = '0')
    {
        $product_id = $id;
        $quantity = 1;
        if ($request->has(['id', 'quantity'])) {
            $product_id = $request->input('id');
            $quantity = (int) $request->input('quantity');
        }
        $product = Product::find($product_id);
        if(is_null($product)) {
            return redirect()->route('home');
        }
        $cart = new Cart();
        $sessionCart = $request->session()->get('cart');
        if(!$sessionCart) {
            $cart->addToCart($product, $quantity);
            $request->session()->put(['cart' => ['items' => $cart->getItems(), 'total' => $cart->getTotal()]]);
        } else {
            $cart->setItems($sessionCart['items']);
            $cart->setTotal($sessionCart['total']);
            $cart->addToCart($product, $quantity);
            $request->session()->put(['cart' => ['items' => $cart->getItems(), 'total' => $cart->getTotal()]]);
        }
        return redirect()->route('cart');
    }

    public function cartRemove(Request $request)
    {
        $id = (int) $request->input('id');
        $product = Product::find($id);
        $cart = new Cart();
        $sessionCart = $request->session()->get('cart');
        $cart->setItems($sessionCart['items']);
        $cart->setTotal($sessionCart['total']);
        $cart->removeFromCart($product);
        $request->session()->put(['cart' => ['items' => $cart->getItems(), 'total' => $cart->getTotal()]]);
        return redirect()->route('cart');
    }

    public function cartUpdate(Request $request)
    {
        $qty = $request->input('qty');
        $parts = explode(',', $qty);
        $cart = new Cart();
        $sessionCart = $request->session()->get('cart');
        $cart->setItems($sessionCart['items']);
        $cart->setTotal($sessionCart['total']);
        foreach($parts as $part) {
            $qtys = explode('-', $part);
            $id = (int) $qtys[0];
            $quantity = (int) $qtys[1];
            $product = Product::find($id);
            $cart->updateCart($product, $quantity);
        }
        $request->session()->put(['cart' => ['items' => $cart->getItems(), 'total' => $cart->getTotal()]]);
        return redirect()->route('cart');
    }
}
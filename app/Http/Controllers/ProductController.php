<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return view('shop.index', [
            'products' => $products
        ]);
    }

    public function addToCart(Request $request, Product $product)
    {
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        return redirect()->route('product.index');
    }

    public function getShoppingCart()
    {
        if(request()->session()->has('cart')) return view('shop.shoppingCart', ['cart' => request()->session()->get('cart')]);
        return view('shop.shoppingCart', ['cart' => null]);
    }

    public function cartDelete($id, $num)
    {
        return true;
    }


}

<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function getCheckout()
    {
        return view('shop.checkout');
    }

    public function postCheckout(Request $request)
    {
        if(!request()->session()->has('cart')) return view('shop.shoppingCart', ['cart'=>null]);
        $cart = new Cart(request()->session()->get('cart'));
        \Stripe\Stripe::setApiKey("sk_test_pYgLNfthvyvcXoBJNfL7G3Ez00BN6HmMfp");
        $token = $request['stripeToken'];
        // dd($request->input('stripeToken'));
        try{
            $charge = \Stripe\Charge::create([
                'amount' => $cart->price *100,
                'currency' => 'usd',
                'description' => 'charged !!',
                'source' => $token,
            ])['id'];
            // dd($charge);
            $order = new Order();
            $order->user_id =1;
            $order->payment_id = $charge;
            $order->cart = serialize($cart);
            $order->save();
        } catch (Exception $e)
        {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        $request->session()->forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products');
    }


}

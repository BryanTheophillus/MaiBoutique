<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('Cart', compact('carts'));
    }

    public function editCart($id){
        $carts = Cart::findorFail($id);
        return view('editCart', compact('carts'));
    }

    public function addToCart($id, Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|gt:0'
        ]);

        $product = Product::findorFail($id);

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $currCart) {
            if ($currCart->product->id == $product->id) {
                $currCart->quantity = $currCart->quantity + $request->quantity;
                $totalprice = $request->quantity * $product->price;
                $currCart->totalprice = $currCart->totalprice + $totalprice;
                $currCart->save();
                return redirect('/myCart');
            }
        }

        if ($request->quantity <= $product->stock){
            $cart = new Cart();

            $cart->user_id = Auth::user()->id;
            $cart->product_id = $id;
            $cart->quantity = $request->quantity;
            $totalprice = $request->quantity * $product->price;
            $cart->totalprice = $totalprice;
            $cart->save();

            return redirect('/myCart');
        } else {
            echo '<div class="alert alert-danger" role="alert">
            The quantity is more than available stock<a href="/homepage" class="alert-link"> Click Here To Go Back!</a>.
          </div>';
        }

    }

    public function updateCart($id, Request $request){
        $carts = Cart::find($id);

        $request->validate([
            'quantity' => 'required|numeric|gt:0'
        ]);

        if(isset($request->quantity)){
            $carts->quantity = $request->quantity;
            $totalprice = $carts->product->price * $request->quantity;
            $carts->totalprice = $totalprice;
        }

        $carts->save();
        return redirect('/myCart');
    }

    public function deleteCart($id){
        $cart = Cart::find($id);
        if(isset($cart)){
            $cart->delete();
        }
        return redirect('/myCart');
    }
}

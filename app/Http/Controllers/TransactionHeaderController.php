<?php

namespace App\Http\Controllers;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class TransactionHeaderController extends Controller
{
    public function getAllTransactions() {
        $Headers = TransactionHeader::where('user_id', Auth::user()->id)->get();
        $Details = TransactionDetail::all();

        return view('History', compact('Headers', 'Details'));
    }

    public function addTransaction() {
        $Header = new TransactionHeader();
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        $Header ->user_id = Auth::user()->id;
        $Header ->subtotal = $carts->sum('totalprice');
        $Header ->save();

        foreach ($carts as $cart) {
            $Details = new TransactionDetail();
            $Details->product_id = $cart->product_id;
            $Products = Product::findOrFail($cart->product_id);
            $Details->transaction_headers_id = $Header ->id;
            $Details->quantity = $cart->quantity;
            $Details->totalprice = $cart->totalprice;
            $Products->stock = $Products->stock - $cart->quantity;
            $Products->save();
            $Details->save();
            $cart->delete();
        }

        return redirect('/History');
    }
}

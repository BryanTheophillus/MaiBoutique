<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionDetailController extends Controller
{
    public function History(){
        $Detail = TransactionDetail::all();
        $Header = TransactionHeader::where('user_id',Auth::user()->id)->get();
        $carts = Cart::where('user_id',Auth::user()->id)->get();

        return view('History',compact('Detail','Header','carts','carts'));
    }
}

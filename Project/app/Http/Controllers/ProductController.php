<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    public function homeProduct(){
        $products = Product::paginate(8);
        return view('homepage', compact('products'));
    }

    public function SearchProduct(Request $request){
        $products = Product::where('name','like','%'.$request->search.'%')->orwhere('price','like','%'.$request->search)->paginate(8);
        return view('Search', compact('products'));
    }

    public function AddProduct(Request $request){

        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|min:5|max:20|unique:products',
            'description' => 'required|string|min:5',
            'price' => 'required|numeric|min:1000',
            'stock' => 'required|numeric|min:1'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $file = $request->file('image');
        $fileName = time().$file->getClientOriginalName();
        Storage::putFileAs('public/product', $file, $fileName);
        $product->image = "product/".$fileName;



        $product->save();

        return redirect('/homepage');
    }
}

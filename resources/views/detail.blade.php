@extends('template.template')
@section('title','Add Product')

<link rel="stylesheet" href="{{url('/css/Sign.css')}}">
@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="ProdDetImg " src="{{Storage::url( $products->image)}}" alt="{{ $products->name}}">
            </div>
            <div class="col-6">
                <div class="Prodtitle">
                    <h1>{{ $products->name}}</h1>
                </div>
                <div class="ProdDetail">
                    <h3>Rp.{{ $products->price}}<h3>
                </div>
                <div class="ProdDetail">
                    <h4>Product Detail</h4>
                    <span>{{ $products->detail}}</span>
                </div>
                <div class="ProdDetail">
                    <h4>Stock</h4>
                    <span>{{ $products->stock}}</span>
                </div>
                @if(Auth::user()->role_id == 1)
                    <a href="{{url()->previous()}}"><button type="button" class="btn btn-primary mt-3 px-5">Back</button></a>
                    <a href="/Delete/{{$products->id}}"><button type="button" class="btn btn-primary mt-3">Delete Item</button></a>
                @elseif (Auth::user()->role_id == 2)
                    <td>
                        <form action="/addToCart/{{$products->id}}" method="POST" >
                            @csrf
                            <div class="container">
                                <h4>Qty</h4>
                                <input name="quantity" id = "quantity"type="number">
                                @if($products->stock == 0)
                                    <button type="submit" class="btn btn-success w-50" disabled>Out Of Stock</button>
                                @else
                                    <button type="submit" class="btn btn-success w-50">Add to Cart</button>
                                @endif
                                <a href="{{url()->previous()}}"><button type="button" class="btn btn-danger mt-3 px-5 w-50">Back</button></a>
                            </div>
                        </form>

                    </td>

                @endif
            </div>
        </div>
    </div>
</div>

@endsection

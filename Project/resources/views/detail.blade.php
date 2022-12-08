@extends('template.loginNav')
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
                @if(Auth::user()->role_id == 1)
                    <a href="{{url()->previous()}}"><button type="button" class="btn btn-primary mt-3 px-5">Back</button></a>
                    <a href="/Delete/{{ $products->id}}"><button type="button" class="btn btn-primary mt-3">Delete Item</button></a>
                @elseif (Auth::user()->role_id == 2)
                    <td>
                        <form action="" method="POST">
                            @csrf
                            <div>
                                <h4>Qty</h4>
                                <input name="quantity" id = "quantity"type="number">
                                <button type="submit" class="btn btn-success" style="width:50%">Update Cart</button>

                                <a href="{{url()->previous()}}"><button type="button" class="btn btn-primary mt-3 px-5" style="width:100%">Back</button></a>
                            </div>
                        </form>

                    </td>

                @endif
            </div>
        </div>
    </div>
</div>

@endsection

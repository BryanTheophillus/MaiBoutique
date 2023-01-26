@extends('template.template')
@section('title','Edit cart')

<link rel="stylesheet" href="{{url('/css/Sign.css')}}">
@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="ProdDetImg " src="{{Storage::url( $carts->product->image)}}" alt="{{$carts->product->name}}">
            </div>
            <div class="col-6">
                <div class="Prodtitle">
                    <h1>{{ $carts->product->name}}</h1>
                </div>
                <div class="ProdDetail">
                    <h3>Rp.{{ $carts->product->price}}<h3>
                </div>
                <div class="ProdDetail">
                    <h4>Product Detail</h4>
                    <span>{{ $carts->product->detail}}</span>
                </div>
                    <td>
                        <form action="/UpdateCart/{{$carts->id}}" enctype="multipart/form-data" method="POST" >
                            @csrf
                            @method('patch')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="container">
                                <h4>Qty</h4>
                                <input name="quantity" id = "quantity"type="number" value="{{$carts->quantity}}" style="margin-left:0;">
                                <button type="submit" class="btn btn-success w-50">Update Cart</button>

                                <a href="{{url()->previous()}}"><button type="button" class="btn btn-danger mt-3 px-5 w-50">Back</button></a>
                            </div>
                        </form>
                    </td>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

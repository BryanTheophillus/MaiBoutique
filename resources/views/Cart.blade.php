@extends('template.template')
@section('title','Cart')

<link rel="stylesheet" href="{{url('/css/home.css')}}">
@section('content')
    <div class="content-1">
        <h3 class="CTitle d-flex justify-content-center">My Cart</h3>
    </div>
    <div class="d-flex flex-wrap justify-content-center">
        @php
            $i = 0;
        @endphp

        @foreach ($carts as $cart)
            @php
                $i++;
            @endphp
        @endforeach
        @if ($carts->isEmpty())
            <p class="mx-3" id="msg" >Cart is Empty</p>
        @else
            <div class="container-fluid">
                <h3 class="d-flex flex-wrap justify-content-end">Total Price : {{$carts->sum('totalprice')}}
                    <form action="/Checkout" method="POST" style="margin-left: 2%; margin-right:2%;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Checkout ({{$i}})</button>
                    </form>
                </h3>
            </div>
        @endif

        @foreach ($carts as $cart)
            <div class="card m-3 bg-white text-black">
                <img class="card-img-top" src="{{Storage::url($cart->product->image)}}" alt="">
                <div class="card-body">
                    <div>
                        <h5 class="card-title">{{$cart->product->name ?? 'None'}}</h5>
                        <span class="card-title">Rp.{{$cart->product->price ?? 'None'}}</span>
                        <br>
                        <span class="card-title">Qty: {{$cart->quantity ?? 'None'}}</span>
                        <td>
                            <div class="button mt-2" style="display: flex">
                                <form action="/UpdateCart/{{$cart->id}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                                <form action="/DeleteCart/{{$cart->id}}" method="POST" style="margin-left: 5px" >
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </div>
                </div>
          </div>
        @endforeach
    </div>
@endsection

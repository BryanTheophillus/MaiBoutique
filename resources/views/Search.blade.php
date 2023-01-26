@extends('template.template')
@section('title','Search')

<link rel="stylesheet" href="{{url('/css/home.css')}}">
@section('content')

<div class="content-1">
    <h3 class="CTitle d-flex justify-content-center">Search Your Favorite Clothes Here!</h3>
</div>
<form action="/SearchProd" method="GET" class="d-flex">
    <input class="SearchBox form-control" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="searchBtn btn btn-primary" type="submit">Search</button>
</form>

<div class="d-flex flex-wrap justify-content-center">
    @if ($products->isEmpty())
        <p id="msg" >Not Found</p>
    @endif
    @foreach ($products as $product)
      <div class="card m-3 bg-white text-black">
          <img class="card-img-top" src="{{Storage::url($product->image)}}" alt="">
          <div class="card-body">
              <div>
                    <h5 class="card-title">{{$product->name}}</h5>
              </div>
              <p class="card-text">Rp.{{$product->price}}</p>
              <td><a href="/Detail/{{$product->id}}" class="btn bg-Primary">More Detail</a></td>
          </div>
      </div>
    @endforeach
</div>
@endsection

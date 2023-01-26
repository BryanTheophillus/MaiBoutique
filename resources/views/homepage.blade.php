@extends('template.template')
@section('title','Homepage')

<link rel="stylesheet" href="{{url('/css/home.css')}}">
@section('content')
<div class="content-1">
    <h3 class="CTitle d-flex justify-content-center">Find Your Best Clothes Here!</h3>
</div>
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
<div style="justify-content: :space-around;margin-top:2%">
    <div>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href={{$products->previousPageUrl()}}>&laquo;</a>
                </li>
                @for ($i = 1 ; $i<= $products->lastPage();$i++)
                    @if ($i == $products->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="#">{{$i}}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href={{$products->Url($i)}}>{{$i}}</a>
                        </li>
                    @endif
                @endfor
                <li class="page-item">
                    <a class="page-link" href={{$products->nextPageUrl()}}>&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

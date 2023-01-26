@extends('template.template')
@section('title','History')

@section('content')
    <div class="content-1">
        <h3 class="CTitle d-flex justify-content-center">Check What Have You Bought</h3>
    </div>
    @forelse ($Headers as $header )
        <div class="card mt-3 mx-3">
            <div class="card-header">
                <p>{{$header->created_at}}</p>
            </div>
            <div class="card-body">
                @foreach ($Details as $detail )
                    @if ($detail->transaction_headers_id == $header->id)
                        <span class="card-body">- {{$detail->quantity}} pc(s) {{$detail->product->name}}   Rp.{{$detail->product->price}}</span><br>
                    @endif
                @endforeach
                <h6 class="card-body">Total Price : Rp.{{$header->subtotal}}</h6>
            </div>
        </div>
    @empty
    @endforelse

@endsection

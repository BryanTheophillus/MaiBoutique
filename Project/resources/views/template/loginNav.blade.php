@extends('template.template')

@section('navbar')
<link rel="stylesheet" href="{{url('/css/navbar.css')}}">


@auth
    @if (Auth::user()->role_id == 1)
        <header>
            <nav class="navbar navbar-light px-5" id="nav">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/" id="">MAI BOUTIQUE</a>
                    <form class="d-flex">
                        <a href="" id="">Add Item</a>
                        <a href = "/SignOut" id="">Sign Out</a>
                    </form>
                </div>
            </nav>
        </header>
    @elseif (Auth::user()->role_id == 2)
        <header>
            <nav class="navbar navbar-light px-5" id="nav">
                <div class="container-fluid">
                <a class="navbar-brand" href="/" id="brand">MAI BOUTIQUE</a>
                <form class="d-flex">
                    <a href = "/SignOut" id="">Sign Out</a>
                </form>
                </div>
            </nav>
        </header>
    @endif
@endauth

@endsection

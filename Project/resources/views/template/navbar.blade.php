@extends('template.template')

@section('navbar')
<link rel="stylesheet" href="{{url('/css/home.css')}}">
<header>
    <nav class="navbar navbar-light px-5" id="nav">
        <div class="container-fluid">
        <a class="navbar-brand" href="/" id="brand"><u>MAIBOUTIQUE</u></a>
        <form class="d-flex">
            <a href = "/SignIn" id="SignInLink">Sign in</a>
        </form>
        </div>
    </nav>
</header>

@endsection

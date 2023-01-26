@extends('template.template')
@section('title','Home')

@section('content')
<link rel="stylesheet" href="{{url('/css/home.css')}}">

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <img src="{{url("../storage/asset/home.jpg")}}" id="image">
        <div class="container">
            <div class="centered row text-center">
                <div class="col-lg-12">
                    <img>
                    <h1 id="main-text">Welcome to <u>MaiBoutique</u></h1>
                    <h3 id="secondary-text">Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</h3>
                    <a href="/SignUp"><button id="SignUpButton" type="button" class="btn btn-primary mt-3">Sign Up Now</button></a>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection

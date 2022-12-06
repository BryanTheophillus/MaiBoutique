@extends('template.template')
@section('title','Home')

@section('content')
<link rel="stylesheet" href="{{url('/css/home.css')}}">

<body>
    <header>
        <nav class="navbar navbar-light px-5" id="nav">
            <div class="container-fluid">
            <a class="navbar-brand" href="/" id="brand"><u>MAIBOUTIQUE</u></a>
            <form class="d-flex">
                <a href = "/SignIn" class="signin pt-3" >Sign in</a>
            </form>
            </div>
        </nav>
    </header>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row text-center">
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

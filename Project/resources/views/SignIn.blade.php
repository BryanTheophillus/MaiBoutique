@extends('template.template')
@section('title','Sign In')

@section('content')
<link rel="stylesheet" href="{{url('/css/Sign.css')}}">
<body>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-3" id="card">
                    <h3 class="card-title text-center mt-5">Sign In</h3>
                    <form action="/SignIn" method="POST">
                        @csrf
                        <label for="Email" id="email">Email</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="Email" id="email" placeholder="">
                        </div>
                        <label for="Password" id="password">Password</label>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="Password" id="password" placeholder="5-20 Characters">
                        </div>
                        <div>
                            <input type="checkbox" name="Remember" class="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <div class="form-group d-flex justify-content-center ">
                            <button class="btn" id="signinbtn" type="submit" value="submit">Sign In</button>
                        </div>
                        <div class="form-group d-flex justify-content-center mt-3 mb-3" id="bot">
                            <span id="SignInLink">Not Registered Yet? <a href ="/SignUp"> Sign Up Here</a></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

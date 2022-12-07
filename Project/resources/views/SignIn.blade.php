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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label for="email" id="email">Email</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{Cookie::get('cookieEmail') != null ? Cookie::get('cookieEmail') : '' }}">
                        </div>
                        <label for="password" id="password">Password</label>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="5-20 Characters" value="{{Cookie::get('cookiePassword') != null ? Cookie::get('cookiePassword') : '' }}">
                        </div>
                        <div>
                            <input type="checkbox" name="remember" class="remember" {{Cookie::get('cookieEmail') != null ? Cookie::get('cookieEmail') : '' }}>
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
@endsection

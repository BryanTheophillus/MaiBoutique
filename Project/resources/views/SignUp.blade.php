@extends('template.template')
@section('title','Sign Up')

@section('content')
<link rel="stylesheet" href="{{url('/css/Sign.css')}}">
<body>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-3" id="card">
                    <h3 class="card-title text-center mt-5">Sign Up</h3>
                    <form action="/SignUp" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>@foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            </div>
                        @endif

                        <label for="Username" id="username">Username</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="(5-20 letters)">
                        </div>
                        <label for="Email" id="email">Email</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <label for="Password" id="password">Password</label>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="(5-20 letters)">
                        </div>
                        <label for="Phonenumber" id="phonenumber">Phone Number</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="(10-13 number)">
                        </div>
                        <label for="Address" id="address">Address</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="address" id="address" placeholder="(Min 5 letters)">
                        </div>
                        <div class="form-group d-flex justify-content-center ">
                            <button class="btn" id="submitbtn" type="submit" value="submit">Submit</button>
                        </div>
                        <div class="form-group d-flex justify-content-center mt-5 mb-3" >
                            <span id="SignUpLink">Already Registered? <a href ="/SignIn"> Sign In Here</a></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection



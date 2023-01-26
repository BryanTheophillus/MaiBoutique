@extends('template.template')
@section('title','Edit Profile')

<link rel="stylesheet" href="{{url('/css/Sign.css')}}">
@section('content')
<body>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-3" id="card">
                    <h3 class="card-title text-center mt-5">Edit Profile</h3>
                    <form action="/EditProfile" method="POST">
                        @csrf
                        @method('patch')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label for="Username" id="username">Username</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="username" id="username" value="{{$user->username}}">
                        </div>
                        <label for="Email" id="email">Email</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                        </div>
                        <label for="Phonenumber" id="phonenumber">Phone Number</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="{{$user->phonenumber}}">
                        </div>
                        <label for="Address" id="address">Address</label>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
                        </div>
                        <div class="form-group d-flex justify-content-center ">
                            <button class="btn btn-success mt-2" type="submit" value="submit" style="width: 90%">Save Update</button>
                        </div>
                        <a href="/Profile"><button type="button" class="btn btn-danger mt-3 px-5 mx-3" style="margin-left: 1%">Back</button></a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@extends('template.loginNav')
@section('title','Profile')

@section('content')
<link rel="stylesheet" href="{{url('/css/Sign.css')}}">
<body>
    <div class="profileCard card text-center mx-auto mt-5">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
            <h5 class="card-title">Username:{{$user->username}}</h5>
            <p class="card-text">{{$user->role->name}}</p>
            <p class="card-text">{{$user->email}}</p>
            <p class="card-text">{{$user->address}}</p>
            <p class="card-text">{{$user->phonenumber}}</p>

            <div class="mb-3">
                <a href="#" class="btn btn-primary">Edit Profile</a>
                <button type="submit" class="btn btn-outline-primary" >Edit Password</button>

            </div>
        </div>
        <div class="card-footer text-muted">
            Profile
        </div>
    </div>
</body>
@endsection

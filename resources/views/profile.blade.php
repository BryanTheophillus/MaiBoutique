@extends('template.template')
@section('title','Profile')

@section('content')
<link rel="stylesheet" href="{{url('/css/Sign.css')}}">
<body>
    <div class="profileCard card text-center mx-auto mt-5">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$user->username}}</h5>
            <p class="card-text">{{$user->role->name}}</p>
            <p class="card-text">{{$user->email}}</p>
            <p class="card-text">{{$user->address}}</p>
            <p class="card-text">{{$user->phonenumber}}</p>

            <div class="mb-3">
                @if(Auth::user()->role_id == 1)
                    <a href="/EditPassword" class="btn btn-outline-primary">Edit Password</a>
                @elseif (Auth::user()->role_id == 2)
                    <a href="/EditProfile" class="btn btn-primary">Edit Profile</a>
                    <a href="/EditPassword" class="btn btn-outline-primary">Edit Password</a>
                @endif
            </div>
        </div>
    </div>
</body>
@endsection

@extends('template.template')
@section('title','Edit Password')


@section('content')
<body>
    <div class="container mt-2" >
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-3" id="card" style="background-color: rgb(254, 204, 213); min-height:30rem; border-color: black; border-width: 3px; border-radius: 1%; margin-bottom: 5%;">
                    <h3 class="card-title text-center mt-5">Edit Password</h3>
                    <form action="/EditPassword" method="POST">
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
                        <label for="old_password" id="password" style="margin-left: 5%; margin-bottom: 3%;">Old Password</label>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="old_password" id="old_password" placeholder="5-20 Characters" style="margin-left: 5%; width:90%;">
                        </div>
                        <label for="new_password" id="password" style="margin-left: 5%; margin-bottom: 3%;">New Password</label>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="5-20 Characters" style="margin-left: 5%; width:90%;">
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

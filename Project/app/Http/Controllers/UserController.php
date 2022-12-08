<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Home(){
        return view('home');
    }

    public function SignIn(){
        return view('SignIn');
    }

    public function SignUp(){
        return view('SignUp');
    }

    public function Register(Request $request){
        $request->validate([
            'username'=>'required|string|min:5|max:10|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5|max:20',
            'phonenumber' =>'required|digits_between:10,13',
            'address' =>'required|string|min:5|max:255'
        ]);

        $user = new User();
        $user->role_id ='2';
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $user->save();
        return redirect('/');
    }

    public function viewProfile(){
        $user = Auth::user();

        return view('profile',compact('user'));
    }

}

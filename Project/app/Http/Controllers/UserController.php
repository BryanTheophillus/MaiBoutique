<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            'username'=>'required|string|min:5|max:10|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|string|min:5|max:20',
            'phonenumber' =>'required|digits_between:10,13',
            'address' =>'required|string|min:5|max:255',
            'agreement' =>'accepted'
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
}

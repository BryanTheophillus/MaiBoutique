<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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

    public function editProfile(){
        $user = Auth::user();
        return view('editProfile',compact('user'));
    }

    public function updateProfile( Request $request){
        $user = User::find(Auth::user()->id);
        $request->validate([
            'username'=>'required|string|min:5|max:10',Rule::unique('users')->ignore($user->username),
            'email' => 'required|email|',Rule::unique('users')->ignore($user->email),
            'phonenumber' =>'required|digits_between:10,13',
            'address' =>'required|string|min:5|max:255'
        ]);

        if(isset($request->username)){
            $user->username = $request->username;
        }

        if(isset($request->email)){
            $user->email = $request->email;
        }

        if(isset($request->phonenumber)){
            $user->phonenumber = $request->phonenumber;
        }

        if(isset($request->address)){
            $user->address = $request->address;
        }
        $user->save();
        return redirect('/Profile');
    }

    public function editPassword(){
        $user = Auth::user();
        return view('editPassword',compact('user'));
    }

    public function updatePassword(Request $request){
        $user = User::find(Auth::user()->id);
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:5|max:20'
        ]);

        if (!Hash::check($request->get('old_password'), $user->password))
        {
            return back()->with('error', "Old Password doesnt match");
        }
        if (strcmp($request->get('old_password'), $request->new_password) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user->password =  Hash::make($request->new_password);
        $user->save();
        return redirect('/Profile');
    }

}

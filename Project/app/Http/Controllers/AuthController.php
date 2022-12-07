<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            if($request->remember) {
                Cookie::queue('cookieEmail', $request->email, 300);
                Cookie::queue('cookiePassword', $request->password, 300);
            }
            else {
                Cookie::queue(Cookie::forget('cookieEmail'));
                Cookie::queue(Cookie::forget('cookiePassword'));
            }

            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('Error');
    }

    // public function logout() {
    //     Auth::logout();
    //     return redirect("/SignIn");
    // }
}

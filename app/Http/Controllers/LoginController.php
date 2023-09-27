<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (!empty(auth::check())) {
            return redirect()->route('dashboard')->with('success', 'Login successfully');
        }

        return view('auth.login');
    }
    public function AuthLogin(Request $request)
    {
        // $data = request()->all();
        // dd($data);
        // dd(hash::make(1234));


        $remember = !empty($request->remember) ? true : false;
        // dd($remember);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }
    public function logout()
    {

        Auth::logout();

        return redirect()->route('main-logn');
    }
}

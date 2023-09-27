<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect()->route('admin-dashboard')->with('success', 'Login successfully');
            } elseif (Auth::user()->user_type == 2) {
                return redirect()->route('teacher-dashboard')->with('success', 'Login successfully');
            } elseif (Auth::user()->user_type == 3) {

                return redirect()->route('student-dashboard')->with('success', 'Login successfully');
            } elseif (Auth::user()->user_type == 4) {

                return redirect()->route('parent-dashboard')->with('success', 'Login successfully');
            }
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
            if (Auth::user()->user_type == 1) {
                return redirect()->route('admin-dashboard')->with('success', 'Login successfully');
            } elseif (Auth::user()->user_type == 2) {
                return redirect()->route('teacher-dashboard')->with('success', 'Login successfully');
            } elseif (Auth::user()->user_type == 3) {

                return redirect()->route('student-dashboard')->with('success', 'Login successfully');
            } elseif (Auth::user()->user_type == 4) {

                return redirect()->route('parent-dashboard')->with('success', 'Login successfully');
            }
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

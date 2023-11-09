<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordVali;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password()
    {

        $data['header_title'] = "Change Password";
        return view('Profile.change_password', $data);
    }

    public function update_change_password(PasswordVali $request)
    {
        $user = User::getSingleDataWithId(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'password successfully updated');
        } else {

            return redirect()->back()->with('error', 'Old password is not correct');
        }
    }
}

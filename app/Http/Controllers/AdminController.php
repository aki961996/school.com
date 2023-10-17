<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function list()
    {

        $data['header_title'] = "Admin List";
        $users = User::getAdmin();
        return view('admin.admin.list', $data, ['users' => $users]);
    }

    public function add()
    {
        $data['header_title'] = "Admin Add";
        return view('admin.admin.add', $data);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect()->route('admin-list')->with('success', 'New Admin successfully addedd');
    }

    public function edit(Request $request, $id)
    {
        // $id = decrypt($id);
        // $AdminsData = User::find($id);
        $AdminsData = User::getSingle($id);
        // dd($AdminsData);
        if (!empty($AdminsData)) {
            $data['header_title'] = "Edit Admin";
            return view("admin.admin.edit", $data, ['admins' => $AdminsData]);
        } else {
            abort(404);
        }
    }

    public function update(Request $request)
    {

        $id = $request->id;
        $request->validate([
            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $id

        ]);
        $id = $request->id;
        $user = User::getSingleDate($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin-list')->with('success', 'Data Updated Successfully');
    }
    public function delete(Request $request, $id)
    {
        $AdminsData = User::getSingle($id);
        $AdminsData->is_delete = 1;
        $AdminsData->save();
        return redirect()->route('admin-list')->with('success', 'Data Deleted Successfully');
    }
}

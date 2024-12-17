<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function index()
    {
        $data['header_title'] = "Parents List";
        $data['getRecord'] = User::getParent();
        return view('admin.parents.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Parents Add";
        return view('admin.parents.add', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'address' => 'required',
            'occupation' => 'required',
            'email' => 'required|unique:users,email', // assuming 'users' is your table name and 'email' is the column name
        ]);
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }
        $validated = $validator->validated();
        $validated = $validator->safe()->only(['name', 'email', 'password']);
        $parent_data = new User();
        $parent_data->name = trim($request->name);
        $parent_data->last_name = trim($request->last_name);
        $parent_data->email = trim($request->email);
        $parent_data->password = Hash::make($request->password);
        $parent_data->gender = trim($request->gender);
        $parent_data->occupation = trim($request->occupation);
        $parent_data->address = trim($request->address);
        $parent_data->mobile_number = trim($request->mobile_number);
        $parent_data->status = trim($request->status);
        $parent_data->user_type = 4;

        $parent_data->save();


        return redirect()->route('parent-list')->with('success', 'Parents data inserted success');
    }

    //parent edit
    public function edit(Request $request)
    {
        $data['header_title'] = "Parents Edit";
        $id = decrypt($request->id);
        $singel_data = User::find($id);
        return view('admin.parents.edit', $data, ['datas' => $singel_data]);
    }

    //parents update
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'address' => 'required',
            'occupation' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        $id = $request->id;
        $update_single_data = User::find($id);

        if (!empty($update_single_data)) {
            $update_single_data->name = trim($request->name);
            $update_single_data->last_name = trim($request->last_name);
            $update_single_data->password = trim(Hash::make($request->password));
            $update_single_data->status = trim($request->status);
            $update_single_data->gender  = trim($request->gender);
            $update_single_data->address = trim($request->address);
            $update_single_data->occupation = trim($request->occupation);
            $update_single_data->email = trim($request->email);
            $update_single_data->save();
        }
        return redirect()->route('parent-list')->with('success', 'Parents data Updated Successfully');
    }

    public function delete(Request $request)
    {

        $id = decrypt($request->id);
        $delete_data =  User::find($id);
        $delete_data->is_delete = 1;
        $delete_data->save();
        return redirect()->route('parent-list')->with('success', 'Parents data Deleted Successfully');
    }

    public function myStudent(Request $request, $id)
    {
        $data['parent_id'] = decrypt($id);
        $data['header_title'] = "My student List";
        $data['getRecord'] = User::getSearchStudents();

        // $data['getStudent'] = User::getStudentByParent($data['parent_id']);
        return view('admin.parents.my_student', $data);
    }
}

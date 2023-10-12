<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use PhpParser\Builder\Class_;

class ClassModelController extends Controller
{
    public function list()

    {
        $ClassModel = ClassModel::getAllAdminData();
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data);
    }

    public function add()
    {
        $users = User::all();

        $data['header_title'] = "Class Add";
        return view('admin.class.add', $data, ['users' => $users]);
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'email' => 'required|email|unique:users',
        // ]);
        $class_model = new ClassModel();
        $class_model->name = $request->name;
        $class_model->status = $request->status;
        $class_model->created_by = $request->by;


        $class_model->save();

        return redirect()->route('class-list')->with('success', 'New Class successfully addedd');
    }
}

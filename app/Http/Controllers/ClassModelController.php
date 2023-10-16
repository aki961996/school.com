<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class ClassModelController extends Controller
{
    public function list()

    {
        //dummy
        // $dummy = ClassModel::dummy();
        // dd($dummy);
        // foreach ($dummy as $d) {
        //     return $d;
        // }


        $ClassModel = ClassModel::getAllAdminData();
        //dd($ClassModel);

        $users = User::all();
        // dd($users);
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data, ['classModel' => $ClassModel, 'users' => $users],);
    }

    public function add()
    {
        $users = User::all();

        $data['header_title'] = "Class Add";
        return view('admin.class.add', $data, ['users' => $users]);
    }
    public function ClassAdd(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'email' => 'required|email|unique:users',
        // ]);
        $class_model = new ClassModel();
        $class_model->name = $request->name;
        $class_model->status = $request->status;
        $class_model->created_by = $request->created_by;



        $class_model->save();

        return redirect()->route('class-list')->with('success', 'New Class successfully addedd');
    }
    public function ClassEdit($id)
    {
        $data['header_title'] = "Class Edit";
        $dataAdmin = ClassModel::getSingleData($id);
        return view('admin.class.edit', $data, ['admin' => $dataAdmin]);
    }

    //delete


    //update
    public function classUpdate(Request $request)
    {
        $id = $request->id;
        $data = ClassModel::getSingle($id);
        $data->name = trim($request->name);
        $data->created_by = trim($request->created_by);
        $data->status = trim($request->status);
        $data->save();
        return redirect()->route('class-list')->with('success', 'Data Updated Successfully');
    }

    public function classDelete($id)
    {

        $AdminsData = ClassModel::getSingleData($id);
        //$AdminsData->is_delete = 1;
        $AdminsData->delete();
        return redirect()->route('class-list')->with('success', 'Data Deleted Successfully');
    }
}

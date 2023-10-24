<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
        $users = User::all();
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data, ['classModel' => $ClassModel, 'users' => $users]);
    }

    public function add()
    {
        $users = User::all();
        $data['header_title'] = "Class Add";
        return view('admin.class.add', $data, ['users' => $users]);
    }

    public function ClassAdd(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',

        ]);
        // $class_model = new ClassModel();
        // $class_model->name = $request->name;
        // $class_model->status = $request->status;
        // $class_model->created_by = auth()->user()->id;
        // dd($class_model->created_by);
           $post = ClassModel::create([
            'name' => $validatedData['name'],
            'status' => $validatedData['status'],
            'created_by' => Auth::user()->id,
        ]);

        // $class_model->save();
        // return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);

        return redirect()->route('class-list')->with('success', 'Class created successfully');
    }
    public function ClassEdit($id)
    {

        $dataAdmin = ClassModel::getSingleData($id);
        if (!empty($dataAdmin)) {
            $data['header_title'] = "Class Edit";
            return view('admin.class.edit', $data, ['admin' => $dataAdmin]);
        } else {
            abort(404);
        }
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
        $AdminsData->is_delete = 1;
        $AdminsData->save();
        return redirect()->route('class-list')->with('success', 'Data Deleted Successfully');
    }
}

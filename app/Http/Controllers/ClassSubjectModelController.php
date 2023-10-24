<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectModelController extends Controller
{
    public function index(Request $request)
    {
        $data['header_title'] = "Subject assign List";
        $subject_assign = ClassSubjectModel::getRecord();
        // dd($subject_assign);
        return view('admin.assignSubject.list', $data, ['users' => $subject_assign]);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = Subject::getSubject();
        // dd($data['getSubject']);
        $data['header_title'] = "Assign Subject Add";
        return view('admin.assignSubject.add', $data);
    }

    public function assignSubjectsAdd(Request $request)
    {
        // dd($request->all());
        $class_subject_models = new ClassSubjectModel();
        $class_subject_models->class_id = $request->name;
        $class_subject_models->status = $request->status;
        $class_subject_models->subject_id = $request->subject;

        $class_subject_models->created_by = Auth::user()->id;

        $class_subject_models->save();
        return redirect()->route('assign-subject-list')->with('success', 'Data Inserted Successfully');
    }
}

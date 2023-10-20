<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;

class ClassSubjectModelController extends Controller
{
    public function index(Request $request)
    {
        $data['header_title'] = "Subject assign List";
        $subject_assign = ClassSubjectModel::getRecord();
        return view('admin.assignSubject.list', $data, ['users' => $subject_assign]);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        //dd($data['getClass']);
        $data['header_title'] = "Assign Subject Add";
        return view('admin.assignSubject.add', $data);
    }

    public function assignSubjectsAdd(Request $request,)
    {
    }
}

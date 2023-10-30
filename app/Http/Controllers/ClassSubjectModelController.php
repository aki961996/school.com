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
        if (!empty($request->subject_id)) {


            foreach ($request->subject_id as $subject_id) {

                $getAlreadtFirts = ClassSubjectModel::getAlreadtFirts($request->class_id, $subject_id);
                if (!empty($getAlreadtFirts)) {
                    $getAlreadtFirts->status = $request->status;
                    $getAlreadtFirts->save();
                } else {

                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->status = $request->status;
                    // Use $subject_id instead of $request->subject.
                    $save->subject_id = $subject_id;
                    $save->created_by = Auth::user()->id;

                    // Move the redirect outside of the loop.
                    $save->save();
                }
            }

            // Redirect after the loop is finished.
            return redirect()->route('assign-subject-list')->with('success', 'Data Inserted Successfully');
        } else {
            return redirect()->back()->with('error', 'Due to some error please try again');
        }
    }

    // public function assignSubjectsEdit($id, Request $request)
    // {
    //     $idGet = decrypt($id);
    //     //print_r($idGet);

    //     $data = ClassSubjectModel::getRecord($idGet);
    //     // echo "<pre>";
    //     // print_r($data);
    //     // exit();

    //     return view('admin.assignSubject.edit', ['dataAssignSubject' => $data]);
    // }
}

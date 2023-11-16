<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $data['header_title'] = " Add Assign Subject ";
        return view('admin.assignSubject.add', $data);
    }

    public function assignSubjectsAdd(Request $request)
    {

        Validator::make($request->all(), [
            'class_id' => 'required',
            'subject_id[]' => 'required',
            'status' => 'required',



        ]);



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

    public function assignSubjectsEdit($id, Request $request)
    {
        $idGet = decrypt($id);
        $data = ClassSubjectModel::getSingleData($idGet);
        if (!empty($data)) {

            $data['getRecord'] = $data;
            //dd($data['getRecord']);

            $data['getAssignSubjectId'] = ClassSubjectModel::getAssignSubjectId($data->class_id);
            // dd($data['getAssignSubjectId']);



            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = Subject::getSubject();
            $data['header_title'] = "Edit Assign Subject ";
            return view('admin.assignSubject.edit', $data, ['dataAssignSubject' => $data]);
        } else {
            abort(404);
        }
    }

    //delete
    public function destroy($id)
    {
        $id = decrypt($id);

        $save = ClassSubjectModel::getSingle($id);

        $save->is_delete = 1;
        $save->save();

        return redirect()->route('assign-subject-list')->with('success', 'Data Deleted Successfully');
    }

    //update
    public function update(Request $request)
    {

        $deleteSubjects = ClassSubjectModel::deleteSubject($request->class_id);

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
        }
        return redirect()->route('assign-subject-list')->with('success', 'Data Updated Successfully');
    }

    public function editSingle(Request $request, $id)
    {
        $idGet = decrypt($id);
        $data = ClassSubjectModel::getSingleData($idGet);
        if (!empty($data)) {

            $data['getRecord'] = $data;

            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = Subject::getSubject();
            $data['header_title'] = "Edit Single Assign Subject";
            return view('admin.assignSubject.edit_single', $data, ['dataAssignSubject' => $data]);
        } else {
            abort(404);
        }
    }

    public function  single_update(Request $request, $id)
    {


        $getAlreadtFirts = ClassSubjectModel::getAlreadtFirts($request->class_id, $request->subject_id);

        if (!empty($getAlreadtFirts)) {
            $getAlreadtFirts->status = $request->status;
            $getAlreadtFirts->save();

            return redirect()->route('assign-subject-list')->with('success', 'Status Updated Successfully');
        } else {
            $idGet = decrypt($id);

            $save = ClassSubjectModel::getSingleData($idGet);
            $save->class_id = $request->class_id;
            $save->status = $request->status;
            $save->subject_id = $request->subject_id;
            $save->save();
            return redirect()->route('assign-subject-list')->with('success', 'Data Updated Successfully');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $data['header_title'] = "Student List";
        $data['getRecord'] = User::getStudent();
        // dd($data['getRecord']);
        return view('admin.student.list', $data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Student Add";
        return view('admin.student.add', $data);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if ($request->hasFile('profile_pic')) {
            $extension = request('profile_pic')->extension();
            $fileName = 'student_pic_' . time() . '.' . $extension;

            request('profile_pic')->storeAs('images', $fileName);

            $student->profile_pic = $fileName;
        }

        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);

        $student->user_type = 3;

        $student->save();


        return redirect()->route('student-list')->with('success', 'data inserted success');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index()
    {
        $data['header_title'] = "Student List";
        $data['getRecord'] = User::getStudent();

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

        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'admission_number' => 'required|numeric',
            'roll_number' => 'required|numeric',
            'class_id' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'admission_date' => 'required',
            'email' => 'required|unique:users,email,',
        ]);
        $validated = $validator->validated();
        $validated = $validator->safe()->only(['name', 'email', 'password']);

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

    public function edit($id)
    {

        $data = User::getSingleData($id);
        // dd($data['getSingleData']);
        if (!empty($data)) {

            $data['getRecord'] = $data;
            //dd($data['getRecord']);


            $data['getClass'] = ClassModel::getClass();
            //dd($data['getClass']);

            $data['header_title'] = "Edit student";
            return view("admin.student.edit", $data, ['datas' => $data]);
        } else {
            abort(404);
        }
    }
    public function StudentUpdate(Request $request)
    {


        $request->validate([

            'name' => 'required',
            'last_name' => 'required',
            'admission_number' => 'required|numeric',
            'roll_number' => 'required|numeric',
            'class_id' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'admission_date' => 'required',
            //'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif',
            'password' => 'required',
            'email' => 'required'

        ]);

        $id = $request->id;
        $data = User::getSingleWithId($id);

        if (!empty($data)) {
            $data->name = trim($request->name);
            $data->last_name = trim($request->last_name);
            $data->email = trim($request->email);
            $data->password = Hash::make($request->password);
            $data->admission_number = trim($request->admission_number);
            $data->roll_number = trim($request->roll_number);
            $data->class_id = trim($request->class_id);
            $data->gender = trim($request->gender);
            if (!empty($request->date_of_birth)) {
                $data->date_of_birth = trim($request->date_of_birth);
            }
            //emailchechiking
            $ema = $data->email = trim($request->email);
            if ($ema) {
                $ema = $data->email;
                if ($ema) {
                    $data->email = $ema;
                }
            }

            //profilepic
            // if ($request->hasFile('profile_pic')) {
            //     Storage::delete('images/' . $data->profile_pic);
            //     $extension = request('profile_pic')->extension();
            //     $fileName = 'voice_pic_' . time() . '.' . $extension;
            //     request('profile_pic')->storeAs('images', $fileName);

            //     $data->profile_pic = $fileName;
            // }
            if ($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()) {
                Storage::delete('images/' . $data->profile_pic);
                $extension = request('profile_pic')->extension();
                $fileName = 'voice_pic_' . time() . '.' . $extension;
                request('profile_pic')->storeAs('images', $fileName);
                $data->profile_pic = $fileName;
            }

            $data->caste = trim($request->caste);
            $data->religion = trim($request->religion);
            $data->mobile_number = trim($request->mobile_number);
            if (!empty($request->admission_date)) {
                $data->admission_date = trim($request->admission_date);
            }

            if (!empty($request->password)) {
                $data->password = Hash::make($request->password);
            }
            $data->blood_group = trim($request->blood_group);
            $data->height = trim($request->height);
            $data->weight = trim($request->weight);
            $data->status = trim($request->status);
            $data->save();
        }

        return redirect()->route('student-list')->with('success', 'Data Updated Successfully');
    }




    public function destory($id)
    {

        $dataDelet = User::getSingle($id);
        $dataDelet->is_delete = 1;
        $dataDelet->save();
        return redirect()->route('student-list')->with('success', 'Data Deleted Successfully');
    }

    public function done()
    {



        // Define the words array
        $words = array("pear", "apple", "orange", "banana", "lllllea", );

        // Define the characters set
        $charSet = array("E", "A", "R");

        // Iterate through each word
        foreach ($words as $word) {
            // Convert word to uppercase for case-sensitive comparison
            $upperWord = strtoupper($word);

            // Initialize count for characters in the character set
            $count = 0;

            // Iterate through each character in the set
            foreach ($charSet as $char) {
                // Check if the character exists in the word
                if (strpos($upperWord, $char) !== false) {
                    // Increment count if the character is found
                    $count++;
                }
            }

            // If the count is greater than 0, print the word along with the count
            if ($count > 0) {
                echo "$word (Count: $count)\n";
            }
        }
    }
}

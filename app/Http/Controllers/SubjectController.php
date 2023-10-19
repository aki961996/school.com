<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['header_title'] = "Subject List";
        $data['getRecord'] = Subject::getRecord();

        //  dd($data);

        return view('admin.subject.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add Subject";

        return view('admin.subject.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        // dd($request->all());
        $subjects = new Subject();
        $subjects->name = $request->name;
        $subjects->type = $request->type;
        $subjects->status = $request->status;
        $subjects->created_by = Auth::user()->id;
        $subjects->save();

        return redirect()->route('subject-list')->with('success', 'New Subject successfully addedd');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $subjects = Subject::getSingle($id);
        if (!empty($subjects)) {
            $data['header_title'] = "Edit Subject";

            return view('admin.subject.edit', $data, ['subjects' => $subjects]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $id = $request->id;
        $subjects = Subject::getSingleDataNeedUpdate($id);
        $subjects->name = $request->name;
        $subjects->status = $request->status;
        $subjects->update();

        return redirect()->route('subject-list')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $subjects = Subject::getSingle($id);
        $subjects->is_delete = 1;
        $data =  $subjects->save();
        // return redirect()->route('subject-list')->with('success', 'Data Deleted Successfully');

        return response()->json(
            [
                'message' => 'Item deleted successfully',
                'data' => $data

            ]

        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['header_title'] = "Upload Image";
        // $data['image'] = Upload::all();

        //return redirect()->route('admin-dashboard', $data);
        return view('admin.upload.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function uploadFile(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // /dd($request->all());
        $input = [
            'team_member' => request('team_member'),


        ];

        if ($request->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'todo_pic_' . time() . '.' . $extension;
            //return $fileName;
            request('image')->storeAs('images', $fileName);
            // $path = $image->store('images', 'public');
            $input['image'] = $fileName;
        }

        $todo = Upload::create($input);
        //  dd($todo['todo']);

        //return view('admin.dashboard', $todo);

        //return $todo;
        return redirect()->route('list')->with('success', 'Image Added successfully',);
    }

    /**
     * Display the specified resource.
     */
    public function show(Upload $upload)
    {
        // $data['image'] = Upload::all();

        // return view('admin-dashboard', $data);

        // return redirect()->route('admin-dashboard', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upload $upload)
    {
        //
    }
}

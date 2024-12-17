<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class TodoController extends Controller
{


    public function todo_post(Request $request)
    {
        // Validate the request
        $request->validate([
            'todo_name' => 'required|max:255',
        ]);
        // Create a new Todo record and save it to the database
        $todo = new Todo;
        $todo->todo_name = $request->todo_name;
        $todo->save();

        return redirect()->back()->with('success', 'Todo added successfully');
    }

    public function sorry()
    {
        $love = 'Sorry';
        // Loop 1000 times
        for ($i = 0; $i < 1000; $i++) {
            echo $love . " " . "<br>"; 
        }
    }
}

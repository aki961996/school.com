<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1) {

            // Admin
            $adminCount = User::where('user_type', 1)->count();
            $teacherCount = User::where('user_type', 2)->count();

            // Count users with is_delete == 1
            $deletedCount = User::where('is_delete', 1)->count();
            // Count students
            $studentCount = User::where('user_type', 3)->count();
            // Adjust the student count by subtracting the deleted count
            if ($studentCount && $deletedCount) {
                $studentCount -= $deletedCount;
            }

            $parentCount = User::where('user_type', 4)->count();
            $allUserCount = User::count();

            $todos = Todo::where('active', 1)->get();
            // Pass counts to the view
            return view('admin.dashboard', $data, [
                'allUserCount' => $allUserCount,
                'adminCount' => $adminCount,
                'teacherCount' => $teacherCount,
                'studentCount' => $studentCount,
                'parentCount' => $parentCount,
                'todos' => $todos
            ]);

            // return view('admin.dashboard', $data, ['allUserCount' => $allUserCount]);
        } elseif (Auth::user()->user_type == 2) {
            $todos = Todo::where('active', 1)->get();
            return view('teacher.dashboard', $data, ['todos' => $todos]);
        } elseif (Auth::user()->user_type == 3) {
            $todos = Todo::where('active', 1)->get();
            return view('student.dashboard', $data, ['todos' => $todos]);
        } elseif (Auth::user()->user_type == 4) {
            $todos = Todo::where('active', 1)->get();
            return view('parent.dashboard', $data, ['todos' => $todos]);
        }
    }
    public function getCounts()
    {
        $adminCount = User::where('role', 1)->count();
        $teacherCount = User::where('role', 2)->count();
        $studentCount = User::where('role', 3)->count();
        $parentCount = User::where('role', 4)->count();

        // return view('user_counts', compact('adminCount', 'teacherCount', 'studentCount', 'parentCount'));
    }
}

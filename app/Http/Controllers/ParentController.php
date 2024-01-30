<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()
    {
        $data['header_title'] = "Parents List";
        $data['getRecord'] = User::getParent();
        return view('admin.parents.list', $data);
    }
    public function add()
    {

        $data['header_title'] = "Parents Add";
        return view('admin.parents.add', $data);
    }
}

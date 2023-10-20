<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = "class_subject_models";

    protected $fillable = [

        'class_id',
        'subject_id',
        'created_by',
        'is_delete',
        'status'


    ];

    //all data
    static public function getRecord()
    {
        $return = Subject::select('subjects.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subjects.created_by');
        // Use 0 instead of '= 0' for better readability


        $name = request()->get('name');
        $type = request()->get('type');
        $date = request()->get('date');
        if (!empty($name)) {

            $return = $return->where('subjects.name', 'like', '%' . $name . '%');
            // dd($return);
        } elseif (!empty($type)) {
            $return = $return->where('subjects.type', "=", $type);
        } elseif (!empty($date)) {

            $return = $return->whereDate('subjects.created_at', "=", $date);
        }

        $return =  $return->orderBy('subjects.id', 'desc')
            ->where('subjects.is_delete', 0)
            ->paginate(5);

        return $return;
    }

    // static public function getClass()
    // {
    //     $return = Subject::select('subjects.*', 'users.name as created_by_name')
    //         ->join('users', 'users.id', 'subjects.created_by');


    //     $return =  $return->orderBy('subjects.id', 'desc')
    //         ->where('subjects.is_delete', 0)
    //         ->paginate(5);

    //     return $return;
    // }
}

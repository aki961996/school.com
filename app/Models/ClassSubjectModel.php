<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

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

    // static public function getAssignSubjectDataWithId($id = '')
    // {

    //     $return = ClassSubjectModel::select('class_subject_models.*', 'users.name as created_by_name', 'class_models.name as class_model_name', 'subjects.name as class_model_subject_name')

    //         ->join('users', 'users.id', 'class_subject_models.created_by')
    //         ->join('class_models', 'class_models.id', 'class_subject_models.class_id')
    //         ->join('subjects', 'subjects.id', 'class_subject_models.subject_id');

    //     if (!empty($id)) {
    //         $return = $return->where('class_subject_models.id', "=", $id);
    //     }

    //     return   $return;
    // }




    //all data
    static public function getRecord()
    {


        $return = ClassSubjectModel::select('class_subject_models.*', 'users.name as created_by_name', 'class_models.name as class_model_name', 'subjects.name as class_model_subject_name')

            ->join('users', 'users.id', 'class_subject_models.created_by')
            ->join('class_models', 'class_models.id', 'class_subject_models.class_id')
            ->join('subjects', 'subjects.id', 'class_subject_models.subject_id');



        $class_name = request()->get('class_name');
        //dd($class_name);
        $sub_name = request()->get('sub_name');
        $date = request()->get('date');
        if (!empty($class_name)) {

            $return = $return->where('class_models.name', "=", $class_name);
            
        } elseif (!empty($sub_name)) {
            $return = $return->where('subjects.name', "=", $sub_name);
        } elseif (!empty($date)) {

            $return = $return->whereDate('class_subject_models.created_at', "=", $date);
        }

        // if (!empty($id)) {
        //     $return = $return->where('class_subject_models.id', "=", $id);
        // }



        $return =  $return->orderBy('class_subject_models.id', 'asc')
            ->where('class_subject_models.is_delete', 0)
            ->paginate(20);

        return $return;
    }

    static public function getAlreadtFirts($class_id, $subject_id)
    {
        return self::where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->first();
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) return 'Active';
        else return 'Inactive';
    }

    public function getCreatedAtFormatedAttribute()
    {
        return date('d-m-Y H:i:s', strtotime($this->created_at));
    }


    protected $appends = ['status_text', 'created_at_formated'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'created_by',

    ];


    //dummy
    static public function dummy()
    {
        // $titles = DB::table('class_models')->pluck('name', 'id');

        // foreach ($titles as $name => $title) {
        //     echo $title;
        // }
        //count
        // $users = DB::table('class_models')->count();
        // return $users;

        //chechkig id undel do

        // if (DB::table('class_models')->where('id', 7)->exists()) {
        //     $users = DB::table('class_models')->count();
        //     return $users;
        // }
        //select
        // $users = DB::table('class_models')
        //     ->select('name', 'id as st')
        //     ->get();
        // return $users;
        // $users = DB::table('class_models')->distinct()->get();
        // return $users;


        //imp name id kitum otta query
        // $query = DB::table('class_models')->select('name');

        // $users = $query->addSelect('id')->get();
        // return $users;

        // $users = DB::table('class_models')
        //     ->select(DB::raw('count(*) as user_count, status'))
        //     ->where('status', '<>', 1)
        //     ->groupBy('status')
        //     ->get();
        // return $users;

        // $orders = DB::table('class_models')
        //     ->select('name', 'id')
        //     ->groupByRaw('name, id')
        //     ->get();
        // return $orders;

        //joins
        // $users = DB::table('class_models')
        //     ->join('users', 'users.id', '=', 'class_models.id')
        //     ->get();
        // return $users;
    }

    //get single daia via id   edit delete same func
    static public function getSingleData($id)
    {
        $id = decrypt($id);
        return ClassModel::find($id);
    }

    //update
    static public function getSingle($id)
    {
        return ClassModel::find($id);
    }

    //get all date
    static public function getAllAdminData()
    {
        $return = ClassModel::select('*')
            ->whereIn('status', [0, 1]);

        // ->orWhereIn('value', ['red', 'white'])

        $name = request()->get('name');
        $created_by = request()->get('created_by');
        $status = request()->get('status');
        $date = request()->get('date');
        // dd($name);
        if (!empty($name)) {
            $return = $return->where('name', 'like', '%' . $name . '%');
        }
        if (!empty($created_by)) {
            $return = $return->where('created_by', 'like', '%' . $created_by . '%');
        }
        if (!empty($status)) {
            $return = $return->where('status', 'like', '%' . $status . '%');
        }
        if (!empty($date)) {
            $return = $return->where('created_at', 'like', '%' . $name . '%');
        }

        $return = $return->orderBy('id', 'Asc')
            ->paginate(3);

        return $return;
    }
    public function getStatusTextAttribute()
    {
        if ($this->status == 0) return 'Active';
        else return 'Inactive';
    }


    public function getCreatedByTextAttribute()
    {
        if ($this->created_by == 1) return 'Admin';
        if ($this->created_by == 2) return 'Teacher';
        if ($this->created_by == 3) return 'Student';
        if ($this->created_by == 4) return 'Parent';

        else return 'Other Admins';
    }

    public function getCreatedAtFormatedAttribute()
    {
        return date('d-m-Y H:i:s', strtotime($this->created_at));
    }

    protected $appends = ['status_text', 'created_by_text', "created_at_formated"];
}

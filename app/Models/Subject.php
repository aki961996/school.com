<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'type',
        'created_by',
        'status',
        "is_delete",
        "created_at"
    ];

    static public function getRecord()
    {
        $return = Subject::select('subjects.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subjects.created_by')
            ->where('subjects.is_delete', 0); // Use 0 instead of '= 0' for better readability


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
            ->paginate(5);


        return $return;
    }

    //get sinlge edit side data
    static public function getSingle($id)
    {

        $id = decrypt($id);
        return Subject::find($id);
    }

    //This is status scope set
    public function getStatusTextAttribute()
    {
        if ($this->status == 0) return 'Active';
        else return 'Inactive';
    }

    //update
    static public function getSingleDataNeedUpdate($id)
    {
        return Subject::find($id);
    }

    //CREATED AT SETTING
    public function getCreatedAtFormatedAttribute()
    {
        return date('d-m-Y H:i:s', strtotime($this->created_at));
    }

    protected $appends = ['status_text', 'created_at_formated'];
}

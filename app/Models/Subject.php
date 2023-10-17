<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'type',
        'created_by',
        'status',
        "is_delete"
    ];

    static public function getRecord()
    {
        $return = Subject::select('subjects.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subjects.created_by')
            ->where('subjects.is_delete', 0)  // Use 0 instead of '= 0' for better readability
            ->orderBy('subjects.id', 'desc')  // Corrected typo in the function name
            ->paginate(10);

        return $return;
    }
}

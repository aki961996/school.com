<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'created_by',

    ];

    static public function getAllAdminData()
    {
        $return = ClassModel::select('*')
            // ->where('status', "=", 0)
            ->orderBy('id', 'Asc')
            ->get();

        return $return;
    }
    public function getStatusTextAttribute()
    {
        if ($this->status == 0) return 'Active';
        else return 'Inactive';
    }

    public function getCreatedByTextAttribute()
    {
        if ($this->status == 1) return 'Admin';
        else return 'Inactive';
    }
    protected $appends = ['status_text', 'created_by_text'];
}

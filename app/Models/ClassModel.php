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

        
    }
}

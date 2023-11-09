<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_delete',
        "created_at",
        "last_name",
        'status',
        'admission_number',

        'roll_number',

        'class_id',

        'gender',
        'date_of_birth',

        'caste',
        'religion',
        'mobile_number',
        'admission_date',
        'profile_pic',

        'blood_group',

        'height',
        'weight',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    static public function getSingleDataWithId($id)
    {
        return self::find($id);
    }



    static public function getEmailSingle($email)
    {
        return  User::where('email', '=', $email)->first();
    }

    //resetsingle
    static public function getResetSingle($token)
    {
        return User::where('remember_token', '=', $token)->first();
    }


    //get single data with id 
    static public function getSingle($id)
    {

        // $user = DB::table('users')->where('id', '$id')->first();

        // return $user;

        $id = decrypt($id);
        return User::find($id);
    }

    //update
    static public function getSingleDate($id)
    {
        return User::find($id);
    }

    //get single data with id
    static public function getSinglePass($id)
    {

        return User::find($id);
    }

    //all data
    static public function getAdmin()
    {
        $return = User::select('*', 'users.name as created_by_name')
            ->where('user_type', '=', 1)
            ->where('is_delete', "=", 0);

        $email = request()->get('email');
        $name = request()->get('name');
        $date = request()->get('date');
        if (!empty($email)) {
            // Code to handle when email is not empty
            $return = $return->where('email', 'like', '%' . $email . '%');
        } elseif (!empty($name)) {
            $return = $return->where('name', 'like', '%' . $name . '%');
        } elseif (!empty($date)) {
            $return = $return->whereDate('created_at', "=", $date);
        }

        $return = $return->orderBy('id', 'desc')
            ->paginate(5);

        return $return;
    }


    //get student
    static public function getStudent()
    {

        $return = User::select('*', 'users.name as created_by_name')
            ->where('user_type', '=', 3)
            ->where('is_delete', "=", 0);



        $return = $return->orderBy('id', 'desc')
            ->paginate(5);

        return $return;
    }

    //accser
    // public function getCreatedAtAttribute($value)  //camel case ezhuthicha date of birth denote cheyum
    // {
    //     return date('d-m-Y', strtotime($value));
    // }

    // //accser
    // public function setCreatedAtAttribute($value)
    // {
    //     // $this->attributes['created_at'] = date('d-m-Y', strtotime($value))->format('Y-m-d H:i:s');
    //     $this->attributes['created_at'] = date('d-m-Y H:i:s', strtotime($value));


    //     // $this->attributes['created_at'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d H:i:s');
    // }

    // accesser for changing created at to 2023-08-11 11:10:47 this 11-08-2023 
    public function getCreatedAtFormatedAttribute()
    {
        return date('d-m-Y H:i:s', strtotime($this->created_at));
    }

    //status

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) return 'Active';
        else return 'Inactive';
    }
    protected $appends = ['created_at_formated', 'status_text'];
}

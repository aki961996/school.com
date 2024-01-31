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
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use LDAP\Result;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $table = "users";

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
        "occupation",
        "address"
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


    public static function getAnilNmaData()
    {

        $return = User::select('*')
            ->where('name', 'Student')->get();
        return $return;
    }

    //learn some query



    static public function getSingleDataWithId($id)
    {
        return self::find($id);
    }


    static public function getSingleWithId($id)
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


    //get student all data
    static public function getStudent()
    {
        $return = User::select('users.*', 'class_models.name as class_models_name')
            ->join('class_models', 'class_models.id', 'users.class_id')
            ->where('users.user_type', 3)
            ->where('users.is_delete', 0);

        //filtering 
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name'));
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name'));
        }
        if (!empty(Request::get('admission_number'))) {
            //dd(Request::get('admission_number'));
            $return = $return->where('users.admission_number', 'like',  '%' . Request::get('admission_number'));
        }

        if (!empty(Request::get('roll_number'))) {
            $return = $return->where('users.roll_number', 'like', '%' . Request::get('roll_number'));
        }

        if (!empty(Request::get('class'))) {
            $return = $return->where('class_models.name', 'like', '%' . Request::get('class'));
        }

        if (!empty(Request::get('gender'))) {
            $return = $return->where('users.gender', 'like', '%' . Request::get('gender'));
        }

        if (!empty(Request::get('caste'))) {
            $return = $return->where('users.caste', 'like', '%' . Request::get('caste'));
        }

        if (!empty(Request::get('religion'))) {
            $return = $return->where('users.religion', 'like', '%' . Request::get('religion'));
        }

        if (!empty(Request::get('mobile_number'))) {
            $return = $return->where('users.mobile_number', 'like', '%' . Request::get('mobile_number'));
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email'));
        }

        if (!empty(Request::get('admission_date'))) {

            $return = $return->where('users.admission_date', 'like', '%' . Request::get('admission_date'));
        }

        if (!empty(Request::get('blood_group'))) {
            $return = $return->where('users.blood_group', 'like', '%' . Request::get('blood_group'));
        }

        if (!empty(Request::get('status'))) {

            $status = (Request::get('status') == 100) ? 0 : 1;
            $return = $return->whereDate('users.status', "=", $status);
        }

        if (!empty(Request::get('date'))) {

            $return = $return->whereDate('users.created_at', "=", Request::get('date'));
        }
        //filtering end

        $return = $return->orderBy('users.id', 'desc')
            ->paginate(10);


        return $return;
    }

    //parents all data
    public static function getParent()
    {
        $return = User::select('*', 'users.name as created_by_name')
            ->where('user_type', '=', 4)
            ->where('is_delete', "=", 0);

        //filtering will come here




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
        //return date('d-m-Y H:i:s', strtotime($this->created_at));
    }

    //dob
    public function getDateOfBirthFormatedAttribute()
    {

        return date('d-m-Y', strtotime($this->date_of_birth));
    }
    //admission date admission_date
    public function getAdmissionDateFormatedAttribute()
    {

        return date('d-m-Y', strtotime($this->date_of_birth));
    }

    //status
    public function getStatusTextAttribute()
    {
        if ($this->status == 0) return 'Active';
        else return 'Inactive';
    }
    protected $appends = ['created_at_formated', 'status_text', 'date_of_birth_formated', 'admission_date_formated'];



    //id with data edit side
    static  public function getSingleData($id)
    {

        $id = decrypt($id);
        return self::find($id);
    }
}

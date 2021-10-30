<?php

namespace App;

use App\Model\Role;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id','role_id','sacco_id','member_number','user_name','first_name','last_name','phone_no','id_no','email','password','otp','status','created_by','updated_by'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->hasOne(Role::class,'role_id','role_id');
    }


}

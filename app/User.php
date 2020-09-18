<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; 
// use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    // protected $fillable = [
    //     'name', 'email', 'password', 'user_name', 'image', 'card'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country(){
        return $this->belongsTo('App\Country');

    }

    public function state(){
        return $this->belongsTo('App\State');

    }
    public function hasRole($role){
        // dd($this->role);
        if($this->role == $role){
            return True;
        }
        return False;
    }
    public function hasAnyRoles($roles){
        dd($this->role);
        if($this->role->whereIn($roles)){
            return True;
        }
        return False;
    }
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
    * Attributes
    */
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'phone', 'dni',
    ];

    public $timestamps = false;

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

    public function giver()
    {
        return $this->hasOne('App\Giver', 'user_id')->get()->first();
    }

    public function organization()
    {
        return $this->hasOne('App\Organization', 'user_id')->get()->first();
    }

    public function roles()
    {
        return $this->hasMany('App\Role', 'role_user', 'user_id')->get();
    }

}

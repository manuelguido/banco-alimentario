<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use App\Role;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
    * Attributes
    */
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'email', 'is_active',
    ];

    public $timestamps = true;

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


    /**
     * Returns the user information
     */
    public function user_data()
    {
        return $this->hasOne('App\UserData', 'user_id');
    }

    /**
     * Returns the user roles
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    /**
     * Returns the user permissions
     */
    public function permissions()
    {
        return $this->hasManyThrough('App\Permission', 'App\Role');
    }

    /**
     * Returns the user giver
     */
    public function giver()
    {
        return $this->hasOne('App\Giver', 'user_id')
            ->join('insitutions', 'insitutions.user_id', '=', 'givers.user_id');
    }

    /**
     * Returns the user organization
     */
    public function organization()
    {
        return $this->hasOne('App\Organization', 'user_id')
            ->join('insitutions', 'insitutions.user_id', '=', 'organizations.user_id');
    }


    /**
     * Returns the unsubscribe requests made by the user
     */
    public function unsubscribe_requests()
    {
        return $this->hasMany('App\UnsubscribeRequest', 'user_id', 'user_id');
    }

    /**
     * Returns the unsubscribe requests confirmed by the user
     */
    public function unsubscribe_requests_confirmed()
    {
        return $this->hasMany('App\UnsubscribeRequest', 'confirmer_id', 'user_id');
    }

    /**
     * Returns the unsubscribe requests confirmed by the user
     */
    public function set_role($role)
    {
        // Gets role id
        $role_id = Role::where('role', $role)->get()->first()->role_id;
        // Saves the role
        DB::table('role_user')->insert([
            'user_id' => $this->user_id,
            'role_id' => $role_id,
        ]);
    }
}

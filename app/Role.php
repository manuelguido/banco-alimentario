<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
    * Attributes
    */
    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User', 'role_user', 'role_id')->get();
    }

    public function premissions()
    {
        return $this->hasMany('App\Permission', 'permission_role', 'role_id')->get();
    }

}

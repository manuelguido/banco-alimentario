<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
    * Attributes
    */
    protected $table = 'permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function roles()
    {
        return $this->hasMany('App\Role', 'permission_role', 'permission_id')->get();
    }

}

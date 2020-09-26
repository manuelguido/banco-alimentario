<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 'Administrador'; //Cargando items
    const ROLE_EMPLOYEE = 'Empleado'; //Sin agregar hora de retiro
    const ROLE_GIVER = 'Donante'; //Rechadaza por el banco
    const ROLE_ORGANIZATION = 'Organizacion'; //Ya enviada para su aprobación
    
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

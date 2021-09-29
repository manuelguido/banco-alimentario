<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    /**
    * Attributes
    */
    protected $table = 'institutions';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'institution', 'cuit', 'phone',
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

    /**
     * Crear nueva institución.
     */
    public static function createNew($user_id, $data)
    {
        $institution = new Institution;
        $institution->user_id = $user_id;
        $institution->institution = $data['institution'];
        $institution->cuit = $data['cuit'];
        $institution->phone = $data['phone'];
        $institution->save();
        return $institution;
    }

    /**
     * Obtener el donante de la institución
     */
    public function giver()
    {
        return $this->hasOne('App\Giver', 'user_id', 'user_id');
    }

    /**
     * Obtener la organización de la institución
     */
    public function organization()
    {
        return $this->hasOne('App\Organization', 'user_id', 'user_id');
    }

    /**
     * Obtener las direcciones de la institución
     */
    public function addresses()
    {
        return $this->hasMany('App\Address', 'user_id', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    
    /**
    * Attributes
    */
    protected $table = 'neighborhoods';

    protected $primaryKey = 'neighborhood_id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    /**
     * Crear nuevo barrio
     */
    public static function createNew($data)
    {
        $neighborhood = new Neighborhood;
        $neighborhood->neighborhood = $data->$neighborhood;
        $neighborhood->save();
        return $neighborhood;
    }

    /**
     * Crear barrio por su nombre
     */
    public static function createNewByName($name)
    {
        $neighborhood = new Neighborhood;
        $neighborhood->neighborhood = $name;
        $neighborhood->save();
        return $neighborhood;
    }

    /**
     * Obtener las direcciones en un determinado barrio
     */
    public function addresses()
    {
        return $this->hasMany('App\Institution', 'neighborhood_id', 'neighborhood_id');
    }

}

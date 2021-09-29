<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    /**
    * Attributes
    */
    protected $table = 'units_of_measurement';

    protected $primaryKey = 'unit_of_measurement_id';

    protected $fillable = [
        'unit_of_measurement',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product', 'unit_of_measurement_id', 'unit_of_measurement_id');
    }

    /**
     * Crear una nueva unidad de medida.
     * @return App\UnitOfMeasurement.
     */
    public static function createNew($new_uom)
    {
        $uom = new UnitOfMeasurement;
        $uom->unit_of_measurement = $new_uom;
        $uom->save();
        return $uom;
    }
}

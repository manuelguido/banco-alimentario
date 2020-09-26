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

}

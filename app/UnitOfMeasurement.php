<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    /**
    * Attributes
    */
    protected $table = 'units_of_measurement';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product', 'unit_of_measurement_id')->get();
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'unit_of_measurement_id')->get();
    }

}

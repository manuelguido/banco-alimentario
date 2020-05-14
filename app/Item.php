<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
    * Attributes
    */
    protected $table = 'items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'donation_id', 'name', 'category_id', 'type_id', 'exp_date', 'amount', 'unit_of_measurement_id',
    ];

    public $timestamps = false;

    public function donation()
    {
        return $this->belongsTo('App\Donation');
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'category_id');
    }

    public function type()
    {
        return $this->hasOne('App\Type', 'type_id');
    }

    public function unit_of_measurement()
    {
        return $this->hasOne('App\UnitOfMeasurement', 'unit_of_measurement_id');
    }
    
}

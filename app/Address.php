<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
    * Attributes
    */
    protected $table = 'addresses';

    protected $primaryKey = 'address_id';

    protected $fillable = [
        'street', 'number', 'floor', 'apt', 'neighborhood_id', 'user_id',
    ];

    public $timestamps = false;

    public function giver()
    {
        return $this->belongsTo('App\Institution', 'user_id');
    }
    
    public function neighborhood()
    {
        return $this->belongsTo('App\Neighborhood', 'neighborhood_id');
    }

}

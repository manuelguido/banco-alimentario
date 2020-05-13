<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
    * Attributes
    */
    protected $table = 'giver_addresses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'street', 'number', 'floor', 'apt', 'neighborhood_id', 'giver_id',
    ];

    public $timestamps = false;

    public function giver()
    {
        return $this->belongsTo('App\Giver', 'giver_id')->get()->first();
    }
    
    public function neighborhood()
    {
        return $this->belongsTo('App\Neighborhood', 'neighborhood_id')->get()->first();
    }

}

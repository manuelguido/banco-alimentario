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

    public function addresses()
    {
        return $this->hasMany('App\Institution', 'neighborhood_id', 'neighborhood_id');
    }

}

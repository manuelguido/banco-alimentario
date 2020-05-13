<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    
    /**
    * Attributes
    */
    protected $table = 'neighborhoods';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function giverAddresses()
    {
        return $this->hasMany('App\GiverAddress', 'neighborhood_id')->get();
    }

    public function organizationAddresses()
    {
        return $this->hasMany('App\OrganizationAddress', 'neighborhood_id')->get();
    }

}

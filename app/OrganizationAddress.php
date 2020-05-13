<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationAddress extends Model
{
    /**
    * Attributes
    */
    protected $table = 'organization_addresses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'street', 'number', 'floor', 'apt', 'neighborhood_id', 'organization_id',
    ];

    public $timestamps = false;

    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id')->get()->first();
    }
    
    public function neighborhood()
    {
        return $this->belongsTo('App\Neighborhood', 'neighborhood_id')->get()->first();
    }

}

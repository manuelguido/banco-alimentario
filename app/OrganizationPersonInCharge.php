<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiverPersonInCharge extends Model
{
    /**
    * Attributes
    */
    protected $table = 'organization_people_in_charge';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'dni', 'email', 'phone', 'organization_id',
    ];

    public $timestamps = false;

    public function organization()
    {
        return $this->hasOne('App\Organization')->get()->first();
    }

}

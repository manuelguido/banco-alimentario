<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiverPersonInCharge extends Model
{
    /**
    * Attributes
    */
    protected $table = 'giver_people_in_charge';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'dni', 'email', 'phone', 'giver_id',
    ];

    public $timestamps = false;

    public function giver()
    {
        return $this->hasOne('App\Giver')->get()->first();
    }

}

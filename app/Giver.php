<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Giver extends Model
{
    /**
    * Attributes
    */
    protected $table = 'givers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'name', 'cuit', 'phone', 'is_active',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->get();
    }

    public function peopleInCharge()
    {
        return $this->hasMany('App\PersonInCharge', 'giver_person_in_charge', 'giver_id', 'people_in_charge_id')->get();
    }

    public function addresses()
    {
        return $this->hasMany('App\Address', 'address_giver', 'giver_id')->get();
    }

    public function donations()
    {
        return $this->hasMany('App\Donation', 'giver_id')->get();
    }

}

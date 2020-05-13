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
        return $this->belongsTo('App\User')->get();
    }

    public function peopleInCharge()
    {
        return $this->hasMany('App\GiverPersonInCharge', 'giver_id')->get();
    }

    public function addresses()
    {
        return $this->hasMany('App\GiverAddress', 'giver_id')->get();
    }

    public function donations()
    {
        return $this->hasMany('App\Donation', 'giver_id')->get();
    }

}

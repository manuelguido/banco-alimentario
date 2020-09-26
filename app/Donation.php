<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /**
    * Attributes
    */
    protected $table = 'donations';

    protected $primaryKey = 'donation_id';

    protected $fillable = [
        'user_id', 'user_responsable_id', 'donation_state_id', 'code',
    ];

    public $timestamps = false;

    public function giver() {
        return $this->belongsTo('App\Giver', 'user_id', 'user_id');
    }

    public function items() {
        return $this->hasMany('App\Item', 'donation_id', 'donation_id');
    }

    public function note() {
        return $this->hasOne('App\DonationNote', 'donation_id', 'donation_id');
    }

    public function rejection() {
        return $this->hasOne('App\DonationRejection', 'donation_id', 'donation_id');
    }

    public function state() {
        return $this->hasOne('App\DonationState', 'donation_id', 'donation_id');
    }

    public function retirement() {
        return $this->hasOne('App\DonationRetirement', 'donation_id', 'donation_id');
    }

    public function retirement_dates() {
        return $this->hasMany('App\DonationDates', 'donation_id', 'donation_id');
    }

    public function responsable() {
        return $this->hasMany('App\DonationDates', 'donation_id', 'donation_id');
    }

    // public function nearestExpiration() {
    //     return Product::where('donation_id', $this->donation_id)->orderBy('exp_date', 'desc')->first();
    // }

}

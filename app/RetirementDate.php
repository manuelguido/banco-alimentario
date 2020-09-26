<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetirementDate extends Model
{
    /**
    * Attributes
    */
    protected $table = 'retirement_dates';

    protected $primaryKey = 'retirement_date_id';

    protected $fillable = [
        'donation_id', 'day_from', 'day_to', 'hour_from', 'hour_to',
    ];

    public $timestamps = false;

    public function donation() {
        return $this->belongsTo('App\Donation', 'donation_id', 'donation_id');
    }

}

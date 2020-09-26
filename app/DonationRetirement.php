<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationRetirement extends Model
{
    /**
    * Attributes
    */
    protected $table = 'donation_retirements';

    protected $primaryKey = 'donation_id';

    protected $fillable = [
        'retired_at',
    ];

    public $timestamps = false;

    public function donation() {
        return $this->belongsTo('App\Donation', 'donation_id', 'donation_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationState extends Model
{
    /**
    * Attributes
    */
    protected $table = 'donation_states';

    protected $primaryKey = 'donation_id';

    protected $fillable = [
        'state',
    ];

    public $timestamps = false;

    public function donation() {
        return $this->belongsTo('App\Donation', 'donation_id', 'donation_id');
    }

}

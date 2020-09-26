<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rejection extends Model
{
    /**
    * Attributes
    */
    protected $table = 'donation_rejections';

    protected $primaryKey = 'donation_id';

    protected $fillable = [
        'reason', 'rejecter_id',
    ];

    public $timestamps = false;

    public function donation() {
        return $this->belongsTo('App\Donation', 'donation_id', 'donation_id');
    }

    public function rejecter() {
        return $this->belongsTo('App\Donation', 'user_id', 'rejecter_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rejection extends Model
{
    /**
    * Attributes
    */
    protected $table = 'donation_rejections';

    protected $primaryKey = 'id';

    protected $fillable = [
        'reason',
    ];

    public $timestamps = false;

    public function donation() {
        return $this->belongsTo('App\Donation', 'donation_id');
    }

}

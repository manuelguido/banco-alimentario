<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpirationDate extends Model
{
    /**
    * Attributes
    */
    protected $table = 'expiration_dates';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'date',
    ];

    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo('App\Item', 'product_id', 'product_id');
    }
}

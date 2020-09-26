<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrequentProduct extends Model
{
    /**
    * Attributes
    */
    protected $table = 'frequent_products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'user_id',
    ];

    public $timestamps = false;

    /**
     * Returns the user
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }

    /**
     * Returns the donations
     */
    public function giver()
    {
        return $this->belongsTo('App\Giver', 'user_id', 'user_id');
    }
}

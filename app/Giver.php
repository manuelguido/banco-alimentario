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

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
    ];

    public $timestamps = false;

    /**
     * Returns the user
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    /**
     * Returns the donations
     */
    public function donations()
    {
        return $this->hasMany('App\Donation', 'user_id', 'user_id');
    }

    /**
     * Returns the frequent products
     */
    public function frequent_products()
    {
        return $this->hasOne('App\FrequentProducts', 'user_id', 'user_id');
    }
}

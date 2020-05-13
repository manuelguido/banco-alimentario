<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
    * Attributes
    */
    protected $table = 'types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product', 'type_id')->get();
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'type_id')->get();
    }
    
}

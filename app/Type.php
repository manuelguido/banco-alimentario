<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
    * Attributes
    */
    protected $table = 'types';

    protected $primaryKey = 'type_id';

    protected $fillable = [
        'type',
    ];

    public $timestamps = false;


    public function category()
    {
        return $this->hasMany('App\Category', 'type_id', 'type_id');
    }
    
}

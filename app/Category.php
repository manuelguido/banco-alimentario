<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
    * Attributes
    */
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id')->get();
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'category_id')->get();
    }

}

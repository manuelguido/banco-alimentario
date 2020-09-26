<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
    * Attributes
    */
    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category', 'type_id',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id', 'category_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type', 'type_id', 'type_id');
    }

}

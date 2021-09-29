<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    /**
    * Attributes
    */
    protected $table = 'category_types';

    protected $primaryKey = 'category_type_id';

    protected $fillable = [
        'category_type',
    ];

    public $timestamps = false;


    public function category()
    {
        return $this->hasMany('App\Category', 'type_id', 'type_id');
    }
 
    /**
     * Crear un nuevo tipo de categoría.
     * @return App\CategoryType.
     */
    public static function createNew($type)
    {
        $category_type = new CategoryType;
        $category_type->category_type = $type;
        $category_type->save();
        return $category_type;
    }
}

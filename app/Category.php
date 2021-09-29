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
        'category', 'category_type_id',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id', 'category_id');
    }

    /**
     * Tipo de producto.
     * @return App\ProductType.
     */
    public function productType()
    {
        return $this->belongsTo('App\ProductType', 'type_id', 'type_id');
    }

    /**
     * Crear una nueva categoría.
     * @return App\Category.
     */
    public static function createNew($data)
    {
        $category = new Category;
        $category->category = $data['category'];
        $category->category_type_id = $data['category_type_id'];
        $category->save();
        return $category;
    }
}

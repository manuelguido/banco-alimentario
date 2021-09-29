<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
    * Attributes
    */
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product', 'category_id', 'unit_of_measurement_id', 'is_refrigerable',
    ];

    public $timestamps = false;

    /**
     * Returns the frequent product
     */
    public function frequent_product()
    {
        return $this->belongsTo('App\FrequentProduct', 'product_id', 'product_id');
    }

    /**
     * Item
     */
    public function item()
    {
        return $this->belongsTo('App\Item', 'product_id', 'product_id');
    }

    /**
     * Returns the frequent product
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }
    
    /**
     * Returns the unit of measurement
     */
    public function unit_of_measurement()
    {
        return $this->belongsTo('App\UnitOfMeasurement', 'unit_of_measurement_id', 'unit_of_measurement_id');
    }

    /**
     * Crear un producto nuevo.
     * @return App\Product.
     */
    public static function createProduct($data)
    {
        $product = new Product;
        $product->product = $data['product'];
        $product->category_id = $data['category_id'];
        $product->unit_of_measurement_id = $data['unit_of_measurement_id'];
        $product->is_refrigerable = $data['is_refrigerable'];
        $product->save();
        return $product;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
    * Attributes
    */
    protected $table = 'items';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'donation_id', 'amount',
    ];

    public $timestamps = false;

    public function donation()
    {
        return $this->belongsTo('App\Donation', 'donation_id', 'donation_id');
    }

    public function product()
    {
        return $this->hasOne('App\Product', 'product_id', 'product_id');
    }

    public function expiration_date()
    {
        return $this->hasOne('App\ExpirationDate', 'product_id', 'product_id');
    }
    
    /**
     * Crear un item nuevo en una donación.
     * @return App\Item.
     */
    public static function createItem($data, $product_id, $donation_id)
    {
        $item = new Item;
        $item->product_id = $product_id;
        $item->donation_id = $donation_id;
        $item->amount = $data['amount'];
        $item->save();
        return $item;
    }
}

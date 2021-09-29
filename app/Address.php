<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
    * Attributes
    */
    protected $table = 'addresses';

    protected $primaryKey = 'address_id';

    protected $fillable = [
        'street', 'number', 'floor', 'apt', 'neighborhood_id', 'user_id',
    ];

    public $timestamps = false;

    /**
     * Crear nueva dirección.
     */
    public static function createNew($user_id, $data)
    {
        $address = new Address;
        $address->user_id = $user_id;
        $address->street = $data['street'];
        $address->number = $data['number'];
        $address->apt = $data['apt'];
        $address->floor = $data['floor'];
        $address->neighborhood_id = $data['neighborhood_id'];
        $address->save();
        return $address;
    }

    public function giver()
    {
        return $this->belongsTo('App\Institution', 'user_id');
    }
    
    public function neighborhood()
    {
        return $this->belongsTo('App\Neighborhood', 'neighborhood_id');
    }

}

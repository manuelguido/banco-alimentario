<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    /**
    * Attributes
    */
    protected $table = 'user_data';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name', 'lastname', 'phone', 'document_type_id', 'document_number',
    ];

    public $timestamps = false;

    /**
     * Returns the dcoument type
     */
    public function document_type()
    {
        return $this->hasOne('App\DocumentTypes', 'document_type_id');
    }

}

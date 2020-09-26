<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    /**
    * Attributes
    */
    protected $table = 'responsables';

    protected $primaryKey = 'responsable_id';

    protected $fillable = [
        'name', 'lastname', 'phone', 'document_type_id', 'document_number', 'user_id',
    ];

    public $timestamps = false;

    /**
     * Returns the dcoument type
     */
    public function document_type()
    {
        return $this->hasOne('App\DocumentTypes', 'document_type_id');
    }

    /**
     * Returns the dcoument type
     */
    public function institution()
    {
        return $this->hasOne('App\Institution', 'user_id');
    }
}

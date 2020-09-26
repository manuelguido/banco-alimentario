<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    /**
    * Attributes
    */
    protected $table = 'document_types';

    protected $primaryKey = 'document_type_id';

    protected $fillable = [
        'document_type',
    ];

    public $timestamps = false;

    /**
     * Get the users data
     */
    public function user_data()
    {
        return $this->hasMany('App\UserData');
    }

    /**
     * Get the users data
     */
    public function responsables()
    {
        return $this->hasMany('App\Resonsable');
    }
}

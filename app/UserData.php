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
    public function documentType()
    {
        return $this->hasOne('App\DocumentTypes', 'document_type_id');
    }

    /**
     * Crear nueva información de usuario.
     */
    public static function createNew($user_id, $data)
    {
        $ud = new UserData;
        $ud->user_id = $user_id;
        $ud->name = $data['name'];
        $ud->lastname = $data['lastname'];
        $ud->phone = $data['phone'];
        $ud->document_type_id = $data['document_type_id'];
        $ud->document_number = $data['document_number'];
        $ud->save();
        return $ud;
    }

}

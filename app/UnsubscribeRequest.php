<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnsubscribeRequest extends Model
{
    const ESTADO_SOLICITADA = 'Creando'; //Cargando items
    const ESTADO_ACEPTADA = 'Aceptada'; //Sin agregar hora de retiro
    const ESTADO_RECHAZADA = 'Rechazada'; //Ya enviada para su aprobación

    /**
    * Attributes
    */
    protected $table = 'unsubscribe_requests';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'status', 'reason'
    ];

    public $timestamps = false;

    public function giver()
    {
        return $this->belongsTo('App\Giver');
    }

}

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

    protected $primaryKey = 'unsubscribe_request_id';

    protected $fillable = [
        'user_id', 'confirmer_id', 'reason',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    public function confirmer()
    {
        return $this->belongsTo('App\User', 'user_id', 'confirmer_id');
    }

    public function unsubscribe_requests()
    {
        return $this->belongsTo('App\UnsubscribeState', 'unsubscribe_state_id', 'unsubscribe_state_id');
    }

}

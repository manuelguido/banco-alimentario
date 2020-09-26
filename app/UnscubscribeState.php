<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnscubscribeState extends Model
{
    const STATUS_WAITING = 'En espera'; // Solicitud en espera
    const STATUS_ACCEPTED = 'Aceptada'; // Solicitud aceptada
    const STATUS_REJCETED = 'Rechazada'; // Solicitud rechazada

    /**
    * Attributes
    */
    protected $table = 'unsubscribe_states';

    protected $primaryKey = 'unsubscribe_state_id';

    protected $fillable = [
        'status',
    ];

    public $timestamps = false;

    public function unsubscribe_requests()
    {
        return $this->hasMany('App\UnsubscribeRequest', 'unsubscribe_state_id', 'unsubscribe_state_id');
    }

}

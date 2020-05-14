<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    const ESTADO_CREANDO = 'Creando'; //Cargando items
    const ESTADO_FINALIZANDO = 'Finalizando'; //Sin agregar hora de retiro
    const ESTADO_VIGENTE = 'Vigente'; //Ya enviada para su aprobación
    const ESTADO_RECHAZADO = 'Rechazada'; //Rechadaza por el banco
    const ESTADO_ACEPTADO = 'Aceptada';  //Aceptada por el banco
    const ESTADO_COMPLETADO = 'Completada'; //Ya entregada al banco alimentario

    /**
    * Attributes
    */
    protected $table = 'donations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'giver_id', 'status', 'date_from', 'date_to', 'time_from', 'time_to',
    ];

    public $timestamps = false;

    public function giver() {
        return $this->belongsTo('App\Giver', 'giver_id');
    }

    public function items() {
        return $this->hasMany('App\Item', 'donation_id');
    }

    public function note() {
        return $this->hasOne('App\DonationNote');
    }

    public function rejection() {
        return $this->hasOne('App\DonationRejection');
    }

    public function nearestExpiration() {
        return Product::where('donation_id', $this->id)->orderBy('exp_date', 'desc')->first();
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationStatus extends Model
{
    const STATUS_PENDING = 'Pendiente';
    const STATUS_ACCEPTED = 'Aceptada';
    const STATUS_FINISHED = 'Finalizada';
    const STATUS_CANCELED = 'Cancelada';
    const STATUS_REJECTED = 'Rechazada';

    /**
    * Attributes
    */
    protected $table = 'donation_status';

    protected $primaryKey = 'donation_id';

    protected $fillable = [
        'status',
    ];

    public $timestamps = false;

    public function donation() {
        return $this->belongsTo('App\Donation', 'donation_id', 'donation_id');
    }

}

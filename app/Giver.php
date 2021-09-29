<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Giver extends Model
{
    /**
    * Attributes
    */
    protected $table = 'givers';

    protected $primaryKey = 'user_id';

    protected $fillable = [];

    public $timestamps = false;

    /**
     * Obtener el usuario del donante.
     * @return App\Giver.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    /**
     * Obtener donaciones.
     * @return App\Donation Collection.
     */
    public function donations()
    {
        return $this->hasMany('App\Donation', 'user_id', 'user_id');
    }

    /**
     * Obtener productos frequentes.
     * @return App\FrequentProducts Collection.
     */
    public function frequentProducts()
    {
        return $this->hasOne('App\FrequentProducts', 'user_id', 'user_id');
    }

    /**
     * Obtener la donación actual en la cual se estan agregando productos del donante.
     * @return App\Donation;
     */
    public function currentDonation()
    {
        return $this->donationByStatus(DonationStatus::STATUS_CREATING)->first();
    }

    /**
     * Obtener donaciones con un estado determinado
     * @return App\Donation Collection.
     */
    public function donationByStatus($status)
    {
        return Donation::where([
            ['donations.user_id', '=', $this->user_id],
            ['donation_status.status', '=', $status],
        ])
        ->join('donation_status', 'donation_status.donation_status_id', '=', 'donations.donation_status_id');
    }

    /**
     * Crear nuevo donante.
     * @return App\Giver.
     */
    public static function createNew($user_id)
    {
        $giver = new Giver;
        $giver->user_id = $user_id;
        $giver->save();
        return $giver;
    }
}

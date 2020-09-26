<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    /**
    * Attributes
    */
    protected $table = 'institutions';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'institution', 'cuit', 'phone',
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Returns the giver
     */
    public function giver()
    {
        return $this->hasOne('App\Giver', 'user_id', 'user_id');
    }

    /**
     * Returns the giver
     */
    public function organization()
    {
        return $this->hasOne('App\Organization', 'user_id', 'user_id');
    }

    /**
     * Returns the addresses
     */
    public function addresses()
    {
        return $this->hasMany('App\Address', 'user_id', 'user_id');
    }
}

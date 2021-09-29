<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use DB;
use Hash;
use App\Role;
use App\UserData;

class User extends Authenticatable
{
    /**
     * User routes.
     */
    const USER_ROUTES = [
        ['icon' => 'iconly-boldProfile', 'name' => 'Cuenta', 'url' => '/user'],
    ];

    use HasApiTokens, Notifiable, SoftDeletes;

    /**
    * Attributes
    */
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'email', 'is_active',
    ];

    public $timestamps = true;

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
     * Infromación del usuario
     */
    public function userData()
    {
        return $this->hasOne(UserData::class, 'user_id', 'user_id');
    }

    /**
     * Roles del usuario.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    /**
     * Permisos del usuario.
     */
    public function permissions()
    {
        return $this->hasManyThrough('App\Permission', 'App\Role');
    }

    /**
     * Donante correspondiente al usuario.
     */
    public function giver()
    {
        return $this->hasOne('App\Giver', 'user_id', 'user_id');
    }

    /**
     * Donante correspondiente al usuario.
     */
    public function giverWithInstitution()
    {
        return $this->giver()->join('institutions', 'institutions.user_id', '=', 'givers.user_id');
    }

    /**
     * Organización correspondiente al usuario.
     */
    public function organization()
    {
        return $this->hasOne('App\Organization', 'user_id')
            ->join('insitutions', 'insitutions.user_id', '=', 'organizations.user_id');
    }


    /**
     * Solicitudes de desuscripción hechas por el usuario.
     */
    public function unsubscribeRequests()
    {
        return $this->hasMany('App\UnsubscribeRequest', 'user_id', 'user_id');
    }

    /**
     * Solicitudes de desuscripción aprobadas por el usuario.
     */
    public function unsubscribeRequestsConfirmed()
    {
        return $this->hasMany('App\UnsubscribeRequest', 'confirmer_id', 'user_id');
    }

    /**
     * Crear un nuevo usuario.
     * @return App\User.
     */
    public static function createNew($data, $is_active)
    {
        $user = new User;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->is_active = $is_active;
        $user->save();
        return $user;
    }

    /**
     * Ver que el usuario tenga un rol.
     * @return Boolean;
     */
    public function hasRole($role)
    {
        $result = Role::where([
            ['roles.role', '=', $role],
            ['role_user.user_id', '=', $this->user_id]
            ])
            ->join('role_user', 'role_user.role_id', '=', 'roles.role_id')
            ->count();
        
        return ($result > 0);
    }


    /**
     * Añadir rol a un usuario.
     * @return void.
     */
    public function setRole($role)
    {
        $role_id = Role::where('role', $role)->get()->first()->role_id;
        DB::table('role_user')->insert([
            'user_id' => $this->user_id,
            'role_id' => $role_id,
        ]);
    }

    /**
     * Obtener todos los datos de un usuario.
     * @return Array.
     */
    public function data($role)
    {
        $user_data = $this->userData()->get();
        return [
            'name' => $user_data->name,
            'lastname' => $user_data->lastname,
            'phone' => $user_data->phone,
            'document_type' => $this->userData()->get()->document_type()->get()->document_type,
            'document_number' => $user_data->document_number,
        ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 'Administrador';
    const ROLE_EMPLOYEE = 'Empleado';
    const ROLE_GIVER = 'Donante';
    const ROLE_ORGANIZATION = 'Organización';
    
    /**
     * Rutas de administradores
     */
    const ROUTES_ADMIN = [
        'web' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/admin'],
            ['icon' => 'iconly-boldHome', 'name' => 'Solicitudes', 'url' => '/admin/requests'],
        ],
        'mobile' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/admin'],
            ['icon' => 'iconly-boldHome', 'name' => 'Solicitudes', 'url' => '/admin/requests'],
            User::USER_ROUTES,
        ],
    ];

    /**
     * Rutas de empleados
     */
    const ROUTES_EMPLOYEE = [
        'web' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/employee'],
        ],
        'mobile' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/employee'],
            User::USER_ROUTES,
        ]
    ];

    /**
     * Rutas de donantes
     */
    const ROUTES_GIVER = [
        'web' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/giver'],
            [
                'icon' => 'iconly-boldBag',
                'name' => 'Mis donaciones',
                'url' => '/giver/donation',
                'children' => [
                    ['icon' => 'iconly-boldPlus', 'name' => 'Nueva', 'url' => '/giver/donation/create'],
                    ['icon' => 'iconly-boldTime-Square', 'name' => 'Pendietes', 'url' => '/giver/donation/pending'],
                    ['icon' => 'iconly-boldShield-Done', 'name' => 'Terminadas', 'url' => '/giver/donation/finished'],
                    ['icon' => 'iconly-boldShield-Fail', 'name' => 'Rechazadas', 'url' => '/giver/donation/rejected']
                ]
            ],
            [
                'icon' => 'iconly-boldStar',
                'name' => 'Productos frecuentes',
                'url' => '/giver/frequent_products',
                'children' => [
                    ['icon' => 'iconly-boldCategory', 'name' => 'Mis productos', 'url' => '/giver/frequent_products'],
                    ['icon' => 'iconly-boldPlus', 'name' => 'Nuevo', 'url' => '/giver/frequent_products/create'],
                ]
            ]
        ],
        'mobile' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/giver'],
            ['icon' => 'iconly-boldPlus', 'name' => 'Nueva', 'url' => '/giver/donation/create'],
            ['icon' => 'iconly-boldCategory', 'name' => 'Mis productos', 'url' => '/giver/frequent_products'],
            User::USER_ROUTES,
        ],
    ];

    /**
     * Rutas de organizaciones
     */
    const ROUTES_ORGANIZATION = [
        'web' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/organization'],
            [
                'icon' => 'iconly-boldHome',
                'name' => 'Donaciones recibidas',
                'url' => '/organization/donation/recived',
                'children' => [

                ]
            ]
        ],
        'mobile' => [
            ['icon' => 'iconly-boldActivity', 'name' => 'Inicio', 'url' => '/organization'],
        ]
    ];

    /**
    * Attributes
    */
    protected $table = 'roles';

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role',
    ];

    public $timestamps = false;

    /**
     * Obtener usuarios con este rol.
     * @return App\User Collection.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
    }

    /**
     * Obtener permisos del rol.
     * @return App\Permission Collection.
     */
    public function premissions()
    {
        return $this->hasMany('App\Permission', 'permission_role', 'role_id', 'permission_id');
    }

    /**
     * Obtener rutas permitidas para el rol.
     * @return Array.
     */
    public function routes()
    {
        $routes = [];
        switch ($this->role) {
            case Role::ROLE_ADMIN: $routes = Role::ROUTES_ADMIN; break;
            case Role::ROLE_EMPLOYEE: $routes = Role::ROUTES_EMPLOYEE; break;
            case Role::ROLE_GIVER: $routes = Role::ROUTES_GIVER; break;
            case Role::ROLE_ORGANIZATION: $routes = Role::ROUTES_ORGANIZATION; break;
        }
        return $routes;
    }
}

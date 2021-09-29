<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Obtener rutas permitidas de un usuario.
     * 
     * @return Array.
     */    
    private function getUserRoutes($user)
    {
        $routes = [];
        foreach ($user->roles as $role) {
            $routes = array_merge($routes, $role->routes());
        }
        return $routes;
    }

    /**
     * Obtener datos de almacenamiento local del usuario.
     * 
     * @return JSON.
     */
    public function data(Request $request)
    {
        // Obtener usuario
        $user = User::find($request->user()->user_id);
        // Datos de usuario
        $user_data = $user->userData()->first();
        $data = ['name' => $user_data->name, 'lastname' => $user_data->lastname, 'email' => $user->email];
        // Roles y permisos
        $roles = [];
        foreach ($user->roles as $role) {
            array_push($roles, $role->role);
        }
        $permissions = [];
        // foreach ($user->permissions as $permission) {
        //     array_push($permissions, $permission->permission);
        // }
        return response()->json([
            'user_data' => $data,
            'user_roles' => $roles,
            'user_permissions' => $permissions,
            'user_routes' => $this->getUserRoutes($user),
        ]);
    }
}

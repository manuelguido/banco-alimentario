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
        // Roles
        $roles = [];
        foreach ($user->roles as $role) {
            array_push($roles, $role->role);
        }
        return response()->json([
            'user' => $data,
            'roles' => $roles,
            'routes' => $this->getUserRoutes($user),
        ]);
    }
}

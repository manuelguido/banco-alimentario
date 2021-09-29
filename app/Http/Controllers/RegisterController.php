<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\UserData;
use App\Address;
use App\User;
use App\Role;



class RegisterController extends Controller
{
    /**
     * Validación de datos de donante
     * @return void.
     */
    private function validateGiver($data)
    {
        $this->validate($data, [
            'institution.institution' => 'string|max:60|required',
            'institution.cuit' => 'integer|min:1|required',
            'institution.phone' => 'string|max:40|required',
            'responsable.name' => 'string|required',
            'responsable.lastname' => 'string|required',
            'responsable.phone' => 'string|required',
            'responsable.document_type_id' => 'integer|min:1|required',
            'responsable.document_number' => 'integer|min:1|required',
            'address.street' => 'string|required',
            'address.number' => 'string|required',
            'address.floor' => 'integer|min:0|nullable',
            'address.apt' => 'string|nullable',
            'user.email' => 'string|required',
            'user.password' => 'string|required',
            'user.password_confirm' => 'string|required',
        ]);
    }

    public function registerGiver(Request $request)
    {
        try {
            $this->validateGiver($request);
            $result = User::where('email', $request->email)->first();
            if ($result) {
                $message = ['status' => 'success', 'message' => 'El email ya está registrado'];
            } else {
                $user = User::createNew($request->user, false);
                UserData::createNew($user->user_id, $request->responsable);
                Institution::createNew($user->user_id, $request->institution);
                Address::createNew($user->user_id, $request->address);
                $user->setRole(Role::ROLE_GIVER);
                $message = ['status' => 'success', 'message' => '¡Ya estás registrado!'];
            }
        }
        catch (\Exception $e)
        {
            $message = ['status' => 'warning', 'message' => 'No ingreses información inválida.'];
        }
        return response()->json($message, 200);
    }
}

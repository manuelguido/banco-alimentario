<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EmailController extends Controller
{
    /**
     * Validar email.
     * @return void.
     */
    private function validateEmail($data)
    {
        $this->validate($data, [
            'email' => 'string|nullable',
        ]);
    }

    /**
     * Analizar que el email esté disponible.
     * @return JSON.
     */
    public function emailAvailable(Request $request)
    {
        $this->validateEmail($request);
        if($request->email) {
            $result = User::where('email', $request->email)->first();
            if ($result) $available = false;
            else $available = true;
            $message = ['status' => 'success', 'available' => $available];
        } else {
            $message = ['status' => 'success', 'available' => true];
        }
        return response()->json($message);
    }
}

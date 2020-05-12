<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Neighborhood;
use App\User;
use Hash;

class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contactView()
    {
        return view('contact');
    }

    public function registerView($name)
    {
        if ($name == 'volunteer')
        {
            return view('auth.register_volunteer');
        }
        else if ($name == 'giver')
        {
            return view('auth.register_giver', ['neighborhoods' => Neighborhood::all()]);
        }
        else
        {
            abort(404);
        }
    }

    public function newVolunteer(Request $data) {
        $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'dni' => ['required'],
            'phone' => ['required'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'dni' => $data['dni'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'rol' => 'volunteer'
        ]);

        return redirect()->back()->with('success', 'Te has registrado como empleado! Ahora debes esperar por la confirmación de tu solicitud.');
    }
}

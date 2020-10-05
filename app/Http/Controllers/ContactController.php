<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*
    * Returns contact view
    *
    */
    public function index()
    {
        return view('contact');
    }
}

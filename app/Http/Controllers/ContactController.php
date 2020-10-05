<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Return contact view
     * 
     */
    public function index()
    {
        return view('contact');
    }
}

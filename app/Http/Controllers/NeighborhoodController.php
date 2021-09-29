<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Neighborhood;

class NeighborhoodController extends Controller
{
    /**
     * Barrios.
     * @return JSON.
     */
    public function index()
    {
        return response()->json(Neighborhood::all());
    }
}

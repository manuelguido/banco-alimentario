<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitOfMeasurement;

class UnitOfMeasurementController extends Controller
{
    /**
     * Unidades de medida.
     * @return JSON.
     */
    public function index()
    {
        return response()->json(UnitOfMeasurement::all());
    }
}

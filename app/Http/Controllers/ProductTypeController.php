<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class ProductTypeController extends Controller
{
    /**
     * Tipos de prodcutos.
     * @return JSON.
     */
    public function index()
    {
        return response()->json(Type::all());
    }
}

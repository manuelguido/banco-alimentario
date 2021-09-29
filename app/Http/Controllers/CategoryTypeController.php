<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryType;

class CategoryTypeController extends Controller
{
    /**
     * Tipos de categorías de productos.
     * @return JSON.
     */
    public function index()
    {
        return response()->json(CategoryType::all());
    }
}

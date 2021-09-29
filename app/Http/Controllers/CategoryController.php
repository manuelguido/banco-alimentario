<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Categorías de prodcutos.
     * @return JSON.
     */
    public function index()
    {
        return response()->json(Category::all());
    }
}

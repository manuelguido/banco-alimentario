<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentType;

class DocumentTypeController extends Controller
{
    /**
     * Categorías de prodcutos.
     * @return JSON.
     */
    public function index()
    {
        return response()->json(DocumentType::all());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('categories.create');  // Cambia 'products.create' por 'categories.create'
    }
}

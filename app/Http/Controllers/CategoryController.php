<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Función para mostrar todas las categorías
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Función para mostrar el formulario de creación de categoría
    public function create()
    {
        return view('categories.create');
    }

    // Función para almacenar una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoría creada con éxito.');
    }

    // Función para mostrar el formulario de edición de categoría
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Función para actualizar una categoría
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada con éxito.');
    }

    // Función para eliminar una categoría
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada con éxito.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categorias|max:255',
        ]);

        Categorias::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'name' => 'required|unique:categorias,name,' . $categoria->id . '|max:255',
        ]);

        $categoria->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Categorias $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
    }
}

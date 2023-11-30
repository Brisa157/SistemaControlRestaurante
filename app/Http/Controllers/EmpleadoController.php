<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = User::all(); // Obtiene todos los usuarios
        return view('empleados.index', compact('empleados'));
    }

    public function destroy(User $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }
}

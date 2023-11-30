<?php
namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\OrdenDetaills;
use App\Models\Platillos;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $ordenes = Ordenes::orderByDesc('status')->get()->groupBy('status');
        return view('ordenes.index', compact('ordenes'));
    }

    // Función para crear una nueva orden
    public function create()
    {
        $orden = Ordenes::create([
            'fecha' => now(),
            'status' => 'Pendiente', // Estado por defecto al crear una orden
        ]);

        $ordenes = Ordenes::orderByDesc('status')->get()->groupBy('status');
        return view('ordenes.index', compact('ordenes'));
    }

    public function show($id)
    {
        $orden = Ordenes::find($id);
        $platillos = Platillos::all();

        return view('ordenes.show', compact('orden', 'platillos'));
    }

    // Función para agregar platillos a una orden existente
    public function agregar(Request $request, Ordenes $orden)
    {
        $platillo = Platillos::findOrFail($request->input('platillo_id'));

        $OrdenDetaills = OrdenDetaills::create([
            'order_id' => $request->order_id,
            'platillo_id' => $platillo->id,
        ]);

        return redirect()->back()->with('success', 'Platillo agregado a la orden');
    }

    // Función para terminar una orden
    public function terminar(Ordenes $orden)
    {
        logger($orden);
        $orden->update([
            'status' => 'Terminada',
        ]);

        return redirect()->back()->with('success', 'Orden terminada');
    }

    // Función para cancelar una orden
    public function cancelar(Ordenes $orden)
    {
        logger($orden);

        $orden->update([
            'status' => 'Cancelada',
        ]);

        return redirect()->back()->with('success', 'Orden cancelada');
    }
}

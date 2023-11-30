<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Ordenes;
use App\Models\OrdenDetaills;


class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pagos::all();

        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ordenId)
    {
        // Obtener la orden específica según el ID proporcionado
        $orden = Ordenes::findOrFail($ordenId);

        // Obtener todos los detalles de la orden
        $detallesOrden = OrdenDetaills::where('order_id', $ordenId)->get();

        // Calcular el total del precio de los platillos asociados a esta orden
        $total= 0;

        foreach ($detallesOrden as $detalle) {
            // Acceder al precio del platillo a través de la relación
            $total += $detalle->platillo->precio;
        }

        return view('pagos.create', compact('orden', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|max:255',
            'tipo' => 'required|max:255',
            'total' => 'required|numeric',
        ]);

        Pagos::create([
            'total' => $request->total,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagos $pago)
    {
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente');
    }
}

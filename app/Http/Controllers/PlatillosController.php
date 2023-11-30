<?php

namespace App\Http\Controllers;

use App\Models\Platillos;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Categorias;

class PlatillosController extends Controller
{
    public function index()
    {
        $platillos = Platillos::all();

        return view('platillos.index', compact('platillos'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        return view('platillos.create', compact('categorias'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:platillos|max:255',
            'categoria_id' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);


        $nombreImagen = null; // Variable para almacenar el nombre de la imagen

        // Guardar la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $rutaImagen = public_path('carpeta_imagenes/' . $nombreImagen);

            // Mover la imagen a la carpeta deseada
            $imagen->move(public_path('carpeta_imagenes'), $nombreImagen);
        }

        Platillos::create([
            'name' => $request->name,
            'categoria_id' => $request->categoria_id,
            'precio' => $request->precio,
            'imagen' => $nombreImagen, // Asignar el nombre de la imagen al campo 'imagen'
        ]);

        return redirect()->route('platillos.index')->with('success', 'Platillo creado correctamente');
    }


    public function edit(Platillos $platillo)
    {
        $categorias = Categorias::all();
        return view('platillos.edit', compact('categorias', 'platillo'));
    }

    public function update(Request $request, Platillos $platillo)
    {
        $request->validate([
            'name' => 'required',
            'categoria_id' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        // Actualizar la imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $rutaImagen = public_path('carpeta_imagenes/' . $nombreImagen);

            // Mover la imagen a la carpeta deseada
            $imagen->move(public_path('carpeta_imagenes'), $nombreImagen);

            // Eliminar imagen anterior si existe
            if ($platillo->imagen) {
                // Eliminar la imagen anterior del servidor si ya existe
                $rutaImagenAnterior = public_path('carpeta_imagenes/' . $platillo->imagen);
                if (file_exists($rutaImagenAnterior)) {
                    unlink($rutaImagenAnterior);
                }
            }
        }

        $platillo->update([
            'name' => $request->name,
            'categoria_id' => $request->categoria_id,
            'precio' => $request->precio,
            'imagen' => $nombreImagen,
        ]);

        return redirect()->route('platillos.index')->with('success', '¡El platillo se actualizó correctamente!');
    }

    public function destroy(Platillos $platillo)
    {
        $platillo->delete();

        return redirect()->route('platillos.index')->with('success', 'Platillo eliminado correctamente');

    }
}

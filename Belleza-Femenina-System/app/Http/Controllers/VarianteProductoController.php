<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class VarianteProductoController extends Controller
{
    /**
     * Muestra un producto específico con sus variantes.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $producto = Producto::with('variantes.talla')->find($id);

        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        return view('productos.show', compact('producto'));
    }
}

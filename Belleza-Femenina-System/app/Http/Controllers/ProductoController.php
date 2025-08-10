<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Mostrar la página de detalle de un producto específico.
     *
     * @param int $id Identificador del producto
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        // Traer el producto con todas sus variantes y la talla de cada variante
        $producto = Producto::with('variantes.talla')->find($id);

        // Si no se encuentra el producto, mostrar error 404
        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        // Retornar vista con el producto cargado
        return view('producto.show', compact('producto'));
    }
}

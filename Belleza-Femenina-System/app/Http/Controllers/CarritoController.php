<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VarianteProducto;

class CarritoController extends Controller
{
    /**
     * Muestra el contenido actual del carrito.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    /**
     * Agrega una variante de producto al carrito, validando stock y cantidad.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function agregar(Request $request)
    {
        $request->validate([
            'id_variante' => 'required|exists:variantes_productos,id_variantes',
            'cantidad' => 'required|integer|min:1'
        ]);

        $variante = VarianteProducto::with('producto', 'talla')->find($request->id_variante);
        if (!$variante) {
            return back()->with('error', 'Variante no encontrada.');
        }

        if ($variante->stock < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        $carrito = session()->get('carrito', []);
        $id = $variante->id_variantes;

        if (!isset($carrito[$id])) {
            $carrito[$id] = [
                'id_variante' => $variante->id_variantes,
                'producto' => $variante->producto->nombre_p,
                'imagen' => $variante->producto->imagen ?? 'https://www.encantolatino.com.do/wp-content/uploads/2023/05/faja-colombiana-republica-dominicana.jpg',
                'talla' => $variante->talla->talla ?? 'Sin talla',
                'color' => $variante->color,
                'precio' => $variante->precio,
                'cantidad' => $request->cantidad
            ];
        } else {
            $carrito[$id]['cantidad'] += $request->cantidad;
        }

        // Actualizar stock en BD
        $variante->stock -= $request->cantidad;
        $variante->save();

        session()->put('carrito', $carrito);

        return back()->with('success', 'Producto agregado al carrito.');
    }

    /**
     * Elimina una variante de producto del carrito y recupera el stock.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_variante
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eliminar(Request $request, $id_variante)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id_variante])) {
            $cantidad = $carrito[$id_variante]['cantidad'];

            // Recuperar variante para devolver stock
            $variante = VarianteProducto::find($id_variante);
            if ($variante) {
                $variante->stock += $cantidad;
                $variante->save();
            }

            unset($carrito[$id_variante]);
            session()->put('carrito', $carrito);

            return back()->with('success', 'Producto eliminado del carrito.');
        }

        return back()->with('error', 'Producto no encontrado en el carrito.');
    }

    /**
     * Muestra la vista para editar la cantidad de una variante en el carrito.
     *
     * @param  int  $id_variante
     * @return \Illuminate\View\View
     */
    public function editar($id_variante)
    {
        $variante = VarianteProducto::with('producto', 'talla')->findOrFail($id_variante);

        return view('carrito.editar', compact('variante'));
    }

    /**
     * Actualiza la cantidad de una variante en el carrito y ajusta el stock en BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_variante
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actualizar(Request $request, $id_variante)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $carrito = session()->get('carrito', []);

        if (!isset($carrito[$id_variante])) {
            return back()->with('error', 'Producto no encontrado en el carrito.');
        }

        $variante = VarianteProducto::find($id_variante);
        if (!$variante) {
            return back()->with('error', 'Producto no encontrado.');
        }

        $cantidadNueva = $request->cantidad;
        $cantidadActual = $carrito[$id_variante]['cantidad'];

        if ($cantidadNueva > $cantidadActual) {
            $incremento = $cantidadNueva - $cantidadActual;
            if ($variante->stock < $incremento) {
                return back()->with('error', 'No hay suficiente stock disponible para aumentar la cantidad.');
            }
            $variante->stock -= $incremento;
        } else {
            $decremento = $cantidadActual - $cantidadNueva;
            $variante->stock += $decremento;
        }

        $variante->save();

        $carrito[$id_variante]['cantidad'] = $cantidadNueva;
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada correctamente.');
    }
}

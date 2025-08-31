<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'idVariante' => 'required|exists:variantesProdcuto,idVariante',
            'cantidad' => 'required|integer|min:1'
        ]);

        $variante = VarianteProducto::with('producto', 'talla')->find($request->idVariante);
        if (!$variante) {
            return back()->with('error', 'Variante no encontrada.');
        }

        if ($variante->stock < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        $carrito = session()->get('carrito', []);
        $id = $variante->idVariante;

        if (!isset($carrito[$id])) {
            $carrito[$id] = [
                'idVariante' => $variante->idVariante,
                'producto' => $variante->producto->nombreProducto,
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
     * @param  int  $idVariante
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eliminar(Request $request, $idVariante)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$idVariante])) {
            $cantidad = $carrito[$idVariante]['cantidad'];

            // Recuperar variante para devolver stock
            $variante = VarianteProducto::find($idVariante);
            if ($variante) {
                $variante->stock += $cantidad;
                $variante->save();
            }

            unset($carrito[$idVariante]);
            session()->put('carrito', $carrito);

            return back()->with('success', 'Producto eliminado del carrito.');
        }

        return back()->with('error', 'Producto no encontrado en el carrito.');
    }

    /**
     * Muestra la vista para editar la cantidad de una variante en el carrito.
     *
     * @param  int  $idVariante
     * @return \Illuminate\View\View
     */
    public function editar($idVariante)
    {
        $variante = VarianteProducto::with('producto', 'talla')->findOrFail($idVariante);

        return view('carrito.editar', compact('variante'));
    }

    /**
     * Actualiza la cantidad de una variante en el carrito y ajusta el stock en BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idVariante
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actualizar(Request $request, $idVariante)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $carrito = session()->get('carrito', []);

        if (!isset($carrito[$idVariante])) {
            return back()->with('error', 'Producto no encontrado en el carrito.');
        }

        $variante = VarianteProducto::find($idVariante);
        if (!$variante) {
            return back()->with('error', 'Producto no encontrado.');
        }

        $cantidadNueva = $request->cantidad;
        $cantidadActual = $carrito[$idVariante]['cantidad'];

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

        $carrito[$idVariante]['cantidad'] = $cantidadNueva;
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada correctamente.');
    }
}

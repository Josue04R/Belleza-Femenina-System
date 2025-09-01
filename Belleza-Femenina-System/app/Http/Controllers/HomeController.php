<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Muestra la página principal con una selección de productos destacados.
     *
     * @return \Illuminate\View\View Vista de inicio con productos.
     */
    public function home()
    {
        $productos = Producto::take(8)->get();
        return view('home.home', compact('productos'));
    }

    /**
     * Realiza una búsqueda de productos por nombre o descripción.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View Vista con resultados de búsqueda.
     */
    
    public function busqueda(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            // Si no hay búsqueda, traer todos los productos
            $productos = Producto::all();
        } else {
            $productos = Producto::where('nombreProducto', 'ILIKE', "%{$query}%")
                ->orWhere('descripcion', 'ILIKE', "%{$query}%")
                ->get();
        }

        return view('home.busqueda', compact('productos', 'query'));
    }
    

    /**
     * Muestra todos los productos disponibles en el sistema.
     *
     * @return \Illuminate\View\View Vista con todos los productos.
     */
    public function todos_productos()
    {
        $query = "Todos los productos";
        $productos = Producto::all();
        return view('home.busqueda', compact('productos', 'query'));
    }
}
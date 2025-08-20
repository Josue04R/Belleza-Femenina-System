<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
         $productos = Producto::take(8)->get();
        return view('home.home', compact('productos'));         
    }

    public function busqueda(Request $request){
        $query = $request->input('query');
       

        $productos = Producto::where('nombre_p', 'ILIKE', "%{$query}%")
            ->orWhere('descripcion', 'ILIKE', "%{$query}%")
            ->get();

        return view('home.busqueda', compact('productos', 'query'));
    }

    public function todos_productos(){
        $query = "Todos los productos";
        $productos = Producto::all();
        return view('home.busqueda', compact('productos', 'query'));
    }

}

<?php

use App\Http\Controllers\AnexosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se definen las rutas web de la aplicación.
|
*/

// Ruta principal - muestra todos los productos
Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'home')->name('home');
    Route::get('/busqueda','busqueda')->name('buscar');
    Route::get('/productos','todos_productos')->name('productos');
});


// Ruta para login

Route::get('/login', [ClienteController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [ClienteController::class, 'login']);

Route::get('/register', [ClienteController::class, 'mostrarRegistro'])->name('register');
Route::post('/register', [ClienteController::class, 'registrar']);

// Rutas del controlador Anexos agrupadas
Route::controller(AnexosController::class)->group(function () {
    Route::get('/guia-tallas', 'guia_tallas')->name('guia_tallas');
    Route::get('/preguntas-frecuentes', 'preguntas_frecuentes')->name('preguntas_frecuentes');
    Route::get('/sobre-nosotros', 'sobre_nosotros')->name('sobre_nosotros');
});

// Rutas relacionadas al carrito de compras
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::post('/carrito/eliminar/{id_variante}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/editar/{id_variante}', [CarritoController::class, 'editar'])->name('producto.editar');
Route::post('/carrito/actualizar/{id_variante}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');

// Ruta para mostrar producto individual
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.show');


Route::get('/checkout', [PedidoController::class, 'create'])->name('checkout.create');
Route::post('/checkout', [PedidoController::class, 'store'])->name('checkout.store');
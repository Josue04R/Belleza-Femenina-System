<?php

use App\Http\Controllers\AnexosController;
use Illuminate\Support\Facades\Route;

//Agregados solo para ver nomas ---inicio
Route::get('/', function () {
    return view('layout.template1');
});

Route::get('/login', function () {
    return view('login.login');
});
///final

Route::controller(AnexosController::class)->group(function () {
    Route::get('/guia_tallas', 'guia_tallas')->name('guia_tallas');
    Route::get('/preguntas_frecuentes', 'preguntas_frecuentes')->name('preguntas_frecuentes');
    Route::get('/sobre_nosotros', 'sobre_nosotros')->name('sobre_nosotros');

});

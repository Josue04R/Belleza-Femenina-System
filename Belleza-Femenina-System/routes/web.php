<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Agregados solo para ver nomas ---inicio
Route::get('/template1', function () {
    return view('layout.template1');
});

Route::get('/login', function () {
    return view('login.login');
});
///final

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas del Dashboard para nuestras entidades (Protegidas por Login)
Route::middleware('auth')->group(function () {
    Route::get('/categorias', function () { return view('categorias.index'); })->name('categorias.index');
    Route::get('/productos', function () { return view('productos.index'); })->name('productos.index');
    Route::get('/proveedores', function () { return view('proveedores.index'); })->name('proveedores.index');
    // Puedes agregar Ingresos y Detalles después si lo deseas
});
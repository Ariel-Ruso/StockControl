<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrazaController;

Route::get('/', function () {
    return view('auth.login');
})->name('bienvenidos');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//traza
Route::get ('traza/Trabajos', [TrazaController::class, 'Trabajos'])
            ->name('trabajos');

//users
Route::get ('usuarios/mostrarTodos', [UserController::class, 'mostrarTodos'])
            ->name('mostrarTodos');

//sesion
Route::get('verSession', [CarritoController::class, 'verSession'])
    ->name('verSession');

//abm articulos

Route::get ('articulos/mostrarTodos', [ArticuloController::class, 'mostrarTodos'])
            ->name('mostrarTodosArt');

Route::get ('articulos/mostrarxCate', [ArticuloController::class, 'mostrarxCate'])
            ->name('mostrarxCate');

Route::get ('articulos/buscaPorAr', [ArticuloController::class, 'buscaPorAr'])
            ->name('buscaPorAr');

Route::post ('articulos/crear_articulo2', [ArticuloController::class, 'crear_articulo2'])
            ->name('crear_articulo2');

Route::get ('articulos/crear_articulo',[ArticuloController::class, 'crear_articulo'])
            ->name('crear_articulo'); 

Route::delete ('articulos/eliminar_articulo/{id}', [ArticuloController::class, 'eliminar_articulo'])
            ->name('eliminar_articulo'); 

Route::get ('articulos/detalle_articulo/{id}', [ArticuloController::class, 'detalle_articulo'])
            ->name('detalle_articulo'); 

Route::get ('articulos/editar_articulo/{id}', [ArticuloController::class, 'editar_articulo'])
            ->name('editar_articulo'); 

Route::put ('articulos/editar/{id}', [ArticuloController::class, 'actualizar_articulo'])
            ->name('actualizar_articulo'); 

//ventas
Route::get ('venta/nueva_venta', [VentaController::class, 'nueva_Venta'])
            ->name('nueva_venta');

Route::post ('finalizarVenta', [VentaController::class, 'finalizarVenta'])
            ->name('finalizarVenta');            

//carrito

Route::get ('venta/detallePedido', [CarritoController::class, 'detallePedido'])
            ->name('detallePedido');


Route::get('venta/verCarrito', [CarritoController::class, 'verCarrito'])
    ->name('verCarrito');


Route::get('agregar/{id}', [CarritoController::class, 'agregar'])
    ->name('agregar');

Route::get('eliminarCarr/{id}', [CarritoController::class, 'eliminarCarr'])
    ->name('eliminarCarr');

Route::get('borrarCarr', [CarritoController::class, 'borrarCarr'])
    ->name('borrarCarr');
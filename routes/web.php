<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;

Route::get('/', function () {
    return view('auth.login');
})->name('bienvenidos');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//abm articulos

Route::get ('articulos/mostrarTodos', [ArticuloController::class, 'mostrarTodos'])
            ->name('mostrarTodosArt');
//Route::get ('articulos/mostrarTodos', 'ArticuloController@mostrarTodos')->name('mostrarTodosArt');

Route::get ('articulos/mostrarxCate', [ArticuloController::class, 'mostrarxCate'])
            ->name('mostrarxCate');
//Route::get ('articulos/mostrarxCate', 'ArticuloController@mostrarxCate')->name('mostrarxCate');

Route::get ('articulos/buscaPorAr', [ArticuloController::class, 'buscaPorAr'])
            ->name('buscaPorAr');
//Route::get ('articulos/buscaPorAr', 'ArticuloController@buscaPorAr')->name('buscaPorAr');

Route::post ('articulos/crear_articulo2', [ArticuloController::class, 'crear_articulo2'])
            ->name('crear_articulo2');

Route::get ('articulos/crear_articulo',[ArticuloController::class, 'crear_articulo'])
            ->name('crear_articulo'); 

//Route::delete('articulos/{id}', 'ArticuloController@eliminar_articulo')->name('eliminar_articulo');
Route::delete ('articulos/eliminar_articulo/{id}', [ArticuloController::class, 'eliminar_articulo'])
            ->name('eliminar_articulo'); 

//Route::get ('articulos/detalle_articulo/{id}', 'ArticuloController@detalle_articulo')->name('detalle_articulo');
Route::get ('articulos/detalle_articulo/{id}', [ArticuloController::class, 'detalle_articulo'])
            ->name('detalle_articulo'); 

//Route::get ('articulos/editar_articulo/{id}', 'ArticuloController@editar_articulo')->name('editar_articulo');
Route::get ('articulos/editar_articulo/{id}', [ArticuloController::class, 'editar_articulo'])
            ->name('editar_articulo'); 

//Route::put ('articulos/editar/{id}', 'ArticuloController@actualizar_articulo')->name('actualizar_articulo');
Route::put ('articulos/editar/{id}', [ArticuloController::class, 'actualizar_articulo'])
            ->name('actualizar_articulo'); 
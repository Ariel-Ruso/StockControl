<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrazaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PdfController;

 Route::get('/', function () {
    return view('welcome');
})->name('welcome'); 

//impresion pdfs

Route::get('/detalle_articuloPdf/{id}', [pdfController::class, 'detalle_articuloPdf'])
    ->name('detalle_articuloPdf');

Route::get('/articulosPdf', [pdfController::class, 'articulosPdf'])
    ->name('articulosPdf');

Route::get('/articulosPdfHoriz', [pdfController::class, 'articulosPdfHoriz'])
    ->name('articulosPdfHoriz');

/* Route::get('/', function () {
    return view('home');
})->name('home'); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
/* 
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dash2', function () {
    return view('dash2');
})->name('dashboard'); */

//caja
Route::get('/dash', function () {
    return view('dash2');
})->name('dash2');


Route::get ('/cajaDiaria',[CajaController::class, 'cajaDiaria'])
    ->name('cajaDiaria');  

//users
Route::get ('/crear_usuario',[UsuarioController::class, 'crear_usuario'])
    ->name('crear_usuario');  

Route::post ('/crear_usuario2', [UsuarioController::class, 'crear_usuario2'])
    ->name('crear_usuario2');           

Route::get ('usuarios/mostrarTodos', [UsuarioController::class, 'mostrarTodos'])
            ->name('mostrarTodos');


//categ
            
Route::get ('/crear_categoria',[CategoriaController::class, 'crear_categoria'])
    ->name('crear_categoria');  

Route::post ('/crear_categoria2', [CategoriaController::class, 'crear_categoria2'])
    ->name('crear_categoria2');    
    
Route::delete ('categorias/eliminar_categoria/{id}', [CategoriaController::class, 'eliminar_categoria'])
     ->name('eliminar_categoria'); 

    
    
Route::get ('/mostrar_categorias',[CategoriaController::class, 'mostrar_categorias'])
->name('mostrar_categorias'); 

    //provee    
Route::get ('/crear_proveedor',[ProveedorController::class, 'crear_proveedor'])
    ->name('crear_proveedor');  

Route::post ('/crear_proveedor2', [ProveedorController::class, 'crear_proveedor2'])
    ->name('crear_proveedor2'); 
    
Route::get ('/mostrar_proveedores',[ProveedorController::class, 'mostrar_proveedores'])
->name('mostrar_proveedores');    

Route::delete ('/eliminar_proveedor/{id}', [ProveedorController::class, 'eliminar_proveedor'])
     ->name('eliminar_proveedor');         


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

Route::put ('articulos/actualizar_articulo/{id}', [ArticuloController::class, 'actualizar_articulo'])
            ->name('actualizar_articulo'); 

Route::put ('articulos/vender_articulo/{id}', [ArticuloController::class, 'vender_articulo'])
            ->name('vender_articulo'); 

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

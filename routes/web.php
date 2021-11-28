<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FilecsvController;
use App\Http\Controllers\FilecsvCaeController;
use App\Http\Controllers\FilecsvIvaController;
use App\Http\Controllers\FerretController;
use App\Http\Controllers\AfipController;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\ContableController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ImeiController;
//use App\Exports;
//use App\Imports\csvImport;

 Route::get('/', function () {
    return view('welcome');
})->name('welcome'); 

Route::middleware('auth')->group (function() {

    Route::resource('imeis', ImeiController::class);

        Route::get ('select/{id}', [ImeiController::class, 'select'])
            ->name('imeis.select');
        
        
        
            Route::get('verImei', [ImeiController::class, 'verImei'])
            ->name('verImei');

//reclamos
Route::resource ('ordenes', OrdenController::class);;

Route::get ('elegir_factura/{id}', [ReclamoController::class, 'elegir_factura'])
    ->name('elegir_factura');

Route::post ('reclamos.buscar', [ReclamoController::class, 'buscar'])
    ->name('buscar');

Route::post ('/store', [ReclamoController::class, 'store'])
    ->name('store_r');

Route::get ('reclamos.store', [ReclamoController::class, 'cargar'])
    ->name('cargar');

Route::get ('reclamos.index', [ReclamoController::class, 'index'])
    ->name('index_r');

Route::get ('/reclamos.create', [ReclamoController::class, 'create'])
    ->name('create_r');

//afip
Route::get ('voucher', [AfipController::class, 'voucher'])
    ->name('voucher');

//Rutas csv

Route::get ('/actualizarP', [FerretController::class, 'actualizarP'])
    ->name('actualizarP');

Route::get ('/migrarArticulos', [FerretController::class, 'migrarArticulos'])
    ->name('migrarArticulos');

Route::post ('/importarLista', [FerretController::class, 'importarLista'])
    ->name('importarLista');
    
Route::get ('/mostrarImportacionLista', [FerretController::class, 'mostrarImportacionLista'])
->name('mostrarImportacionLista');  

Route::post ('/importarCae', [FilecsvCaeController::class, 'importarCae'])
    ->name('importarCae');

Route::get ('/exportarCsvIva/{id}', [FileCsvIvaController::class, 'exportarCsvIva'])
    ->name('exportarCsvIva');   

 Route::get ('/exportarCsv/{id}', [FileCsvController::class, 'exportarCsv'])
    ->name('exportarCsv');   

Route::get ('/mostrarImportacion', [FileCsvController::class, 'mostrarImportacion'])
    ->name('mostrarImportacion'); 

//facturas y remito

Route::get('/imprimirRemit/{id}', [FacturaController::class, 'imprimirRemit'])
    ->name('imprimirRemit');


Route::get('/generarFacturaB/{id}', [FacturaController::class, 'generarFacturaB'])
    ->name('generarFacturaB');
    
Route::get('/generarFacturaA/{id}', [FacturaController::class, 'generarFacturaA'])
    ->name('generarFacturaA');

/* Route::get('/generarFactura/{id}/{tipoCte}', [FacturaController::class, 'generarFactura'])
    ->name('generarFactura'); */

Route::get('/imprimirFactA/{id}', [FacturaController::class, 'imprimirFactA'])
    ->name('imprimirFactA'); 

Route::get('/imprimirFactB/{id}', [FacturaController::class, 'imprimirFactB'])
    ->name('imprimirFactB');
    
Route::get('/imprimirPresu/{id}', [PresupuestoController::class, 'imprimirPresu'])
->name('imprimirPresu');
 
Route::get('/imprimirPresuPDF/{id}', [pdfController::class, 'imprimirPresuPDF'])
    ->name('imprimirPresuPDF');

Route::get('/imprimirRemitPDF/{id}', [pdfController::class, 'imprimirRemitPDF'])
    ->name('imprimirRemitPDF');

Route::get('/imprimirRemitPDF2/{id}', [pdfController::class, 'imprimirRemitPDF2'])
    ->name('imprimirRemitPDF2');

Route::get('/imprimirFactPDF/{id}', [pdfController::class, 'imprimirFactPDF'])
    ->name('imprimirFactPDF');

Route::get('/imprimirFactPdfA/{id}', [pdfController::class, 'imprimirFactPdfA'])
    ->name('imprimirFactPdfA');

Route::get('/detalle_articuloPdf/{id}', [pdfController::class, 'detalle_articuloPdf'])
    ->name('detalle_articuloPdf');

Route::get('/articulosPdf', [pdfController::class, 'articulosPdf'])
    ->name('articulosPdf');

Route::get('/articulosPdfHoriz', [pdfController::class, 'articulosPdfHoriz'])
    ->name('articulosPdfHoriz');


Route::resource('caja', CajaController::class);

    Route::get('/caja.cierre_cajaPdf', [pdfController::class, 'cierre_cajaPdf'])
        ->name('cierre_cajaPdf');

    Route::get ('caja.cerrarCaja',[CajaController::class, 'cerrarCaja'])
        ->name('cerrarCaja');

Route::resource('gastos', GastoController::class);

Route::resource('usuarios', UsuarioController::class);

///roles

Route::get ('roles/index', [RoleController::class, 'index'])
            ->name('index_r');

Route::resource('categorias', CategoriaController::class);

Route::resource('proveedores', ProveedorController::class);

Route::get('verSession', [CarritoController::class, 'verSession'])
    ->name('verSession');

Route::post ('selectImei', [CarritoController::class, 'selectImei'])
            ->name('carrito.selectImei');

Route::resource('contable', ContableController::class);

    Route::get ('contable.buscaContable', [ContableController::class, 'buscaContable'])
            ->name('buscaContable');

Route::resource('clientes', ClienteController::class);

            Route::get ('/clientes.index', [ClienteController::class, 'search'])
                   ->name('clientes.search');
                                      
            Route::get ('select/{id}', [ClienteController::class, 'select'])
                    ->name('clientes.select');
        
            Route::get ('unselect', [ClienteController::class, 'unselect'])
                    ->name('clientes.unselect');


Route::resource('articulos', ArticuloController::class);
                
    Route::get ('/articulos.index', [ArticuloController::class, 'search'])
            ->name('articulos.search');

    Route::put ('articulos/vender_articulo/{id}', [ArticuloController::class, 'vender_articulo'])
                ->name('vender_articulo'); 

    Route::get ('/articulos.createZ', [ArticuloController::class, 'createZ'])
                ->name('articulos.createZ');

//Route::resource ('celulares', CelularController::class);
            
 
//ventas

Route::post ('venta/detallePedido{$request', [VentaController::class, 'descuento'])
            ->name('descuento');          

Route::get ('venta/ventasXmes', [VentaController::class, 'ventasXmes'])
            ->name('ventasXmes');

Route::get ('venta/ventasXart', [VentaController::class, 'ventasXart'])
            ->name('ventasXart');

Route::get ('venta/cantidades', [VentaController::class, 'cantidades'])
            ->name('cantidades');

Route::get ('venta/tenencias', [VentaController::class, 'tenencias'])
            ->name('tenencias');

Route::get ('venta/nueva_venta', [VentaController::class, 'nueva_Venta'])
            ->name('nueva_venta');

Route::post ('finalizarVenta', [VentaController::class, 'finalizarVenta'])
            ->name('finalizarVenta');          
            
Route::post ('ventaImpresion', [VentaController::class, 'ventaImpresion'])
            ->name('ventaImpresion'); 

Route::get ('resportes/ventasTotales', [VentaController::class, 'ventasTotales'])
            ->name('ventasTotales');
            
//pedidos

Route::resource('pedidos', PedidoController::class);

    Route::get ('pedidos/entregarP/{id}', [PedidoController::class, 'entregarP'])
        ->name('entregarP');

    Route::get ('pedidos/detallePe', [PedidoController::class, 'detallePe'])
        ->name('detallePe');
    
    Route::get ('enviar/{id}', [PedidoController::class, 'enviar'])
        ->name('pedidos.enviar');  
    
    Route::post ('asignar/{id}', [PedidoController::class, 'asignar'])
        ->name('pedidos.asignar');  
/* 
    Route::get ('pedidos/index', [PedidoController::class, 'index'])
    ->name('indexP');

Route::post ('create', [PedidoController::class, 'create'])
    ->name('createP');  

Route::post ('store', [PedidoController::class, 'store'])
    ->name('storeP');  

    Route::get ('pedidos/show/{id}', [PedidoController::class, 'show'])
    ->name('showP');
 */

Route::resource('presupuestos', PresupuestoController::class);

    Route::get ('presupuestos/detallePresupuesto', [PresupuestoController::class, 'detallePresupuesto'])
                ->name('detallePresupuesto');

//carrito

Route::post('venta/verCarrito', [CarritoController::class, 'setDescuento'])
        ->name('setDescuento');

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

});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home')
->middleware('Authenticate');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index2'])
->name('dashboard');

/* Route::get('/dashboard', function () {
    return view('dashboard');
    })
->name('dashboard'); */


    

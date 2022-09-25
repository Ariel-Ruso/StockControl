<?php

namespace App\Http\Controllers;

use App\Models\Ferret;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ferretImport;
use DB;

class FerretController extends Controller
{
   /*   [8:45 p. m., 27/1/2021] Claudito: 1 . comas . puntos
        [8:45 p. m., 27/1/2021] Claudito: en el excel
        [8:45 p. m., 27/1/2021] Claudito: 2, en el csv  punto y coma ( ;) por comas (;)
        [8:45 p. m., 27/1/2021] Claudito: 3 borrar la ultima linea de abajo vacia
 */
    public function importarLista(Request $request)
    {
        DB::table('ferrets')
        ->delete();
        
        $lista= new Ferret();

        $est= $lista->importarLista( $request);

        if ($est == 0){
            return back()->with('mensaje', 'Elija archivo csv');

        }else{
            return back()->with('mensaje', 'Importacion correcta');
        }
                
    }

    public function mostrarImportacionLista()
    {
        return view ('importar.listaPrecio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function migrarArticulos()
    {
        $ferr= Ferret::all();

        foreach($ferr as $ferret){

            $art= new Articulo();
            /* 
            $art->codigo= $ferret->codigo;
            $art->descripcion= $ferret->rubro;
            $art->nombre= $ferret->articulo;
            $art->precioVenta= $ferret->ppublico;
            $art->cantidad= 1000;
            $art->categorias_id= 11;
            $art->proveedors_id= 2;
             */
            $art->codigo= $ferret->codigo;
            $art->precioVenta= $ferret->precioVenta;
            /* 
            $art->nombre= $ferret->articulo;
            $art->cantidad= $ferret->cantidad;
            $art->precioCompra= $ferret->precioCompra;
            $art->iva=  $ferret->iva;
            $art->pVentaTarj= $ferret->pVentaTarj; */

            $art->categorias_id= 11;
            $art->proveedors_id= 2;

            $art->save();
        }
        return back()->with('mensage', 'Importacion correcta');
    }

    public function actualizarP (){

        //actualiz precios
        

        $ferr= Ferret::all();
        $articulos= Articulo::all();

         foreach ($ferr as $ferrs) {
            
            foreach($articulos as $arts){
                DB::table('articulos')
                ->where('codigo', '=', $ferrs->codigo)
                //->update(['precioVenta' => $ferrs->plista 
                ->update(['precioVenta' => $ferrs->precioVenta
                    ]);
            }
        }
               
        return back()->with('mensaje', 'Datos actualizados');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ferret  $ferret
     * @return \Illuminate\Http\Response
     */
    public function show(Ferret $ferret)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ferret  $ferret
     * @return \Illuminate\Http\Response
     */
    public function edit(Ferret $ferret)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ferret  $ferret
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ferret $ferret)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ferret  $ferret
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ferret $ferret)
    {
        //
    }
}

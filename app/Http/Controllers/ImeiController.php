<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Imei;
use App\Models\Celular;
use App\Models\Carrito;
use Illuminate\Http\Request;

class ImeiController extends Controller
{
    public function __construct()
    {
        if(!session()->has('imei')) session()->put('imei', array());
    }
    
    public function index()
    {
        $imeis= Imei::all();
        $cont= count($imeis);
        $celus= Celular::all();
        return view ('imeis.index', compact ('imeis', 'celus', 'cont'));
    }

    public function select( Request $request){
        
        $art= Articulo::FindorFail($request->item_id);
        //dd($art);

        $art->imei= $request->imei_det;
         
        $art->save();  

        $cart= new Carrito();
        $cart->agregar($request->item_id);

        
        return back()         
                ->with ('mensaje', 'Imei seleccionado');
    
    }
    
    public function verImei()
    {
        dd (session()->get('imei'));       
        //dd (session());
    }
    
    public function create()
    {
        //$cell= Celular::FindorFail($id);
        //$cant= $cell->cantidad;
        return view ('imeis.create');
        //, compact ('cant'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $art= Articulo::all();
        $ult= $art->last();

        for ($i=0; $i< ($request->cont)-1; $i++ ){

            $imei= new Imei();
            $imei->detalle= $request->det[$i];
            //$imei->id_celular= $ult->id; 
            $imei->articulos_id= $ult->id; 
            $imei->save();

        }
                
        return back()
        ->with('mensaje', 'Cargas completas');
    }


    public function show(Imei $imei)
    {

        return view ('imeis.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function edit(Imei $imei)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imei $imei)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imei $imei)
    {
        //
    }
}

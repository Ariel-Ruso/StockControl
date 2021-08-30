<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Imei;
use App\Models\Celular;
use Illuminate\Http\Request;

class ImeiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imeis= Imei::all();
        $cont= count($imeis);
        $celus= Celular::all();
        return view ('imeis.index', compact ('imeis', 'celus', 'cont'));
    }

    
    public function create()
    {
        //$cell= Celular::FindorFail($id);
        //$cant= $cell->cantidad;
        return view ('imeis.create');
        //, compact ('cant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    public function cargas(Imei $imei){

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function show(Imei $imei)
    {
        //
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

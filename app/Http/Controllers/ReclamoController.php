<?php

namespace App\Http\Controllers;

use App\Models\Reclamo;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use DB;

class ReclamoController extends Controller
{
    public function index()
    {
        $recl= Reclamo::all();
        $cont= count($recl);
        $clies= Cliente::all();
        return view ('reclamos.index', compact('recl', 'cont', 'clies'));
    }

    
    public function create()
    {
        $facts= Factura::all();   
        $clies= Cliente::all();
        $users= User::all();   

        return view ('reclamos.create', compact('facts', 'clies', 'users'));
    }

    public function cargar(){

                
        return view ('reclamos.store');
    }

    public function buscar(Request $request){

        $fact= New Factura();
        $res= $fact->buscarFact($request->dni);
        
        //dd($res);
        return back();
        //view ('reclamos.create', compact('recl'));

    }

    public function elegir_factura($id){

        $item= Factura::FindorFail($id);
        
        $arts = Item::whereIn('idFactura', [$id]) ->get();
        /* 
        $art = DB::table('articulos')
            ->where('codigo', '=', '$item->codigo')
            ->groupBy('categorias_id')
            ->get(); */
        //dd($arts);
        return view ('reclamos.store', compact('item', 'arts'));
    
    }

    public function store(Request $request)
    {
        //dd($request);

        $recl= new Reclamo();

        $recl->nFact=   $request->nFact;
        $recl->fact_id= $request->id;
        $recl->dni=     $request->dni;
        $recl->total=   $request->total;
        $recl->articulos=   $request->articulos;
        $recl->save();
        
        $recl= Reclamo::all();
        $cont= count($recl);
        $clies= Cliente::all();
        return view ('reclamos.index', compact('recl', 'cont', 'clies'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamo $reclamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclamo $reclamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reclamo $reclamo)
    {
        //
    }
}

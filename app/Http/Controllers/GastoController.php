<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{

    public function create(){
    
        return view ('gastos.create');
    }

    
    public function store(Request $request){

        $gas= new Gasto();
        $gas->monto= $request->monto;
        $gas->detalle= $request->detalle;
        $gas->users_id= auth()->id();  
        
        $gas->save();

        //return back()->with('mensaje', 'Exitoso');
        //Redirigir a una acción
        return redirect()->action('App\Http\Controllers\CajaController@index')
                        ->with('mensaje', 'Carga Exitosa');;

    }

    public function show(gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(gasto $gasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gasto $gasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(gasto $gasto)
    {
        //
    }
}

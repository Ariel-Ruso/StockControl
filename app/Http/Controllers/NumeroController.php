<?php

namespace App\Http\Controllers;

use App\Models\numero;
use App\Models\Articulo;
use Illuminate\Http\Request;

class NumeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('numeros.create', compact('id','nombre'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $cont= 0;

        for ($i=0; $i<$request->cant; $i++ ){
            
            
            if($request->color[$i] != null){

                $num= new Numero();
                $num->numero= $request->numero[$i];    
                $num->color= $request->color[$i];    
                $num->cantidad= $request->cantidad[$i];
                $num->articulos_id= $request->id; 
                $num->save();
                
            }

            $cont = $cont + $request->cantidad[$i];
                        
        }

        $art= Articulo::findorfail($request->id);
        $art->cantidad= $cont;
        $art->save();

                
        return back()
                ->with('mensaje', 'Cargas completas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function show(numero $numero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function edit(numero $numero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, numero $numero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function destroy(numero $numero)
    {
        //
    }
}

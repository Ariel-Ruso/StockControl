<?php

namespace App\Http\Controllers;

use App\Models\numero;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //del 19 al 36
        for ($i=0; $i<$request->cant; $i++ ){
            
            if($request->color[$i] != null){
                $num= new Numero();
                $num->numero= $request->numero[$i];    
                $num->color= $request->color[$i];    
                $num->cantidad= $request->cantidad[$i];
                $num->articulos_id= $request->id; 
                $num->save();
            }

        }
                
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

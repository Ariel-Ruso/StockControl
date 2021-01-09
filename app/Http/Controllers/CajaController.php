<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\User;
use App\Models\Caja;
use App\Models\EstadoCaja;
use App\Http\Middleware;
use nesbot\Carbon;


class CajaController extends Controller
{
    public function mostrarCaja()
    {
        $users= User::all();
        $todas= Factura::all();

        //busco si caja inicial para este user
        $inic= Caja::where('users_id', auth()->id())->get();
        
        return view ('caja.mostrarCaja', compact('todas', 'users', 'inic'));
    }

    public function abrirCaja()
    {
         $inic= Caja::all();
         $est= EstadoCaja::all();

            //dd($est);

        if($est='null')
        {
            return(' Podes abrir');
            return view('caja.abreCaja');

        }
        if($est->estado == 1){
            return(' no Podes abrir');
        }
        //return view('caja.abreCaja');
    }

    public function guardarCaja(Request $request)
    {
        $request-> validate ([
            'monto' => 'required',
        ]);


        $caja= new Caja();
        $caja->users_id= auth()->id();
        $caja->monto= $request->monto;
        $caja->save();
        return back()->with('mensaje', 'Monto inicial establecido');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function show(Caja $caja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function edit(Caja $caja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caja $caja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caja $caja)
    {
        //
    }
}

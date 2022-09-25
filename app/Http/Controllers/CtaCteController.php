<?php

namespace App\Http\Controllers;

use App\Models\CtaCte;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CtaCteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctas= CtaCte::all();
        $clie= Cliente::all();
        return view('ctacte.index', compact('ctas','clie'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cta= new Ctacte();
                
        //$caja->users_id= auth()->id();
        $cta->monto= $request->monto;
        $cta->clientes_id= $request->cliente_id;
        $cta->facturas_id= 1m ;
        $cta->save();
        
        return redirect()
            ->back()
            ->with('mensaje', 'Monto cargado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CtaCte  $ctaCte
     * @return \Illuminate\Http\Response
     */
    public function show($clie_id)
    {
        $cta= new CtaCte();
        $total= $cta->totalxCliente($clie_id);
        //dd($total);
        $movim= CtaCte::all();
        $clie= Cliente::FindorFail($clie_id);
        //$ctaShow= CtaCte::FindorFail();
        return view ('ctacte.show', compact('movim','total','clie_id','clie' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CtaCte  $ctaCte
     * @return \Illuminate\Http\Response
     */
    public function edit(CtaCte $ctaCte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CtaCte  $ctaCte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CtaCte $ctaCte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CtaCte  $ctaCte
     * @return \Illuminate\Http\Response
     */
    public function destroy(CtaCte $ctaCte)
    {
        //
    }
}

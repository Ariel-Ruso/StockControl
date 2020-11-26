<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function crear_proveedor()
    {
        return view ('proveedores.crear_proveedor');
        
    }

    public function crear_proveedor2 (Request $request){
        
    	$request-> validate ([
            'nombre' => 'required',
            'correo' => 'required',
            'contacto' => 'required',
            'direccion' => 'required',
        ]);
      
        $prove = new proveedor;
        $prove->nombre = $request->nombre;
        $prove->correo = $request->correo;
        $prove->contacto = $request->contacto;
        $prove->direccion = $request->direccion;
        $prove->save();
        return back()->with('mensaje', 'Proveedor agregado correctamente');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}

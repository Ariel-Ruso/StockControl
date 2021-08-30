<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    
    public function index()
    {
        $proves= Proveedor::all();
        $cont= count($proves);
        return view ('proveedores.index', compact('proves', 'cont'));
        
    }

    public function create()
    {
        return view ('proveedores.create');
        
    }

    public function store (Request $request){

        //dd($request);
        
    	$request-> validate ([
            'nombre' => 'required',
            'correo' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $prove= Proveedor::create($request->all());
      /* 
        $prove = new proveedor;
        $prove->nombre = $request->nombre;
        $prove->correo = $request->correo;
        $prove->contacto = $request->contacto;
        $prove->telefono = $request->telefono;
        $prove->direccion = $request->direccion;
        $prove->save(); */

        return back()->with('mensaje', 'Proveedor agregado  ');
        
    }


    public function edit($id)
    {
        $prove= Proveedor::FindOrFail($id);

        return view ('proveedores.edit', compact('prove'));
        
    }

    public function update($id, Request $request ){
            
        $prove= Proveedor::FindOrFail($id);
                
        $prove->update ([
            'nombre' => $request->nombre,
            'contacto' => $request->contacto,
            'correo' => $request->correo,
            'telefono'=> $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return back()->with('mensaje', 'Proveedor editado  ');


    }

    public function destroy($id)
    {
        $prov= Proveedor::FindOrFail($id);
        $prov->delete();
        return back()->with('mensaje', 'Proveedor eliminado  ');    
    }
}

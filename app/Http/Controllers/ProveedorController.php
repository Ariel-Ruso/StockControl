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
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
      
        $prove = new proveedor;
        $prove->nombre = $request->nombre;
        $prove->correo = $request->correo;
        $prove->contacto = $request->contacto;
        $prove->telefono = $request->telefono;
        $prove->direccion = $request->direccion;
        $prove->save();
        return back()->with('mensaje', 'Proveedor agregado correctamente');
        
    }

    public function mostrar_proveedores()
    {
        $proves= Proveedor::all();
        return view ('proveedores.mostrar_proveedores', compact('proves'));
        
    }

    public function eliminar_proveedor($id)
    {
        $prov= Proveedor::FindOrFail($id);
        $prov->delete();
        return back()->with('mensaje', 'Proveedor eliminado correctamente');    
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;


use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function buscaPorAr(Request $request){
        
        $buscar= $request->get('buscarPor');  
        $tipo= $request->get('tipo');  
        $cates= Categoria::all();
        $proves= Proveedor::all();
        //invoco funcion scopeNombre
        $arts= Articulo::buscarPor($tipo, $buscar)->paginate(5);
        return view ('articulos.mostrarTodos', compact ('arts', 'cates', 'proves'));
    }

    public function mostrarxCate (Request $request){
        
        $cates_id= $request->get('categorias');
        $arts= Articulo::BuscarporCate($cates_id)->paginate(5);
        $proves= Proveedor::all();
        $cates= Categoria::all();
    	return view ('articulos.mostrarTodos', compact ('arts', 'cates', 'proves'));
    }

    public function crear_articulo(){
        $cates= Categoria::all();
        $proves= Proveedor::all();
        return view ('articulos.crear_articulo', compact ('cates', 'proves'));
    }

    public function crear_articulo2 (Request $request){
        //https://www.youtube.com/watch?v=PjEutNUZjj0&ab_channel=Aprendible
        //subir imagen
        //$request->file('imagen')->store('imagenes');
    	$request-> validate ([
            'nombre' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'iva' => 'required',
            'marca'  => 'required',
            'categorias_id' => 'required',
            'proveedors_id' => 'required',
        ]);
      
        $art = new Articulo;
        $art->nombre = $request->nombre;
        $art->cantidad = $request->cantidad;
        $art->precio = $request->precio;
        $art->iva = $request->iva;
        $art->categorias_id = $request->categorias_id;
        $art->proveedors_id = $request->proveedors_id;
        $art->marca= $request->marca;
        $art->descripcion= $request->descripcion;
        $art->save();
        return back()->with('mensaje', 'Articulo agregado correctamente');
        
    }

    public function mostrarTodos (){
       
        $arts= Articulo::paginate(5);
        $cates= Categoria::all();
        $proves= Proveedor::all();
    	return view ('articulos.mostrarTodos', compact ('arts', 'cates', 'proves'));
    }

    public function detalle_articulo($id){

        $art= Articulo::FindOrFail($id);
        $cates= Categoria::all();        
        $proves= Proveedor::all();
        return view ('articulos.detalle_articulo', compact('art','cates', 'proves'));
    
    }  

    public function editar_articulo($id){
        $cates= Categoria::all();        
        $arts= Articulo::FindOrFail($id);
        $proves= Proveedor::all();
        return view ('articulos.editar_articulo', compact ('arts','cates', 'proves'));
    }

    public function actualizar_articulo (Request $request, $id){

        $request-> validate ([
            'nombre' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'categorias_id' => 'required',
            'proveedors_id' => 'required',
            ]);
        $art_up= Articulo::FindOrFail($id);
        $art_up->nombre = $request->nombre;
        $art_up->cantidad = $request->cantidad;
        $art_up->precio = $request->precio;
        $art_up->categorias_id = $request->categorias_id;
        $art_up->proveedors_id = $request->proveedors_id;
        $art_up->save();
        return back()->with('mensaje', 'Editado correctamente');

    }
    
    public function eliminar_articulo($id)
    {
        $art= Articulo::FindOrFail($id);
        $art->delete();
        return back()->with('mensaje', 'Articulo eliminado correctamente');    
    }
    
    public function vender_articulo(Request $request, $id)
    {
        $request-> validate ([
            'cantidad' => 'required',
            ]);

        $art= Articulo::FindOrFail($id);
        $art->cantidad= $art->cantidad - $request->cantidad;
        $art->save();
        return back()->with('mensaje', 'Articulo vendido correctamente');    
    }
}

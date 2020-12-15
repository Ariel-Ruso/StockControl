<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function crear_categoria(){
        return view ('categorias.crear_categoria');
    }

    public function crear_categoria2 (Request $request){
        //https://www.youtube.com/watch?v=PjEutNUZjj0&ab_channel=Aprendible
        //subir imagen
        //$request->file('imagen')->store('imagenes');
    	$request-> validate ([
            'nombre' => 'required',
        ]);
      
        $cate = new categoria;
        $cate->nombre = $request->nombre;
        $cate->save();
        return back()->with('mensaje', 'Categoria agregada correctamente');
        
    }

    public function mostrar_categorias()
    {
           $cates= Categoria::all();
        return view ('categorias.mostrar_categorias', compact('cates'));
        
    }

    public function eliminar_categoria($id)
    {
        $cate= Categoria::FindOrFail($id);
        $cate->delete();
        return back()->with('mensaje', 'Categoria eliminada correctamente');    
    }
    

}

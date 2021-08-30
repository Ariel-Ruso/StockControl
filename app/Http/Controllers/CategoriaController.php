<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index(){

        
        $cates= Categoria::all();
        $cont= count($cates);

     return view ('categorias.index', compact('cates', 'cont'));
    }

    public function create(){

        return view ('categorias.create');
    }

    public function store(Request $request){
        
        $request-> validate ([
            'nombre' => 'required',
        ]);

        $cate= Categoria::create($request->all());
        return back()->with('mensaje', 'Categoría agregada  ');

    }

    public function destroy($id){

        $cate= Categoria::FindOrFail($id);
        $cate->delete();
        return back()->with('mensaje', 'Categoría eliminada  '); 

    }

    public function edit($id){

        $cate= Categoria::FindOrFail($id);
        return view ('categorias.edit', compact('cate'));

    }

    public function update($id, Request $request ){
            
        $cate= Categoria::FindOrFail($id);            
        $cate->update ($request->all());
            
        return back()->with('mensaje', 'Categoría editada  ');

    }
     /*  public function crear_categoria2 (Request $request){
        //https://www.youtube.com/watch?v=PjEutNUZjj0&ab_channel=Aprendible
        //subir imagen
        //$request->file('imagen')->store('imagenes');
    	$request-> validate ([
            'nombre' => 'required',
        ]);
      
        $cate = new categoria;
        $cate->nombre = $request->nombre;
        $cate->save();

        return back()->with('mensaje', 'Categoria agregada  ');
        
    } */

}

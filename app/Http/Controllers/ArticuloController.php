<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function buscaPorAr(Request $request){
        //dd($request);
        //$nombre= $request->get('buscarPorNombre');  
        $buscar= $request->get('buscarPor');  
        $tipo= $request->get('tipo');  
        $cates= Categoria::all();
        $proves= Proveedor::all();
        //invoco funcion scopeNombre
        $arts= Articulo::buscarPor($tipo, $buscar)->paginate(5);
        //$arts= Articulo::where($categorias->id,'like',"1")->paginate(5);
        return view ('articulos.mostrarTodos', compact ('arts', 'cates', 'proves'));
    }

    public function mostrarxCate (Request $request){
        
        $cates_id= $request->get('categorias');
        //dd($nombre);
        //$arts= Articulo::paginate(5);
        $arts= Articulo::BuscarporCate($cates_id)->paginate(5);
        $proves= Proveedor::all();
        $cates= Categoria::all();
        //dd($arts, $cates);
    	return view ('articulos.mostrarTodos', compact ('arts', 'cates', 'proves'));
    }

    public function crear_articulo(){
        //$cates= new Categorias;
        $cates= Categoria::all();
        $proves= Proveedor::all();
        return view ('articulos.crear_articulo', compact ('cates', 'proves'));
    }

    public function crear_articulo2 (Request $request){
       // dd( $request->file('imagen'));
        //https://www.youtube.com/watch?v=PjEutNUZjj0&ab_channel=Aprendible
        //subir imagen
        //$request->file('imagen')->store('imagenes');
    	$request-> validate ([
            'nombre' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'categorias_id' => 'required',
            'proveedors_id' => 'required',
        ]);
      
        $art = new Articulo;
        $art->nombre = $request->nombre;
        $art->cantidad = $request->cantidad;
        $art->precio = $request->precio;
        $art->categorias_id = $request->categorias_id;
        $art->proveedors_id = $request->proveedors_id;
        $art->save();
        return back()->with('mensaje', 'Articulo agregado correctamente');
        
    }

    public function mostrarTodos (){
       
        //$arts= Articulo::paginate(5);
        $arts= Articulo::paginate(5);
        $cates= Categoria::all();
        $proves= Proveedor::all();
        //dd($arts, $cates);
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
        return view ('articulos.editar_articulo', compact ('arts','cates'));
    }

    public function eliminar_articulo($id)
    {
        $art= Articulo::FindOrFail($id);
        $art->delete();
        return back()->with('mensaje', 'Articulo eliminado correctamente');    
    }

    public function actualizar_articulo (Request $request, $id){

        $art_up= Articulo::FindOrFail($id);
        $art_up->nombre = $request->nombre;
        $art_up->cantidad = $request->cantidad;
        $art_up->precio = $request->precio;
        $art_up->categorias_id = $request->categorias_id;
        $art_up->save();
        return back()->with('mensaje', 'Editado correctamente');

    }
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
        //
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
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
    }
}

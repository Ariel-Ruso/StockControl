<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Imei;
use \Milon\Barcode\DNS2D;
use \Milon\Barcode\DNS1D;
use Illuminate\Http\DB;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
   
    public function index (){
       
        $arts= Articulo::orderBy ('id', 'ASC')
            ->paginate(15);
        $cates= Categoria::all();
        $proves= Proveedor::all();

    	return view ('articulos.index', compact ('arts', 'cates', 'proves'));
    }


    public function create(){
        
        $cates= Categoria::all();
        $proves= Proveedor::all();
        $art= new Articulo();
        $ultArt= $art->getLastArt();
        
        return view ('articulos.create', compact ('cates', 'proves', 'ultArt'));
    }

    public function store (StoreArticulo $request){

        //https://www.youtube.com/watch?v=PjEutNUZjj0&ab_channel=Aprendible
        //subir imagen
        //$request->file('imagen')->store('imagenes');
    	
        //dd($request);
        Articulo::create($request->all());
        
        $cateCelu= Categoria::where('nombre', 'like', 'Celulares')->get();
        //dd($cateCelu[0]->id);
        
        if( ($request->categorias_id) == ($cateCelu[0]->id) ){
            //si es celu...
            $cant= $request->cantidad;
            return view ('imeis.create', compact ('cant'))
                ->with('mensaje', 'Celu agregado, ahora cargue imeis ');

        }
    
        return back()->with('mensaje', 'Artículo agregado  ');
        
    }

    public function show($id){

        $art= Articulo::FindOrFail($id);
        $cates= Categoria::all();        
        $proves= Proveedor::all();
                
        //traigo imeis d ese celu
        $imeis = Imei::whereIn('articulos_id', [$id]) ->get();
        //dd($imeis);

        return view ('articulos.show', compact('imeis','art','cates', 'proves'));
    
    }  

    public function edit($id){
        $cates= Categoria::all();        
        $arts= Articulo::FindOrFail($id);
        $proves= Proveedor::all();
        $imeis = Imei::whereIn('articulos_id', [$id]) ->get();
        
        return view ('articulos.edit', compact ('arts','cates', 'imeis', 'proves'));
    }

    public function update (Request $request, $id){

        $art_up= Articulo::FindOrFail($id);
        $art_up->update ($request->all());

        return back()->with('mensaje', 'Artículo editado');

    }
    
    public function destroy($id)
    {
        $art= Articulo::FindOrFail($id);
        $art->delete();

        return back()        
            ->with('mensaje', 'Artículo Eliminado');    
    }
    
    /* public function vender_articulo(Request $request, $id)
    {
        $request-> validate ([
            'cantidad' => 'required',
            ]);

        $art= Articulo::FindOrFail($id);
        $art->cantidad= $art->cantidad - $request->cantidad;
        $art->save();
        return back()->with('mensaje', 'Artículo vendido  ');    
    } */
    
    public function search(Request $request){      

        $nombre= $request->get('nombre');
        $codigo= $request->get('codigo');
        $marca= $request->get('marca');
        $modelo= $request->get('modelo');
        $precioi= $request->get('precioi');
        $preciof= $request->get('preciof');
        $categorias= $request->get('categorias');
        $proveedores= $request->get('proveedores');

        $arts= Articulo::orderBy ('id', 'ASC')
            ->nombre ($nombre)
            ->codigo ($codigo)
            ->marca ($marca)
            ->modelo ($modelo)
            ->precioi ($precioi)
            ->preciof ($preciof)
            ->categorias ($categorias)
            ->proveedores ($proveedores)
            ->paginate (1500);

        $cont= count($arts);
        $cates= Categoria::all();
        $proves= Proveedor::all();

        return view ('articulos.index', compact ('arts', 'cates', 'proves', 'cont'));
    }
      /* public function buscaPorAr(Request $request){
        
        $buscar= $request->get('buscarPor');  
        $tipo= $request->get('tipo');  
        $cates= Categoria::all();
        $proves= Proveedor::all();
        //invoco funcion scopeNombre
         if ( ($buscar) ) {
            $arts= Articulo::buscarPor($tipo, $buscar)
            
                ->paginate(5);
            $cont= count($arts);
        }else{
            return back()-> with('mensaje', 'Para buscar, cargue campos. ');
        } 
        return view ('articulos.mostrarTodos', compact ('arts', 'cates', 'proves', 'cont'));
    }  */
    
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Imei;
use App\Models\Numero;
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
        $imeis= Imei::all();
        $numeros= Numero::all();
        //dd($numeros);

    	return view ('articulos.index', compact ('arts', 'cates', 'proves', 'imeis', 'numeros'));
    }


    public function create(){
        
        $cates= Categoria::all();
        $proves= Proveedor::all();
        $art= new Articulo();
        $ultArt= $art->getLastArt();
        //dd($ultArt);
        return view ('articulos.create', compact ('cates', 'proves', 'ultArt'));
    }

    /* public function createZ(){
        
        $cates= Categoria::all();
        $proves= Proveedor::all();
        $art= new Articulo();
        $ultArt= $art->getLastArt();
        
        return view ('articulos.createZ', compact ('cates', 'proves', 'ultArt'));
    } */

    public function store (StoreArticulo $request){

        //https://www.youtube.com/watch?v=PjEutNUZjj0&ab_channel=Aprendible
        //subir imagen
        //$request->file('imagen')->store('imagenes');
    	
        
        Articulo::create($request->all());
        
        $cateCelu= Categoria::where('nombre', 'like', 'Celulares')->get();
        $cateCalz= Categoria::where('nombre', 'like', 'Calzados')->get();
        //dd($cateCelu[0]->id);
        //dd($cateCelu->id);
        if( ($request->categorias_id) == ($cateCelu[0]->id) ){
            //si es celu...
            $cant= $request->cantidad;
            return view ('imeis.create', compact ('cant'))
                ->with('mensaje', 'Celu agregado, ahora cargue imeis ');

        }
        
        if( ($request->categorias_id) == ($cateCalz[0]->id) ){
            //si es Calzados...
            //dd($request);
            $id= $request->id;
            $nombre= $request->nombre;
            $cant= $request->cantidad;
            return view ('numeros.create', compact ('id', 'nombre', 'cant'))
                ->with('mensaje', 'Cargue detalles ');

        }
        return back()->with('mensaje', 'Artículo agregado  ');
        
    }

    public function show($id){
        //dd($id);
        $art= Articulo::FindOrFail($id);
        $cates= Categoria::all();        
        $proves= Proveedor::all();
                
        //traigo imeis d ese celu
        $imeis = Imei::whereIn('articulos_id', [$id]) ->get();
        //dd($imeis);
        $numeros= Numero::whereIn('articulos_id', [$id]) ->get();
        
        //dd($numeros);
        return view ('articulos.show', compact('imeis','art','cates', 'proves', 'numeros'));
    
    }  

    public function edit($id){
        //$cates= Categoria::all();      
        
        $arts= Articulo::FindOrFail($id);
        $cate=  Categoria::where("id", "=", $arts->categorias_id)
        ->select ("nombre")
        ->get();
        $proves= Proveedor::all();
        $imeis = Imei::whereIn('articulos_id', [$id]) ->get();
        //dd($cate[0]->nombre);
        return view ('articulos.edit', compact ('arts','cate', 'imeis', 'proves'));
    }

    public function update (Request $request, $id){

        $art_up= Articulo::FindOrFail($id);
        $art_up->update ($request->all());

        return back()->with('mensaje', 'Artículo editado');

    }
    
    public function destroy($id)
    {
        //dd($id);
        $art= Articulo::FindOrFail($id);
        //$art->delete();
        $art->destroy($id);

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

        $cates= Categoria::all();
        $proves= Proveedor::all();
        $imeis= Imei::all();

        return view ('articulos.index', compact ('arts', 'cates', 'proves', 'imeis'));
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

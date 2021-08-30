<?php

namespace App\Http\Controllers;

use App\Models\Celular;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Imei;
use Illuminate\Http\Request;

// class CelularController extends Controller
class CelularController extends ArticuloController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    $celus= Celular::orderBy ('id', 'ASC')
        ->paginate(15);
    $cont= count($celus);
    $cates= Categoria::all();
    $proves= Proveedor::all();

    return view ('celulares.index', compact ('celus', 'cates', 'proves', 'cont' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $art= new Articulo();
        $ultArt= $art->getlastart();
        $cates= 1;
        $proves= Proveedor::all();
        return view ('/celulares.create', compact ('ultArt', 'proves', 'cates'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $validated = $request->validate([
                'nombre' => 'required',
                'codigo' => 'required',
                'cantidad' => 'required',
                'precioVenta' => 'required',
                'pVentaTarj' => 'required',
                'iva' => 'required',
                'precioCompra' => 'required',
                //'marca'  => 'required',
                //'modelo'  => 'required',
                'categorias_id' => 'required',
                'proveedors_id' => 'required',
                'codbar' => 'required'
            
        ]);

        Celular::create($request->all());
        $cant= $request->cantidad;
        return view ('imeis.create', compact ('cant'))
            ->with('mensaje', 'Celu agregado, ahora cargue imeis ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Celular  $celular
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $art= Celular::FindOrFail($id);
        $cates= Categoria::all();        
        $proves= Proveedor::all();
        $imeis= Imei::all();
        return view ('celulares.show', compact('art','cates', 'proves', 'imeis'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Celular  $celular
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $arts= Celular::FindOrFail($id);
        $imeis= Imei::all();
        $proves= Proveedor::all();
        $cates= Categoria::all();      
        
        return view ('celulares.edit', compact ('arts','cates', 'proves', 'imeis'));
    }

    public function update (Request $request, $id){

        $celu= Celular::FindOrFail($id);
        $celu->update ($request->all());

        return back()->with('mensaje', 'Celular editado');

    }

    public function destroy($id)
    {
        $celu= Celular::FindOrFail($id);
        $celu->delete();

        return back()        
            ->with('mensaje', 'Celular Eliminado');    
    }
    
}

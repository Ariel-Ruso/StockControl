<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Articulo;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar($id)
    {
        $articulo= Articulo::Findorfail($id);
        $carrito= session()->get('carrito');
        
        //si carro vacio, es 1 Articulo
        if(!$carrito){
            $carrito= [
                $id => [
                    "Nombre" => $articulo->nombre,
                    "Cantidad" => 1,
                    "Precio" => $articulo->precio,
                    /* "Imagen" => $Articulo->Imagen */
                    ]
                ];
            session()->put ('carrito', $carrito);
            return redirect()->back()->with('mensaje', 'Articulo agregado al carrito');
        }

        //si carrito ya tiene ese item agrego otro
        if(isset($carrito[$id])) {
            $carrito[$id]['Cantidad']++;
            session()->put('carrito', $carrito);
            return redirect()->back()->with('mensaje', ' Articulo mismo item agregado al carrito');
        }

        //si item no existe lo agrego
        $carrito[$id] = [
            "Nombre" => $articulo->nombre,
            "Cantidad" => 1,
            "Precio" => $articulo->precio,
            /* "Imagen" => $Articulo->Imagen */
             ];
        
    session()->put ('carrito', $carrito);
    return redirect()->back()->with('mensaje', 'Articulo agregado al carrito ');
    }
    
    public function eliminarCarr($id)
    {
        $articulo= Articulo::Findorfail($id);
        $carrito= session()->get('carrito');

        //si carrito ya tiene ese item borro uno
        if(isset($carrito[$id])) {
            $carrito[$id]['Cantidad']--;
            if($carrito[$id]['Cantidad']== 0){
                unset($carrito[$id]);
            }
            session()->put('carrito', $carrito);
            return redirect()->back()->with('mensaje', ' Articulo eliminado del carrito');
        }
        else{
            return redirect()->back()->with('mensaje', ' no hay Articulos');
        }
    }

    public function verCarrito()
    {
        return view ('venta/carrito');
    }
//funcion d prueba para trabajar final carrito, operar e insertar datos en base
   /*  public function verSession()
    {
        dd( \Session::get('carrito'));
        return view ('verSession', compact ('carrito'));
    } */
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
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }
}

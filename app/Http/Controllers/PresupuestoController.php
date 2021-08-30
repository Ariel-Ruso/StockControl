<?php

namespace App\Http\Controllers;

use App\Models\Presupuesto;
use App\Models\Carrito;
use App\Models\Articulo;
use App\Models\Item;
use App\Models\User;
use App\Models\Propietario;

use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    public function index(){

        $presu= Presupuesto::all();
        $users= User::all();
        $cont= count($presu);

        return view ('presupuestos.index', compact('presu', 'users', 'cont'));
    }

    public function imprimirPresu($id)
    {
        $presup= Presupuesto::FindorFail($id);
        //traigo items con mismo id
        $items = Item::whereIn('idPresupuesto', [$id]) ->get();
        $fecha= $presup->created_at;
        $npresu= "0003-000400". $id;
        //traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        $pro= Propietario::FindorFail($u_prop);
        $tipoPago= $presup->tipoPago;
        $total= $presup->total;
        
        return view ('presupuestos.presupuesto', compact('fecha', 'npresu', 'total', 'id', 
                    'items', 'tipoPago', 'pro'));
    }

    public function detallePresupuesto(){
        
        $carrito= session()->get('carrito');
        $cart= new Carrito();
        $total= $cart->subtotal();
        
        return view('presupuestos/detallePresupuesto', compact( 'carrito', 'total'));
    }

    public function store(Request $request) {
        
        $arts= Articulo::all();
        $cantA= count($arts);
        $presups= Presupuesto::all();
        $cantP= count($presups);
        $presup= new Presupuesto();
        $contItems=0;
        $tot=0;
        $precioNoBanc= $request->noBancaria5;

        for($x=1; $x <= $cantA; $x++){

            $carrito= session()->get('carrito');            
            $art= new Articulo;
            $item= new Item;
                       
            //si existe carrito con ese indice
                if (isset($carrito[$x])) 
                {
                    $contItems++;
                    if($request->tipoPago==4){
                        $item->cargarItemsP( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            $carrito[$x]["PrecioT"],
                                            //$carrito[$x]["Art_id"],
                                            $cantP);

                    }elseif($request->tipoPago==5){
                        $item->cargarItemsP( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            //$carrito[$x]["Art_id"],
                                            $precioNoBanc, 
                                            $cantP);

                    }else{
                        $item->cargarItemsP( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            $carrito[$x]["Precio"],
                                            //$carrito[$x]["Art_id"], 
                                            $cantP);
                                        
                    }
                    
                    //subt= cant * precioUnit;
                    $tot= $carrito[$x]["SubTotal"];
                                        
                    //$tot=  $subtot;
                    //$iva= ($subtot * 0.173554);
                    //$subtot= $tot - $iva;

                    //vendo art y descuento stock
                    //$art->vender_articulo($carrito[$x]["Cantidad"], $x);
                }   
        }
     
        $presup->generarPresupuesto($request, $contItems, $tot);
        session()->forget('carrito');

        return view ('dashboard')
                ->with('mensaje', 'Presupuesto generado');
    }

    public function generarPresupuesto($id){
        
            $presup= Presupuesto::FindorFail($id);
            $items = Item::whereIn('idPresupuesto', [$id]) ->get();
         
            $tipoPago= $presup->tipoPago;

            $total= $presup->total;

     return view ('presupuestos.presupuesto', compact('fecha', 'total', 'tipoPago',
                     'id', 'items'));         
    } 

   

    /**
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        //
    }
}

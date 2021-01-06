<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Factura;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VentaController extends Controller
{
    
    public function nueva_Venta()
    {
        //cargo su carrito con elementos
        $arts= Articulo::paginate(15);
        $cates= Categoria::all();
        $proves= Proveedor::all();
    	return view ('venta.nuevaVenta', compact ('arts', 'cates', 'proves'));
    }
    
    public function finalizarVenta(Request $request) {
        
        $carrito= session()->get('carrito');
        $cantC= count($carrito);
        //dd($cantC);
        for($x=0; $x <= $cantC; $x++){
            $fact= new Factura;
            $art= new Articulo;
            $arts= Articulo::all();
            $cantA= count($arts);
            //dd($cantA);
            $cart= new Carrito();
            
            for($x=0; $x <= $cantA; $x++){
            //si existe carrito con ese indice
                if(isset($carrito[$x])) {
                    //$detalle="";
                    $subtot= 0;
                    $detalle= 
                        " Articulo: ".$carrito[$x]["Nombre"]. "-". 
                        " Precio: ".$carrito[$x]["Precio"]. "-".
                        " Cantidad ".$carrito[$x]["Cantidad"]; 
    
                    $subtot= $carrito[$x]["SubTotal"];
                    //dd($subtot);
                    $art->vender_articulo($carrito[$x]["Cantidad"], $x);
                    
                    $tot= $subtot;
                    $iva= $subtot * 0.21;
                    $subtot= $tot - $iva;
                    //escribo factura
                    $fact->descripcion= $detalle;
                    $fact->subtotal= $subtot;
                    $fact->iva= $iva;
                    $fact->users_id= auth()->id();  
                    $fact->total= $tot;  
                    $fact->tipoPago= $request->tipoPago;

                    if ($request->tipoPago==4){
                        $fact->total= $request->noBancaria4;  
                        //dd($request->noBancaria4);  
                    }
                    if ($request->tipoPago==5){
                        
                        $fact->total= $request->noBancaria5;    
                       // dd($request->noBancaria5);
                    } 
                    
                    $fact->save();  
                    dd($fact);
                }
            }
        } 
        session()->forget('carrito');
        return view ('venta/verCarrito');

        //return redirect()->back()->with('mensaje', ' Venta correcta del carrito ');
    }

}
      
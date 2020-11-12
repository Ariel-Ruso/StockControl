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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nueva_Venta()
    {
        //carg su carrito con elem
        $arts= Articulo::paginate(15);
        $cates= Categoria::all();
        $proves= Proveedor::all();
        
    	return view ('venta.nuevaVenta', compact ('arts', 'cates', 'proves'));
    }

    public function finalizarVenta(Request $request) {
        
        $fact= new Factura;
        
        $user= auth()->id();
        $carrito= session()->get('carrito');
        $cantC= count($carrito);

        //$arts= Articulo::all();
        //$cantA= count($arts);
        $cart= new Carrito();
        $detalle="";
        $subtot= 0;
        
        for($x=0; $x <= $cantC; $x++){

           //si existe carrito con ese indice
            if(isset($carrito[$x])) {
                $detalle= 
                    " Articulo: ".$carrito[$x]["Nombre"]. "-". 
                    " Precio: ".$carrito[$x]["Precio"]. "-".
                    " Cantidad ".$carrito[$x]["Cantidad"]; 
                $subtot= $cart->total();
                
                $detalle= $detalle .$detalle;
            }
        }
        //dd($detalle);
        
        $fact->descripcion= $detalle;
        $iva= $subtot * 0.21;
        $tot= $subtot + $iva;

        $fact->subtotal= $subtot;
        $fact->iva= $iva;
        $fact->total= $tot;
        $fact->users_id= $user;                            
        $fact->tipoPago= $request->TipoPago;

        $fact->save();                     

        return redirect()->back()->with('mensaje', ' Venta correcta del carrito');
        
    }
}
      
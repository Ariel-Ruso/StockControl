<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Factura;
use App\Models\Carrito;
use App\Models\Session;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nueva_Venta()
    {
        $arts= Articulo::paginate(15);
        $cates= Categoria::all();
        $proves= Proveedor::all();
        
    	return view ('venta.nuevaVenta', compact ('arts', 'cates', 'proves'));
    }

    public function finalizar_Venta() {
        
        $fact= new Factura;
        $ventas= new Venta;
        $user= auth()->id();
        $carrito= session()->get('carrito');
        $cantC= count($carrito);
        $arts= Articulo::all();
        $cantA= count($arts);
        $cart= new Carrito();
        $cart->total();
        $total= $this->total;       
        //dd($cantA);
        //dd($user);
        //dd($cant);
        //recorro art 

        for($x=1; $x <= $cantA; $x++){
          

        }

        for($y=1; $y <= $cantC; $y++){
            
/* 
            $ventas->articulos_id= $carrito[$y+1]["Art_id"];
            $ventas->cantidad= $carrito[$y+1]["Cantidad"];
            $ventas->total= $carrito[$y+1]["SubTotal"];
            $ventas->iva= ($carrito[$y+1]["SubTotal"]) *0.21;
            $ventas->users_id= $user;
            
            $fact->descripcion='nueva factura ' .$x;
            $fact->save();

            $ventas->facturas_id= 1 ;
            $ventas->save(); */
        }    
            //dd ($carrito[$x+1]["Art_id"]);
            //dd ($arts[1]["id"]);           
            //dd($arts[0]["id"]);
            //dd($carrito[2]);
            //dd($carrito[$x+1]["Cantidad"]);
            //dd($carrito[2]["Precio"]);
            //dd($carrito[2]["SubTotal"]);
           // $ventas->articulos_id= $carrito()->id;
            //$ventas->save();
        
            /* $carrito[$x]
                [
                    "Cantidad",
                    Precio,
                    Total,
                ]; */
            
            /* 
            $fact->descripcion='nueva factura ' .$x;
            $fact->save();
            $ventas->articulos_id= 2;
            $ventas->cantidad= 100;
            $ventas->total= 100;
            $ventas->users_id= $user;
            $ventas->iva= 100*0.21;
            $ventas->facturas_id= 1 ;
            $ventas->save();     */

        //$articulo= Articulo::Findorfail($id);

        //$carrito[$id]['Cantidad']++;

            //carrito en memo lo vuelco en ventas
            //cuenta elementos
            //dd(count($carrito));
            return view ('venta.finalizarVenta', compact('carrito', 'arts', 'total'));

        }
    }
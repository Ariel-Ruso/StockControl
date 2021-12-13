<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Articulo;
use App\Models\Item;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Carrito;
use App\Models\Factura;
use App\Models\Respon;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos= Pedido::all();
        
        $users= User::all();
        $clientes= Cliente::all();
        $items= Item::all();
        return view ('pedidos.index', compact('pedidos', 'users', 'clientes'));
    }

    public function show($id)
    {
        $pedis= Pedido::FindorFail($id);
        $items = Item::whereIn('idPedido', [$id])->get();
        
        
        $clie= Cliente::all();
        $resp= Respon::all();
    //dd($id);
        return view ('pedidos.show', compact('resp', 'pedis', 'items', 'clie'));
        
    }
        
    public function create(Request $request){
        
        $arts= Articulo::all();
        $cantA= count($arts);
        $pedi= Pedido::all();
        $cantP= count($pedi);
        $pedido= new Pedido();
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
                        $item->cargarItemsPe( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            $carrito[$x]["PrecioT"],
                                            //$carrito[$x]["Art_id"],
                                            $cantP);

                    }elseif($request->tipoPago==5){
                        $item->cargarItemsPe( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            //$carrito[$x]["Art_id"],
                                            $precioNoBanc, 
                                            $cantP);

                    }else{
                        $item->cargarItemsPe( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            $carrito[$x]["Precio"],
                                            //$carrito[$x]["Art_id"], 
                                            $cantP);
                    }
                    
                    $tot= $carrito[$x]["SubTotal"];                    
                }   
        }
                
        //$pedido->generarPedido($request, $contItems, $tot);
        $this->store($request, $contItems, $tot);

        session()->forget('carrito');

        // return view ('dashboard')->with('mensaje', 'Pedido generado');
        return view ('pedidos.index')->with('mensaje', 'Pedido generado');
    }   
    
    public function store(Request $request, $contItems, $tot){
    
            $pedi= new Pedido();

            $pedi->cantidadItems= $contItems;
                
            //$pedi->clientes_id= auth()->id();  
    
            $pedi->total= $tot;  
            //$pedi->articulo_id= 
            $cli_id= session()->get('cliente_id'); 
            $pedi->clientes_id= $cli_id;
            
            $pedi->tipoPago= $request->tipoPago;
            $pedi->estado= 0;
            
            if ($request->tipoPago==4){
                $total= $tot + ($tot * 0.18);  
                $pedi->total= $total;
                
                }
    
            if ($request->tipoPago==5){
                    
                    $pedi->totalNoBanc= $request->noBancaria5;
                    $total= $request->noBancaria5;
                    $pedi->total= $total;
                 
                } 
            $pedi->save();  
    
    }
    
    public function enviar($id){

        //if(!Pedido::FindorFail($id))
        {

            $total=0;
            $fact= Factura::FindorFail($id);       
            
            $pedi= new Pedido();       
        
            $pedi->cantidadItems= $fact->cantidadItems;
            $pedi->total= $fact->total;

            $clie= new Cliente();
            $dni= $fact->dnicliente;
            $clie2= $clie->getClientexDNI($dni);
        
            $pedi->clientes_id= $clie2->first()->id;

            $pedi->tipoPago= $fact->tipoPago;
            $pedi->estado= 0;

            if ($fact->tipoPago==4){
                $total= $total + ($total * 0.18);  
                $pedi->total= $total;
                
                }
            
                if ($fact->tipoPago==5){
                            
                    $pedi->totalNoBanc= $fact->noBancaria5;
                    $total= $fact->noBancaria5;
                    $pedi->total= $total;
                
                } 
                
            $pedi->save();

            $item= Item::FindorFail($id);

            $item->idPedido=  $fact->id;

            $item->save();
        }
        
        // return back()->with ('mensaje', 'Pedido generado');
        // return view ('pedidos.index')->with('mensaje', 'Pedido generado');
        return redirect()->action('App\Http\Controllers\PedidoController@index')
                        ->with('mensaje', 'Pedido generado');

    }
    
   
    public function detallePe(Pedido $pedido)
    {
        $carrito= session()->get('carrito');
        $cart= new Carrito();
        $iva= $cart->iva();
        $total= $cart->subtotal();
        $totalTar= $cart->subtotalT();
        $subtotal= (($cart->subtotal())- $iva);
        
        $cli_id= session()->get('cliente_id'); 
        $clie= Cliente::FindorFail($cli_id);  

        return view ('pedidos.detallePe', compact('subtotal', 'carrito', 'total', 
            'clie', 'totalTar'));
    }

    public function entregarP( $id){

        $pedi= new Pedido();
        $pedi->setEstado($id, 1);
        return back();

    }

    public function asignar(Request $request, $id){
        //dd($id);
        $ped= Pedido::FindorFail($id);
        $ped->responsables= $request->conduc."-".$request->cobr;
        $ped->save();
        //return back();
        return redirect()->action('App\Http\Controllers\PedidoController@index');
    }

}

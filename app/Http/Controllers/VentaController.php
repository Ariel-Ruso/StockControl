<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use DB;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Factura;
use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\Filecsv;
use App\Models\FilecsvIva;
use App\Models\Item;
use App\Models\User;
use App\Models\CtaCte;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class VentaController extends Controller
{
    
    public function ventasXmes(){

        $arts= Articulo::all();
        $ventXmes= DB::table('facturas')
                    
                    ->whereMonth('created_at', '>=', 4)
                    ->whereMonth('created_at', '<', 6)
                    ->select('created_at', DB::raw ('SUM(total) as totales'))
                    ->groupBy ('created_at')
                    ->get();
        //dd($ventXmes);                    

        return view ('reportes.ventasXmes', compact ('ventXmes', 'arts'));    
    }

    public function ventasXart(){
    
        $arts= Articulo::all();
        
        $cantXitem= DB::table('items')
            
            ->join('facturas', 'facturas.id', '=', 'items.idFactura')
            ->select('codigo', DB::raw ('SUM(cantidad) as cantXitems'))
            ->select('codigo', DB::raw ('SUM(cantidad) as cantXitems'))
            ->groupBy ('codigo')
            ->get();

        return view ('reportes.ventasXart', compact ('arts', 'cantXitem'));    

    }

    public function cantidades(){

        $cates= Categoria::all();
        $cantArtsxCate = DB::table('articulos')
            ->select('categorias_id', DB::raw('SUM(cantidad) as cantXcates'))
            ->groupBy('categorias_id')
            ->get();

        return view ('reportes.cantidades', compact ('cates', 'cantArtsxCate'));

    }

     public function tenencias(){
    
        $cates= Categoria::all();
        
        $totArtsxCate = DB::table('articulos')
            ->select('categorias_id', DB::raw('SUM(precioVenta) as totalXcates'))
            ->groupBy('categorias_id')
            ->get();

    	return view ('reportes.tenencias', compact ('cates', 'totArtsxCate'));
    } 

    public function ventasTotales(){
        
        $user= new User();
        $users= $user->getAll();
       
        $fact= new Factura();
        $todas= $fact->mostrarTodasFact();
        //$todas= Factura::where('created_at','>',today())->get();
        $cont= count($todas);
        
        return view ('reportes.ventasTotales', compact('todas', 'cont', 'users'));

    }

    
    public function finalizarVenta(Request $request) {
        //dd($request);
        $arts= Articulo::all();
        $cantA= count($arts);
        $ultArt= (new Articulo)->getLastArt();
        $facts= Factura::all();
        $cantF= count($facts);
        $fact= new Factura();
        $contItems=0;
        $cart= new Carrito();
        $tot=0;
        $subtot=0;
        $iva=0;
        $precio=0;
        $subto= 0;
        $tipoPago= 0;              
                
        $cli_id= session()->get('cliente_id'); 
        $cta= new CtaCte();
        $clie= Cliente::FindorFail($cli_id);  
        //for($x=1; $x <= $cantA; $x++){    
        for($x=1; $x <= $ultArt->id; $x++){

            $carrito= session()->get('carrito');            
            $art= new Articulo;
            $csv= new Filecsv;
            $csvIva= new FilecsvIva;
            $item= new Item;
                     
            //si existe carrito con ese indice
            if (isset($carrito[$x])) 
                {
                    $contItems++;

                    if($request->tipoPago==1){
                        //si es eft
                      
                        $precio= $carrito[$x]["Precio"];
                        $subto= $carrito[$x]["SubTotal"];
                        $tipoPago= 1;
                       
                    }elseif($request->tipoPago==2){
                        //si es debi
                       
                        $precio= $carrito[$x]["Precio"];
                        $subto= $carrito[$x]["SubTotal"];
                        $tipoPago= 2;
                                            
                    }elseif($request->tipoPago==3){
                        //tarj bancaria
                            if($request->fpago==1){
                                //1 cuota
                                           
                                            $precio= $carrito[$x]["Precio"];
                                            $subto= $carrito[$x]["SubTotal"];
                                            $tipoPago= 31;
                                            
                            }elseif($request->fpago==2){
                                //3 cuotas
                                
                                            $precio= $carrito[$x]["PrecioT"];
                                            $subto= $carrito[$x]["SubTotalT"];
                                            $tipoPago= 32;
                                
                            }elseif($request->fpago==3){
                                //6 cuotas
                                           
                                            $precio= $carrito[$x]["PrecioT"];
                                            $subto= $carrito[$x]["SubTotalT"];
                                            $tipoPago= 33;

                            }elseif($request->fpago==4){
                                //12 cuotas
                            
                                            $precio= $carrito[$x]["PrecioT"];
                                            $subto= $carrito[$x]["SubTotalT"];
                                            $tipoPago= 34;

                            }

                    }elseif($request->tipoPago==4){
                            //si es noBancaria
                            
                                $precio= $request->noBanc4;
                                $subto= $carrito[$x]["SubTotal"];
                                $tipoPago= 4;
                   
                    }elseif($request->tipoPago==5){
                        //si es compuesto
                        
                        if($request->cpago==1){
                            //1 cuota
                                /* 
                                        $item->cargarItems( $carrito[$x]["Nombre"], 
                                                            $carrito[$x]["Codigo"],
                                                            $carrito[$x]["Cantidad"], 
                                                            //$carrito[$x]["Precio"],
                                                            $request->tarje1 + $request->noBanc + $request->eft,
                                                            $carrito[$x]["Imei"],
                                                            $cantF,
                                                            $carrito[$x]["Descuento"]);
                                        $subtot= $subtot + $request->tarje1 + $request->noBanc +$request->eft; 
                                */
                                        $precio= $request->tarje1 + $request->noBanc + $request->eft;
                                        $subto= $carrito[$x]["SubTotal"];
                                        $tipoPago= 51;
                                        
                        }
                        
                        elseif($request->cpago==2){
                            //3 cuota
                            /* 
                                        $item->cargarItems( $carrito[$x]["Nombre"], 
                                                            $carrito[$x]["Codigo"],
                                                            $carrito[$x]["Cantidad"], 
                                                            //$carrito[$x]["Precio"],
                                                            ($request->tarje2 * 3) + $request->noBanc + $request->eft,
                                                            $carrito[$x]["Imei"],
                                                            $cantF,
                                                            $carrito[$x]["Descuento"]);
                                        $subtot= $subtot + $request->tarje1 + $request->noBanc +$request->eft; 
                            */
                                        $precio= ($request->tarje2 * 3) + $request->noBanc + $request->eft;
                                        $subto= $carrito[$x]["SubTotal"];
                                        $tipoPago= 52;
                        }
                        elseif($request->cpago==3){
                            //6 cuota
                                /* 
                                        $item->cargarItems( $carrito[$x]["Nombre"], 
                                                            $carrito[$x]["Codigo"],
                                                            $carrito[$x]["Cantidad"], 
                                                            //$carrito[$x]["Precio"],
                                                            $request->tarje1 + $request->noBanc +$request->eft,
                                                            $carrito[$x]["Imei"],
                                                            $cantF,
                                                            $carrito[$x]["Descuento"]);
                                        $subtot= $subtot + $request->tarje1 + $request->noBanc +$request->eft; 
                        */
                                        $precio= $request->tarje1 + $request->noBanc +$request->eft;
                                        $subto= $carrito[$x]["SubTotal"];
                                        $tipoPago= 53;
                        }
                        elseif($request->cpago==4){
                            //12 cuota
                            
                                        $precio= $request->tarje1 + $request->noBanc +$request->eft;
                                        $subto= $carrito[$x]["SubTotal"];
                                        $tipoPago= 54;
                        }
                        else{
                            
                            $precio= $carrito[$x]["Precio"];
                            $subto= $carrito[$x]["SubTotal"];
                            $tipoPago= 5;
                        }
                    }elseif($request->tipoPago==6){
                        $precio= $carrito[$x]["Precio"];
                        $subto= $carrito[$x]["SubTotal"];
                        $tipoPago= 6; 
                        
                    }elseif($request->tipoPago==7){
                        //$precio= $carrito[$x]["Precio"];
                        $precio= $request->ctacte + $request->eft7;
                        $subto= $carrito[$x]["SubTotal"];
                        $tipoPago= 7; 
                        
                    }
                    
                    $item->cargarItems( $carrito[$x]["Nombre"], 
                                        $carrito[$x]["Codigo"],
                                        $carrito[$x]["Cantidad"], 
                                        $precio,
                                        $carrito[$x]["Imei"],
                                        $cantF,
                                        $carrito[$x]["Descuento"],
                                        $carrito[$x]["Numero"]);
                                        
                    $subtot= $subtot +  $subto - $carrito[$x]["Descuento"];

                    //vendo art y descuento stock
                    $art->vender_articulo($carrito[$x]["Cantidad"], $x);
                }   
        }

        $tot= $tot + $subtot;
        $iva= ($subtot * 0.173554);
        $subtot= $tot - $iva;
        
              
        //revisar tot subt e iva si es con tarjeta + 18
        //dd($tipoPago);
        $fact->generarFactura($request, $contItems, $subtot, $tot, $iva, $tipoPago);
        
        $dnicliente= $clie->dni;
        
        $cta->nuevoMov($fact->getLastFact());

        // exporto any2cabe, any2iva, llamo any2fe, y subo resp cae     
        //escribo any2cabe y any2iva 
        $csv->crearCsv($dnicliente, $tot, $iva);
        $csvIva->crearCsvIva($subtot, $iva);

        session()->forget('carrito');
        session()->forget('cliente_id');
        
        return view ('dashboard');
    }

    public function VentaImpresion(Request $request) {
    
        $this->finalizarVenta($request);

        $fact= new Factura();
        $fact->getLastFact();
        $fact->imprimirRemit($fact->id);
    }

   
}
      
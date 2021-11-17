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
        //$precioNoBanc= $request->noBancaria5;
        //dd($ultArt->id);

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
                    if($request->tipoPago==4){

                        $item->cargarItems( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            $carrito[$x]["PrecioT"],
                                            //$carrito[$x]["Art_id"],
                                            $carrito[$x]["Imei"],
                                            $cantF);
                                            
                                            //$subtot= $subtot + $carrito[$x]["SubTotalT"];
                                            $subtot= $subtot + 
                                                     $carrito[$x]["SubTotalT"] -
                                                     $carrito[$x]["Descuento"];

                    }elseif($request->tipoPago==5){

                        $item->cargarItems( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            //$carrito[$x]["Art_id"],
                                            $carrito[$x]["Imei"],
                                            $request->noBancaria5,
                                            $cantF);
                                            
                                            $subtot= $subtot + $request->noBancaria5;
                                            
                    }elseif($request->tipoPago==6){
                            if($request->fpagoa==1){
                                            $item->cargarItems( $carrito[$x]["Nombre"], 
                                                                $carrito[$x]["Codigo"],
                                                                $carrito[$x]["Cantidad"], 
                                                                $request->tarje1, 
                                                                $carrito[$x]["Imei"],
                                                                $cantF);
                                            $subtot= $subtot + $request->tarje1; 

                            } elseif($request->fpagoa==2){
                                $item->cargarItems( $carrito[$x]["Nombre"], 
                                                    $carrito[$x]["Codigo"],
                                                    $carrito[$x]["Cantidad"], 
                                                    $request->tarje1, 
                                                    $carrito[$x]["Imei"],
                                                    $cantF);
                                $subtot= $subtot + $request->tarje1; 
                                
                            }else{
                                $item->cargarItems( $carrito[$x]["Nombre"], 
                                                    $carrito[$x]["Codigo"],
                                                    $carrito[$x]["Cantidad"], 
                                                    $request->tarje1, 
                                                    $carrito[$x]["Imei"],
                                                    $cantF);
                                    $subtot= $subtot + $request->tarje1; 

                            }


                    }else{
                        //dd($request);
                        $item->cargarItems( $carrito[$x]["Nombre"], 
                                            $carrito[$x]["Codigo"],
                                            $carrito[$x]["Cantidad"], 
                                            $carrito[$x]["Precio"],
                                            //$carrito[$x]["Art_id"], 
                                            $carrito[$x]["Imei"],
                                            $cantF);
                                            
                                            //$subtot= $subtot + $carrito[$x]["SubTotal"];
                                            $subtot= $subtot + 
                                            $carrito[$x]["SubTotal"] -
                                            $carrito[$x]["Descuento"];
                    }
                    
                    //subt= cant * precioUnit;
                    
                    //$subtot= $carrito[$x]["SubTotal"];
                    
                    /* $tot= $tot + $subtot;
                    $iva= ($subtot * 0.173554);
                    $subtot= $tot - $iva; */
                    
                    
                    //vendo art y descuento stock
                    $art->vender_articulo($carrito[$x]["Cantidad"], $x);
                }   
        }

        $tot= $tot + $subtot;
        $iva= ($subtot * 0.173554);
        $subtot= $tot - $iva;
        
        // exporto any2cabe, any2iva, llamo any2fe, y subo resp cae           
        //revisar tot subt e iva si es con tarjeta + 18
        //dd($subtot, $tot, $iva);
        $fact->generarFactura($request, $contItems, $subtot, $tot, $iva);
    
        
        //escribo any2cabe y any2iva 
        $cli_id= session()->get('cliente_id'); 
        $clie= Cliente::FindorFail($cli_id);  
        $dnicliente= $clie->dni;
                
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
      
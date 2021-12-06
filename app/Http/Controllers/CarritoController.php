<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\Articulo;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    //chek si existe carrito o no
    public function __construct()
    {
        if(!session()->has('carrito')) session()->put('carrito', array());
    }

    public function agregar($id){
        
        $articulo= Articulo::Findorfail($id);
        
        $carrito= session()->get('carrito');
        
        //si carro vacio, es 1 Articulo d ese tipo y verifico disponibilidad
            if(!$carrito){
                $carrito= [
                    $id => [
                        "Art_id"    => $articulo->id,
                        "Nombre"    => $articulo->nombre,
                        "Cantidad"  => 1,
                        "Precio"    => $articulo->precioVenta,
                        "PrecioT"   => $articulo->pVentaTarj,
                        "Disponible"=> $articulo->cantidad,
                        "SubTotal"  => $articulo->precioVenta,
                        "SubTotalT" => $articulo->pVentaTarj,
                        "Iva"       => $articulo->iva,
                        "Codigo"    => $articulo->codigo,
                        "Descuento" => 0,
                        "Imei"      => $articulo->imei,
                        //"Descuento" => $articulo->descuento,
                        //"Cliente_id"=> 0,
                        /* "Imagen" => $Articulo->Imagen */
                        ]
                    ];

                    if( ($carrito[$id]['Disponible']) > ($carrito[$id]['Cantidad']) ||
                        ($carrito[$id]['Disponible']) == ($carrito[$id]['Cantidad'])){

                        session()->put ('carrito', $carrito);
                        return redirect()->back()->with('mensaje', 'Artículo agregado al carrito');
                    }else{

                        return redirect()->back()->with('mensaje', 'Stock insuficiente ');
                    }
            }

            //si carrito ya tiene ese item agrego otro 
            if(isset($carrito[$id])) {
                    $carrito[$id]['Cantidad']++;
                    $carrito[$id]['SubTotal'] = $carrito[$id]['Cantidad'] * $carrito[$id]['Precio'];
                    $carrito[$id]['SubTotalT'] = $carrito[$id]['Cantidad'] * $carrito[$id]['PrecioT'];
                    //$carrito[$id]['SubTotal']= $carrito->subtotal();
                    $carrito[$id]['Iva'] += $carrito[$id]['Iva'];

                    /* session()->put('carrito', $carrito);
                    return redirect()->back()->with('mensaje', ' Articulo mismo item agregado al carrito');
                     */
                    if( ($carrito[$id]['Disponible']) >= ($carrito[$id]['Cantidad']) ){
                        
                        session()->put ('carrito', $carrito);
                        return redirect()->back()->with('mensaje', 'Artículo agregado al carrito');
                    }else{
                        
                        return redirect()->back()->with('mensaje', 'Stock insuficiente ');
                    }
            }

            //si item no existe lo agrego
            $carrito[$id] = [
                "Art_id" => $articulo->id,
                "Nombre" => $articulo->nombre,
                "Cantidad" => 1,
                "Precio" => $articulo->precioVenta,
                "PrecioT" => $articulo->pVentaTarj,
                "Disponible"=> $articulo->cantidad,
                "SubTotal" => $articulo->precioVenta,
                "SubTotalT"  => $articulo->pVentaTarj,
                "Iva"=> $articulo->iva,
                "Codigo"=> $articulo->codigo,
                "Descuento" => 0,
                "Imei"      => $articulo->imei,
                //"Descuento" => $articulo->descuento,
                //"Cliente_id"=> 0,
                /* "Imagen" => $Articulo->Imagen */
                ];
            
                
            if( ($carrito[$id]['Disponible']) > ($carrito[$id]['Cantidad']) ||
                ($carrito[$id]['Disponible']) == ($carrito[$id]['Cantidad'])){

                    session()->put ('carrito', $carrito);
                    return redirect()->back()->with('mensaje', 'Articulo agregado al carrito');
                }else{

                    return redirect()->back()->with('mensaje', 'Stock insuficiente ');
                }
    }

    public function selectImei( Request $request){
        
        $art= Articulo::FindorFail($request->item_id);
        
        $art->imei= $request->imei_det;
         
        $art->save();  

        //$cart= new Carrito();
        $this->agregar($request->item_id);
        
        return back()         
                ->with ('mensaje', 'Imei seleccionado');
    
    }

    public function selectNumero( Request $request){
        //dd($request);
        $art= Articulo::FindorFail($request->item_id);
        
        $art->numero= $request->num_det;
         
        $art->save();  

        //$cart= new Carrito();
        $this->agregar($request->item_id);
        
        return back()         
                ->with ('mensaje', 'Numero seleccionado');
    
    }

    public function setDescuento(Request $request)
    {
        $carrito= session()->get('carrito');
          //si carrito ya tiene ese item incluyo desc
          if(isset($carrito[$request->id])) {

            $carrito[$request->id]['Descuento']= $request->descuento;
            session()->put ('carrito', $carrito);
            
          }
          $this->subtotal();
          $this->subtotalT();
          
        return redirect()->back()->with('mensaje', 'Descuento aplicado');

    }
    
    public function eliminarCarr($id)
    {
        $articulo= Articulo::Findorfail($id);
        $carrito= session()->get('carrito');

        //si carrito ya tiene ese item borro uno
        if(isset($carrito[$id])) {
            $carrito[$id]['SubTotal'] = $carrito[$id]['SubTotal'] - $carrito[$id]['Precio'];
            $carrito[$id]['SubTotalT'] = $carrito[$id]['SubTotalT'] - $carrito[$id]['PrecioT'];
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
        $total= $this->subtotal();
        $totalTar= $this->subtotalT();

        $cli_id= session()->get('cliente_id'); 
        //$clie= Cliente::FindorFail($cli_id);   
         
        if (!isset ($cli_id)){
            $clie= "Sin seleccionar";
        }else{
          //  $cli_id= session()->get('cliente_id'); 
            $clie= Cliente::FindorFail($cli_id);  
        }     
        //dd($clie);
        return view ('venta/verCarrito', compact('total', 'clie', 'totalTar')); 
    }

    //funcion d prueba para trabajar final carrito, operar e insertar datos en base
    public function verSession()
    {
        dd( session()->get('carrito'));       
    }

    public function borrarCarr(){
        session()->forget('carrito');
        return view ('venta/verCarrito');
    }

    public function subtotal(){
    //acumulo precios ef
        $carrito= session()->get('carrito');
        $subtotal= 0;
        foreach ($carrito as $item){
            //$subtotal += $item["SubTotal"];
            $subtotal += $item["SubTotal"]-$item["Descuento"];
        } 
        return $subtotal;
    }

    public function subtotalT(){
    //acumulo precio tarj
        $carrito= session()->get('carrito');
        $subTar= 0;
        foreach ($carrito as $item){
            //$subTar += $item["SubTotalT"];
            $subTar += $item["SubTotalT"]-$item["Descuento"];
        } 
        return $subTar;
    }

    public function iva(){
        $carrito= session()->get('carrito');
        $iva= 0;
        foreach ($carrito as $item){
            $iva += $item["Iva"];
        }
        return $iva;
    }
    
    public function detallePedido(){
        
        $carrito= session()->get('carrito');
        $iva= $this->iva();
        $total= $this->subtotal();
        $totalTar= $this->subtotalT();
        $subtotal= (($this->subtotal())- $iva);
        $cli_id= session()->get('cliente_id'); 
        $clie= Cliente::FindorFail($cli_id);  
        
        return view('venta/detallePedido', compact('subtotal', 'carrito', 'total', 
                    'clie', 'totalTar'));
    }

    public function totalesCarrito(){
        
        $carrito= session()->get('carrito');
        $iva= $this->iva();
        $total= $this->subtotal();
        $subtotal= (($this->subtotal())- $iva);
        
        //return ($subtotal, $total, $iva);
    }

}

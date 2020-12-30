<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
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
                        "Art_id" => $articulo->id,
                        "Nombre" => $articulo->nombre,
                        "Cantidad" => 1,
                        "Precio" => $articulo->precioVenta,
                        "Disponible"=> $articulo->cantidad,
                        "SubTotal" => $articulo->precioVenta,
                        "Iva"=> $articulo->iva,
                        /* "Imagen" => $Articulo->Imagen */
                        ]
                    ];
                    if( ($carrito[$id]['Disponible']) > ($carrito[$id]['Cantidad']) ){
                        session()->put ('carrito', $carrito);
                        return redirect()->back()->with('mensaje', 'Articulo agregado al carrito');
                    }else{
                        return redirect()->back()->with('mensaje', 'Stock insuficiente');
                    }
            }

            //si carrito ya tiene ese item agrego otro 
            if(isset($carrito[$id])) {
                    $carrito[$id]['Cantidad']++;
                    $carrito[$id]['SubTotal'] += $carrito[$id]['SubTotal'];
                    $carrito[$id]['Iva'] += $carrito[$id]['Iva'];

                    /* session()->put('carrito', $carrito);
                    return redirect()->back()->with('mensaje', ' Articulo mismo item agregado al carrito');
                     */
                    if( ($carrito[$id]['Disponible']) >= ($carrito[$id]['Cantidad']) ){
                        session()->put ('carrito', $carrito);
                        return redirect()->back()->with('mensaje', 'Articulo agregado al carrito');
                    }else{
                        return redirect()->back()->with('mensaje', 'Stock insuficiente');
                    }
            }

            //si item no existe lo agrego
            $carrito[$id] = [
                "Art_id" => $articulo->id,
                "Nombre" => $articulo->nombre,
                "Cantidad" => 1,
                "Precio" => $articulo->precioVenta,
                "Disponible"=> $articulo->cantidad,
                "SubTotal" => $articulo->precioVenta,
                "Iva"=> $articulo->iva,
                /* "Imagen" => $Articulo->Imagen */
                ];
            
                
            if( ($carrito[$id]['Disponible']) > ($carrito[$id]['Cantidad']) ){
                    session()->put ('carrito', $carrito);
                    return redirect()->back()->with('mensaje', 'Articulo agregado al carrito');
                }else{
                    return redirect()->back()->with('mensaje', 'Stock insuficiente g');
                }
    }
    
    public function eliminarCarr($id)
    {
        $articulo= Articulo::Findorfail($id);
        $carrito= session()->get('carrito');

        //si carrito ya tiene ese item borro uno
        if(isset($carrito[$id])) {
            $carrito[$id]['SubTotal'] = $carrito[$id]['SubTotal'] - $carrito[$id]['Precio'];
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
        $subtotal= $this->subtotal();
        return view ('venta/verCarrito', compact('subtotal'));
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
        $carrito= session()->get('carrito');
        $subtotal= 0;
        foreach ($carrito as $item){
            $subtotal += $item["SubTotal"];
        }
        //dd($subtotal);
        return $subtotal;
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
        $subtotal= (($this->subtotal())- $iva);
        
        return view('venta/detallePedido', compact('subtotal', 'carrito', 'total'));
    }

}

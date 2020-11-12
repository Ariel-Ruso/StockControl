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
                        "Precio" => $articulo->precio,
                        "Disponible"=> $articulo->cantidad,
                        "SubTotal" => $articulo->precio,
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
                "Precio" => $articulo->precio,
                "Disponible"=> $articulo->cantidad,
                "SubTotal" => $articulo->precio,
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
        $total= $this->total();
        return view ('venta/verCarrito', compact('total'));
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

    public function total(){
        $carrito= session()->get('carrito');
        $total= 0;
        foreach ($carrito as $item){
            $total += $item["SubTotal"];
        }
        return $total;
    }

    public function detallePedido(){
        $total= $this->total();
        $carrito= session()->get('carrito');
        return view('venta/detallePedido', compact('total', 'carrito'));
    }

}

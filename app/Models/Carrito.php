<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Cantidad', 'Precio', 'SubTotal', 'Total', 'Art_id', 'SubTotalT', 'Descuento',
    ];

    /* public function setDesc(){
        $carrito= session()->get('carrito');
        $desc= 0;

    } */

    public function total(){
        $carrito= session()->get('carrito');
        $total= 0;
        foreach ($carrito as $item){
            $total += $item["SubTotal"];
        }
        return $total;
    }

    public function subtotal(){
        $carrito= session()->get('carrito');
        $subtotal= 0;
        foreach ($carrito as $item){
            $subtotal += $item["SubTotal"];
        } 
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

    public function subtotalT(){
        //acumulo precio tarj
            $carrito= session()->get('carrito');
            $subTar= 0;
            foreach ($carrito as $item){
                $subTar += $item["SubTotalT"];
            } 
            return $subTar;
        }
/* 
    public function verCarrito()
    {
        $total= $this->subtotal();
        $cliente= session()->get('cliente_id'); 

        if (!isset ($cliente)){
            $cliente= "Sin seleccionar";
        }
        
        return $total;
    } */
    
}

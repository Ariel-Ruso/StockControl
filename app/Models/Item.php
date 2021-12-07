<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'codigo', 'cantidad', 'precioUnit',
                            'imei', 'idFactura', 'idPresupuesto', 'idPedido'
        ];
    
    public function factura(){
        //articulo pertenece a una Categoria
        return $this->belongsTo (Factura::class); 
    }

/* <<<<<<< HEAD
    public function cargarItems( $nombre, $codigo, $cantidad, $precio, $imei, $cantF, $descuento ){
======= */
    public function cargarItems( $nombre, $codigo, $cantidad, $precio, $imei, $cantF, $descuento, 
                                $numero ){
//>>>>>>> calzados
         //escribo todos items d una factura
         //dd($precio);

         $item= new Item();
         
         $item->descripcion=  $nombre; 
         $item->codigo=       $codigo;
         $item->cantidad=     $cantidad; 
         $item->precioUnit=   $precio;
         $item->imei=         $imei;  
         $item->idFactura=    $cantF+1;
//<<<<<<< HEAD
         $item->descuento=    $descuento;
//=======
         $item->numero=       $numero;
//>>>>>>> calzados
         //$item->articulos_id= $Art_id;

         $item->save();

    }

    public function cargarItemsP( $nombre, $codigo, $cantidad, $precio, $cantP){

        //escribo todos items d un Presupuesto
        $item= new Item();
        
        $item->descripcion=  $nombre; 
        $item->codigo=       $codigo;
        $item->cantidad=     $cantidad; 
        $item->precioUnit=   $precio;
        $item->idPresupuesto=    $cantP+1;

        $item->save();

   }

   public function cargarItemsPe( $nombre, $codigo, $cantidad, $precio, $cantP){

    //escribo todos items d un Pedido
    $item= new Item();
    
    $item->descripcion=  $nombre; 
    $item->codigo=       $codigo;
    $item->cantidad=     $cantidad; 
    $item->precioUnit=   $precio;
    $item->idPedido=     $cantP+1;

    $item->save();

    }
}

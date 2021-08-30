<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['total', 'users_id', 'cantidadItems', 'tipoPago',
        
        
    ];

    public function guardarVenta( $tot, $id){
        
        $ven= new Venta();
        $ven->total= $tot;
        $ven->user_id= user()->auth();
        $ven->facturas_id= $id;
        $ven->save();

    }

    public function generarVenta(Request $request, $contItems, $subtot, $tot, $iva){

        $venta= new Venta();
        $fact->cantidadItems= $contItems;
        
        
        $fact->users_id= auth()->id();  
        $fact->total= $tot;  
        $fact->tipoPago= $request->tipoPago;
        $fact->dnicliente= $request->dnicliente;
        $fact->apellidoyNombre= $request->apellidoyNombre; 
        $fact->domicilioCliente=  $request->domicilioCliente;
        
        if ($request->tipoPago==4){
            $total= $tot + ($tot * 0.18);  
            $fact->total= $total;
            
            $subtotal=  $total / 1.21;
            $fact->subtotal= $subtotal;

            //$iva= $iva + ($iva * 0.18);
            $fact->iva= $total - $subtotal;
            /* $tot= $subtot;
            $iva= ($subtot * 0.173554);
            $subtot= $tot - $iva; */
            //    $fact->totalNoBanc= $request->noBancaria4;  

            //$fact->save();  
            }
        if ($request->tipoPago==5){
                $fact->totalNoBanc= $request->noBancaria5;
                $total= $request->noBancaria5;
                $fact->total= $total;
                
                $subtotal=  $total / 1.21;
                $fact->subtotal= $subtotal;

                $fact->iva= $total - $subtotal;    
            } 
        $fact->save();  

    }

    public function mostrarTodasFact()
    {
        $fact= Factura::all();       
        return $fact;
    }

    public function totalFact(){
        
        $facts= Factura::all();
        $totFact= 0;
        foreach($facts as $valu){
            $totFact= $totFact + $valu->total;
            }
            return ($totFact);
    }
        /*      
      public function imprimirFact($id)
    {
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        //traigo items con mismo id
        $items = Item::whereIn('idFactura', [$id]) ->get();

        $cae= FilecsvCae::FindorFail($id);
        dd($cae);
        $nfact= $cae->nrofact;
        
         //dd($nfact);
        //$nfact= "0003-0014717";

        $fecha= $fact->created_at;
        
        $cliente=$fact->apellidoyNombre;
        $domicilio= $fact->domicilioCliente;
        $dnicliente= $fact->dnicliente;
        $iva= $fact->iva;
        $subtotal= $fact->subtotal;
        $total= $fact->total;
        $descripcion= $fact->descripcion;
        
        return view ('facturas.facturaLH', compact('fecha', 'nfact', 'cliente', 
                    'domicilio', 'dnicliente', 'iva', 'subtotal', 'total',
                     'id', 'items'));
    }  */

    public function getLastFact(){
        
        $fact= Factura::all();

        $last= $fact->last(); 
        //dd($last);
        return ($last);
    }

    public function contarFact(){
        $fact= Factura::all();
        
        return(count($fact));
    }

    
}

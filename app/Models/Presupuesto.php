<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Presupuesto extends Model
{
    use HasFactory;

    public function generarPresupuesto(Request $request, $contItems, $tot){

        //$fact= new Factura();
        $presu= new Presupuesto();
        //$fact->cantidadItems= $contItems;
        $presu->cantidadItems= $contItems;
        ///$fact->subtotal= $subtot;

        //$fact->iva= $iva;
        $presu->users_id= auth()->id();  

        $presu->total= $tot;  

        $presu->tipoPago= $request->tipoPago;

        //$fact->numfact= 0;
        //$cli_id= session()->get('cliente_id'); 
        // $clie= Cliente::FindorFail($cli_id);  
        
        /*

        $fact->dnicliente= $clie->dni;
        $fact->apellidoyNombre= $clie->nombre; 
        $fact->domicilioCliente=  $clie->direccion;
         */
        if ($request->tipoPago==4){
            $total= $tot + ($tot * 0.18);  
            $presu->total= $total;
            
            //$subtotal=  $total / 1.21;
            //$fact->subtotal= $subtotal;

            //$iva= $iva + ($iva * 0.18);
            //$fact->iva= $total - $subtotal;
            /* $tot= $subtot;
            $iva= ($subtot * 0.173554);
            $subtot= $tot - $iva; */
            //    $fact->totalNoBanc= $request->noBancaria4;  

            //$fact->save();  
            }

        if ($request->tipoPago==5){
                //$fact->totalNoBanc= $request->noBancaria5;
                $presu->totalNoBanc= $request->noBancaria5;
                $total= $request->noBancaria5;
                $presu->total= $total;
                /* 
                $subtotal=  $total / 1.21;
                $fact->subtotal= $subtotal;

                $fact->iva= $total - $subtotal;     */
            } 
        $presu->save();  

    }
}


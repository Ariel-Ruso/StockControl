<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Factura extends Model
{
    use HasFactory;

    public function scopeNombre($query, $nombre){

        if($nombre){
            return $query->where('apellidoyNombre','like',"%$nombre%");
        }

    }

    public function scopeDni($query, $dni){

        if($dni){
            return $query->where('dnicliente','like',"%$dni%");
        }

    }

    public function scopePrecioI($query, $precioi){
        
            if($precioi){
                return $query->where('total', '>' ,"$precioi");
            }
    
        }

    public function scopePrecioF($query, $preciof){
    
            if($preciof){
                    return $query->where('total', '<'  ,"$preciof");
                }
        }

    public function scopeFechaI($query, $fechai){
        
            if($fechai){
                return $query->where('created_at', '>=' , "$fechai");
                                
            }
    
        }

    public function scopeFechaF($query, $fechaf){
    
            if($fechaf){
                    return $query->where('created_at', '<' , "$fechaf");
                }
        }

    public function generarFactura(Request $request, $contItems, $subtot, $tot, $iva){

        $fact= new Factura();

        $fact->cantidadItems= $contItems;
        $fact->subtotal= $subtot;
        $fact->iva= $iva;
        $fact->users_id= auth()->id();  
        $fact->total= $tot;  
        $fact->tipoPago= $request->tipoPago;
        $fact->numfact= 0;
        $cli_id= session()->get('cliente_id'); 
        $clie= Cliente::FindorFail($cli_id);  

        $fact->dnicliente= $clie->dni;
        $fact->apellidoyNombre= $clie->nombre; 
        $fact->domicilioCliente=  $clie->direccion;
        $fact->cuitcliente= $clie->cuit;

        /* if ($request->tipoPago==4){
            $total= $tot + ($tot * 0.18);  
            $fact->total= $total;
            
            $subtotal=  $total / 1.21;
            $fact->subtotal= $subtotal;

            //$iva= $iva + ($iva * 0.18);
            $fact->iva= $total - $subtotal;
            /* $tot= $subtot;
            $iva= ($subtot * 0.173554);
            $subtot= $tot - $iva; 
            //    $fact->totalNoBanc= $request->noBancaria4;  

            //$fact->save();  
            } 
            */
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

    public function buscarFact($dni){

        $res= DB::table('facturas')
            ->where ('dnicliente', '=', $dni)
            ->get();

            
        return $res;
           
    }

    
}

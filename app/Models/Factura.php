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

    public function generarFactura(Request $request, $contItems, $subtot, $total, $iva, $tipoPago){
        

        $fact= new Factura();
        $cpago= $request->cpago;
        $fact->cantidadItems= $contItems;
        $fact->subtotal= $subtot;
        $fact->iva= $iva;
        $fact->users_id= auth()->id();  
        $fact->total= $total;  
        $fact->tipoPago= $tipoPago;
        $fact->numfact= 0;
        $cli_id= session()->get('cliente_id'); 
        $clie= Cliente::FindorFail($cli_id);  
        
        $fact->clie_id= $clie->id;
        $fact->dnicliente= $clie->dni;
        $fact->apellidoyNombre= $clie->nombre; 
        $fact->domicilioCliente=  $clie->direccion;
        $fact->cuitcliente= $clie->cuit;
        //dd($tipoPago);
        if ($tipoPago==4){
            //pago no Bancaria
            $fact->totalNoBanc= $request->noBanc4;
            $total= $request->noBanc4;
            $fact->total= $total;
            
            $subtotal=  $total / 1.21;
            $fact->subtotal= $subtotal;
            $fact->iva= $total - $subtotal;    

        }elseif ($tipoPago==5) {
            //pago compuesto

                $fact->totalNoBanc= $request->noBanc;
                $fact->totalEft= $request->eft;
                $total= $request->noBanc + $request->eft;
                $fact->total= $total;

        }elseif ($tipoPago==51){

                $total= $request->noBanc + $request->eft + $request->tarje1;
                $fact->totalCuot=  $request->tarje1;
                $fact->totalNoBanc= $request->noBanc;
                $fact->totalEft= $request->eft;
                $fact->total= $total;
         
        }elseif ($tipoPago==52){

            $total= $request->noBanc + $request->eft + ($request->tarje2 * 3);
            $fact->totalCuot=  $request->tarje2;
            $fact->totalNoBanc= $request->noBanc;
            $fact->totalEft= $request->eft;
            $fact->total= $total;

        }elseif ($tipoPago==53){

            $total= $request->noBanc + $request->eft + ($request->tarje3 * 6);
            $fact->totalCuot=  $request->tarje3;
            $fact->totalNoBanc= $request->noBanc;
            $fact->totalEft= $request->eft;
            $fact->total= $total;
     
        }elseif ($tipoPago==54){

            $total= $request->noBanc + $request->eft + ($request->tarje4 * 12);
            $fact->totalCuot=  $request->tarje4;
            $fact->totalNoBanc= $request->noBanc;
            $fact->totalEft= $request->eft;
            $fact->total= $total;
        }

        $subtotal=  $total / 1.21;
        $fact->subtotal= $subtotal;
        $fact->iva= $total - $subtotal;    
        
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

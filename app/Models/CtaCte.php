<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtaCte extends Model
{
    use HasFactory;


protected $filablle= ['monto','clientes_id', 'facturas_id', 'montoAnt'

    ];
    
    public function cliente(){
        //cta pertenece a una Cliente
        return $this->belongsTo (Cliente::class); 
    }

    public function montoAnt($id){
        
        $fact= Factura::FindorFail($id);
        $ctas= CtaCte::all();

        
        foreach($ctas as $item){
            if($item->facturas_id == $fact->id){
                //return $item->montoAnt;
                return $item->total;
            }
        }


    }

    public function totalxCliente($clie_id){

        $ctas= ctaCte::all();
        $tot= 0;
        foreach($ctas as $item){
            if($item->clientes_id == $clie_id){
                $tot= $tot + $item->monto;
            }    
        }
        $clie= Cliente::Findorfail($clie_id);
        $clie->ctacte= $tot;
        $clie->save();
        return ($tot);
    }

    public function nuevoMov($fact)
    {
        $cta= new CtaCte();
        $cta->clientes_id= $fact->clie_id;
        $cta->facturas_id= $fact->id;


        
        if($cta->monto != 0){
            $cta->montoAnt= $cta->monto;
        }else{
            $cta->montoAnt= 0;
        }  


        if ($fact->tipoPago==1){
             //pago completo ef
            
            $cta->monto= 0;
            $cta->total= $this->totalxCliente($fact->clie_id);
            
        }elseif($fact->tipoPago==6){
            //pago a cta cte
            
            $cta->monto= -$fact->total;
            $cta->total= $this->totalxCliente($fact->clie_id);
            //$cta->montoAnt= $cta->monto;
            
        }elseif($fact->tipoPago==7){
            //pago compuesto
            
            $cta->monto= -($fact->total-$fact->totalEft);
            $cta->total= $this->totalxCliente($fact->clie_id);
            
            }  

        $cta->save();
        
    }
       
}

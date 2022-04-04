<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtaCte extends Model
{
    use HasFactory;


protected $filablle= ['monto','clientes_id', 'facturas_id'

    ];
    
    public function cliente(){
        //cta pertenece a una Cliente
        return $this->belongsTo (Cliente::class); 
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

        if ($fact->tipoPago==1){
             
            $cta->clientes_id= $fact->clie_id;
            $cta->facturas_id= $fact->id;
            $cta->monto= $fact->total;
            $cta->total= $this->totalxCliente($fact->clie_id);
            
            $cta->save();
            
        }elseif($fact->tipoPago==6){
            $cta->clientes_id= $fact->clie_id;
            $cta->facturas_id= $fact->id;
            $cta->monto= -$fact->total;
            $cta->total= $this->totalxCliente($fact->clie_id);
            
            $cta->save();

        }elseif($fact->tipoPago==7){
            $cta->clientes_id= $fact->clie_id;
            $cta->facturas_id= $fact->id;
            //$fact->totalEft
            $cta->monto= -($fact->total-$fact->totalEft);
            $cta->total= $this->totalxCliente($fact->clie_id);
            
            $cta->save();

            }  
        
    }
       

}

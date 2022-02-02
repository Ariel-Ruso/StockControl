<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Factura;
use App\Models\Gasto;
use Carbon\Carbon;

class Caja extends Model
{
    use HasFactory;

    protected $fillable =[
        'estado', 'montoIni', 'montoFin', 'totEfect', 'totTarj'
    ];

    public function user(){
        //caja pertenece a una User
        return $this->belongsTo (User::class); 
    }
    
    public function totalDia(){

        //calculo total diario ef + tarj - gastos
        $totFact= 0;
        $gas= new Gasto();
        $totGas= $gas->total();
        
        //dd($totGas);
        
        $todas= Factura::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();
        //dd($todas);
        
        foreach($todas as $valu){
            $totFact= $totFact + $valu->total;
        }
        
        return ($totFact - $totGas);
    }

    public function totalDiaEfect(){
        
        //calculo total diario efect - gastos
        $efect= 0;
        $totGast= 0;
        
        $todas= Factura::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();
        $gastos= Gasto::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        foreach($todas as $valu){    
            if($valu->tipoPago==1){
                $efect= $efect + $valu->total; 
            }
        }

        foreach($gastos as $valu2){
            $totGast= $totGast + $valu2->monto;
        }
//        dd($efect-$totGast);

        return ($efect-$totGast);
    }   

    public function totalDiaTarj(){
        
        //calculo total diario tarj
        
        $totTarj= 0;
        
        $todas= Factura::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();
        
        foreach($todas as $valu){    
            if($valu->tipoPago != 1){
                $totTarj= $totTarj + $valu->total; 
            }
        }

        return ($totTarj);
    }

    public function montoInicial(){

        //busco si caja inicial para este user
        $cajai= Caja::where('users_id', auth()->id())->get();
        $last= $cajai->last();
        //dd($last); 
        $montoIni= 0;
        $est= $this->estado();
        //si est= 0, cerrada o es 1 vez
        if($est == 0){
            $montoIn= 0;
        }
        if($last){
            $montoIni= $last->montoIni;
        }else{
            $montoIni= 0;
        }
        
        /* 
        foreach($cajai as $val){
            $caja= $val->montoIni;
            } */

        return ($montoIni);

    }
    
    public function estado(){

        $caja= Caja::all();
        $ultim= $caja->last();
        $resp= 0;
        //$ulths= ($ultim->updated_at)
          //      ->format('d/m/y H:i');
        
        //->format('H : i '));
        //->format('d/m/y')

            if( $ultim == null){ //no existe caja
                $resp= 0;
            }elseif ( $ultim->estado == 0){ //esta cerrada
                $resp= 0;
            }else{
            //elseif ( $ultim->estado == 1){//esta abierta, 
                $resp= 1;
                }
             $this->status($resp);
        
        //return ($status);
        return $resp;
    }

     public function status($resp){

        $caja= Caja::all();
        $ultim= $caja->last();

        if( $ultim == null){ //no existe caja
            $ulths= 0;
        }else{
            $ulths= ($ultim->updated_at)
                ->format('d/m/y H:i');
        }

        

        if($resp==1){
            $status= 'Abierta desde ' .$ulths;
        }else{
            $status= 'Cerrada desde ' .$ulths;

        }

        return $status;
    }
    
}

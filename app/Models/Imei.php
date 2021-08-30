<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Imei extends Model
{
    use HasFactory;

    protected $fillable = ['detalle' ];


    public function celular(){
        //imei pertenece a Celular
        return $this->belongsTo (Celular::class); 
    }

    
    public function cargarImeis( Request $request ){
        //escribo todos imeis d un celu
        //dd($cantF);

        $item= new Imei();
        
        $item->detalle=  $request->detalle; 
        $item->id_celular=       $request->id_celular;
        
        $item->save();

   }
}

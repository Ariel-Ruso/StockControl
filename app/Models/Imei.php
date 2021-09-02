<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Imei extends Model
{
    use HasFactory;

    protected $fillable = ['detalle', 'articulos_id' ];


    public function articulo(){
        //imei pertenece a articulo
        return $this->belongsTo (Articulo::class); 
    }

    public function scopeDetalle($query, $detalle){
        
        if($detalle){
            return $query->where('detalle', 'like', "%$detalle%" );
        }
        
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

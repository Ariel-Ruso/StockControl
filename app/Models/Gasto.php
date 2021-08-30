<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gasto extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'detalle'];

    
    public function user(){
        //gasto pertenece a un User
        return $this->belongsTo (User::class); 
    }

    public function total(){

        $gas= Gasto::all();
        $tot= 0;

        foreach($gas as $item){
            
            $tot= $tot + $item->monto; 
        }
        return $tot;
    }


}

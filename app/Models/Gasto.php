<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class gasto extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'detalle'];

    
    public function user(){
        //gasto pertenece a un User
        return $this->belongsTo (User::class); 
    }

    public function total(){

        //$gas= Gasto::all();
        $total= 0;
        $tot= Gasto::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        foreach($tot as $item){
            
            $total= $total + $item->monto; 
        }
        //dd($total);
        return $total;
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtaCte extends Model
{
    use HasFactory;


protected $filablle= ['monto'

];
    
    public function cliente(){
        //cta pertenece a una Cliente
        return $this->belongsTo (Ccliente::class); 
    }
}

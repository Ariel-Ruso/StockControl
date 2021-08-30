<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'dni', 'direccion', 'email', 'telefono', 'cuit',
        
    ];

    protected $guarded= [];

    public function scopeNombre($query, $nombre){

        if($nombre){
            return $query->where('nombre','like',"%$nombre%");
        }
    }

    public function scopeDni($query, $dni){

        if($dni){
            return $query->where('dni','like',"%$dni%");
        }
    }

    public function getClientexDNI($dni)
    {
        $clie= Cliente::where('dni','like', $dni)
                ->get();
        
        return ($clie);
        
       
    }

    
    

    
}

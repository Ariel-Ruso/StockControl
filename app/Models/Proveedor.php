<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'correo', 'contacto', 'direccion', 'telefono',
    ];
    
    public function articulo(){
        //Proveedor tiene varios articulos
        return $this->hasmany (Articulo::class);
    }
}

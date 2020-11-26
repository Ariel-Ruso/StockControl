<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;

    public function rols(){
        //articulo pertenece a una Rol
        return $this->belongsTo (Rol::class); 
    }
}

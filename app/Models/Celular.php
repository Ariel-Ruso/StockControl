<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celular extends Model
{
    use HasFactory;

    protected $fillable= [ 'nombre', 'cantidad', 'precioCompra', 'precioVenta', 'pVentaTarj', 
                            'marca', 'modelo', 'proveedors_id', 'codbar', 'codigo', 'iva',
                             'categorias_id'
    ];

    public function categoria(){
        //articulo pertenece a una Categoria
        return $this->belongsTo (Categoria::class); 
    }

    public function proveedor(){
        //articulo pertenece a un Proveedor
        return $this->belongsTo (Proveedor::class); 
    }

    public function scopeCategorias($query, $categorias) {
        
    	if($categorias && $categorias != 'Categorias...') {
    		return $query->where('categorias_id','like',"$categorias");
        }
    }   
    
}

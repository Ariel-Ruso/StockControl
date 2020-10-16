<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    public function categoria(){
        //articulo pertenece a una Categoria
        return $this->belongsTo (Categoria::class); 
    }
    
    public function proveedor(){
        //articulo pertenece a un Proveedor
        return $this->belongsTo (Proveedor::class); 
    }

  /*  public function scopeNombre($query, $nombre){

    if($nombre){
        return $query->where('nombre', 'like', "%$nombre%");
        
    }
   } */

    public function scopeBuscarpor($query, $tipo, $buscar) {
    	if ( ($tipo) && ($buscar) ) {
    		return $query->where($tipo,'like',"%$buscar%");
    	}
    } 
 
    public function scopeBuscarporCate($query, $categoria) {
        //dd($cates);
    	if($categoria) {
    		return $query->where('categorias_id','like',"$categoria");
        }
    } 
}

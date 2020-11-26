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

    //busquedas 
    public function scopeBuscarpor($query, $tipo, $buscar) {
    	if ( ($tipo) && ($buscar) ) {
    		return $query->where($tipo,'like',"%$buscar%");
    	}
    } 
 
    public function scopeBuscarporCate($query, $categoria) {
        
    	if($categoria) {
    		return $query->where('categorias_id','like',"$categoria");
        }
    } 
    
    //eventos
    public function vender_articulo($cant, $id)
    {
        /* $request-> validate ([
            'cantidad' => 'required',
            ]); */

        $art= Articulo::FindOrFail($id);
        //dd($art->cantidad);
        $art->cantidad -= $cant;
        $art->save();
        return back()->with('mensaje', 'Articulo vendido correctamente');    
    }
}

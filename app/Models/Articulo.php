<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Numero;
use Illuminate\Http\Request;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'cantidad', 'precioCompra', 'precioVenta', 'pVentaTarj', 'marca', 
            'modelo', 'categorias_id', 'proveedors_id', 'codbar', 'codigo', 'imei', 'iva',
    ];
    
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
        //verfi q no sean null

    	if ( isset($tipo) && isset($buscar) ) {
    		return $query->where($tipo,'like',"%$buscar%");
    	}

    } 
 
    public function scopeProveedores($query, $proveedores) {
        
    	if($proveedores && $proveedores != 'Proveedores...' ) {
    		return $query->where('proveedors_id','like',"$proveedores");
        }
    }   

     public function scopeCategorias($query, $categorias) {
        
    	if($categorias && $categorias != 'Categorias...') {
    		return $query->where('categorias_id','like',"$categorias");
        }
    }   

    public function scopeColor($query, $color){

        if($color){
             $num= Numero::where('color', 'like', "%$color%")
                ->get();
        $num="rojo";
                
            return $query->where('color', 'like', "%$color%");

        }

    }

    public function scopeNombre($query, $nombre){

        if($nombre){
            
            return $query->where('nombre','like',"%$nombre%");
        }

    }

    public function scopeCodigo($query, $codigo){

        if($codigo){
            return $query->where('codigo','like',"%$codigo%");
        }

    }

    public function scopeModelo($query, $modelo){

        if($modelo){
            return $query->where('modelo','like',"%$modelo%");
        }

    }

    public function scopeMarca($query, $marca){

        if($marca){
            return $query->where('marca','like',"%$marca%");
        }

    }

    public function scopePrecioI($query, $precioi){
    //revisar logica
        if($precioi){
            return $query->where('precioVenta', '>' ,"$precioi");
        }

    }

    public function scopePrecioF($query, $preciof){
        //revisar logica
            if($preciof){
                return $query->where('precioVenta', '<'  ,"$preciof");
            }
    }

    public function vender_articulo($cant, $id){
    
        $art= Articulo::FindOrFail($id);
        $art->cantidad -= $cant;
        
        $cates= Categoria::all();
        //si es celular
        if( $cates[ ($art->categorias_id)-1 ]->nombre == "Celulares" ){
            $imei= Imei::query()
                ->detalle ($art->imei)
                ->get();
            //dd($imei);
            $imeiD= Imei::Find($imei[0]->id);
            $imeiD->delete();

            $art->imei= null;
            //$art->save();
        
        }
        //si es calzado, vendo d 1 par
        if( $cates[ ($art->categorias_id)-1 ]->nombre == "Calzados" ){
          
            $num= Numero::Find($art->numero);
            $num->cantidad --;
            $art->numero= null;
            $num->save();            
        }
        
        $art->save();
        
        return back()->with('mensaje', 'Artículo vendido correctamente');    
    }

        
    public function getLastArt(){
        $art= Articulo::all();
        $ultArt= $art->last();
        //$ultArt= count($art);
        if (!isset ($ultArt)){
            $res= 0;
        }else{
            $res= $ultArt;
        }
        return ($res);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class FilecsvIva extends Model
{
    use HasFactory;
    
    //eventos
    public function crearCsvIva(float  $gravado, float $impuesto)
    {
        $csvIva= new FilecsvIva();

        $codigo= 5;
        
        $csvIva->codigo= $codigo;
        $csvIva->gravado= $gravado;
        $csvIva->impuesto= $impuesto;

        $csvIva->save();
    }

    public function escribirIva($id){

        $listab = DB::select('select codigo, gravado, impuesto from filecsv_ivas 
        where id = ?', [$id]);
        
        $fp2 = fopen('any2iva.csv', 'w');
        
        foreach ($listab as $camposb) {
            fputcsv($fp2,(array) $camposb);
        }
        
        fwrite($fp2,chr(10).chr(13));
        fclose($fp2);
    }
}

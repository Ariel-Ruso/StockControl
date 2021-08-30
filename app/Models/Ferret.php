<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ferretImport;

class Ferret extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'codigo', 'articulo', 'rubro', 'bulto', 'plista', 'ppublico'
    ];

    public $timestamps = false;

    public function importarLista( $request)
    {
        $file= $request->file('csv_file');
        
        try{
            Excel::import(new ferretImport, $file);
            
        }
        catch(Exception $e ){
            
        }finally{
            return 0;
            
        }    
                
    }
}

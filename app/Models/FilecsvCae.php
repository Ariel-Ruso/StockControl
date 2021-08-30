<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\csvImportCae;
use App\Exceptions\CustomException;
use Illuminate\Http\File;
use Illuminate\Filesystem\Filesystem;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/* 
RESULTADO DE LA TRANSACCION: “any2cae”
1 cuit:	numérico, entero        30814126
2 cae:		alfabético          71067572105203
3 nrofact:	alfabético          14849
4 vtocae:	alfabético          20210220
5 result:                       A
6 obscodigo:	alfabético      null
7 obsdescrip:	alfabético      null
8 codbar:	alfabético          202089188270060000371067572105203202102203

1 Cuit o Documento del Comprobante Autorizado
El mismo que se detalló en any2cabe.csv.
2 Nro de C.A.E. Código de Autorización Electrónica emitido por la AFIP
3 Nro. de Comprobante Autorizado Nro. de Comprobante (factura, nd, nc) asignado por la AFIP.
4 Fecha de Vencimiento del CAE Fecha de Vencimiento del C.A.E. asignada por la AFIP. Formato
AAAAMMDD.
5 Resultado “A”:aceptado “R”:rechazado “P”:parcialmente aceptado.
6 Código de Observaciones En caso de comprobante aceptado con observaciones, código de
la observación.
7 Descripción de Observaciones Descripción de las observaciones.
8 Código de Barras String del código de barras a imprimir en el comprobante.
String código QR */

class FilecsvCae extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuit', 'obscodigo', 'obsdescrip', 'nrofact', 'vtocae', 'cae', 'codbar', 'result'
    ];

    public function crearCae()
    {
        $cae= new FilecsvCae();
        
        $cae->cuit= $cuit;
        $cae->cae= $cae;
        $cae->nrofact= $nrofact;
        $cae->vtocae= $vtocae;
        $cae->result= $result;
        $cae->obscodigo= $obscodigo;
        $cae->obsdescrip= $obsdescrip;
        $cae->codbar= $codbar;

        $cae->save();
    }

    public function existeCae(){

        $cae = public_path() .'\any2cae.csv';
        
        //$caePath = "any2cae.csv";

        //$directoryPath = "public_path()/".$caePath;

        //if($caePath::exists($directoryPath))
        if (file_exists($cae)){
            //echo "si exist";
            
            $res=1;
            } else {  
                //echo "not exists";   
                $res= 0;
                }
        return $res;
    }

    public function importarCaeCsv()
    { 
        $cae = public_path() .'\any2cae.csv';
       
        try{
            Excel::import(new csvImportCae, 'any2cae.csv');
        }
        catch(Exception $e ){
            return 1;
            
        }finally{
            return 0;
            
        }
        //File::delete($cae);
        $cae::delete;

        //dd(Storage::exists('cae'));
        //$contents = ('any2cae.csv')->getContents();

        //$directoryPath = $imagepath;
            /*                
            if(  (Storage::exists($cae)== 'true')){
                //echo "n exist"; die();

                Excel::import(new csvImport, 'any2cae.csv');
                return ('si esta');
                }  */
            
    }

    public function getLastCae(){
        
        $cae= FilecsvCae::all();
        $cae = FilecsvCae::query()
        ->select(['id', 'cuit', 'cae', 'nrofact', 'vtocae', 'result', 'obscodigo',
            'obsdescrip', 'codbar'])
        ->get();

        $last= $cae->last();
        return ($last);
    }

    public function todosCaes(){

        $cae= FilecsvCae::all();
        return ($cae);
    }

    public function contarCaes(){
        $cae= $this->todosCaes();
        
        return(count($cae));
    }

    public function deleteUltCae(){

        $cae= FilecsvCae::all();
        $ult= $cae->last(); 
        //dd($ult);
        $ult->delete();

    }

    public function getPenCae(){

        $cae= FilecsvCae::all();
        $ult= $cae->last(); 
        return ($ult);
    }

    public function chekId($id){
        $cae= $this->getLastCae();

        //dd($cae);
        if ($id == $cae->id){

            
        }else{
            $cae->id= $id;
            $cae->save();
        }
    }
    
}

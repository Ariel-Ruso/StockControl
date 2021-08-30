<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\csvImport;
use App\Exceptions\CustomException;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class TestCae extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuit', 'obscodigo', 'obsdescrip', 'nrofact', 'vtocae', 'cae', 'codbar', 'result'
    ];

    public function importarCaeCsv(){
    
        //$cae = public_path() .'\any2cae.csv';
       
        //Excel::import(new csvImport, 'any2cae.csv') ?? throw new Exception();
        //dd($cae);
         
            $res= 0;
            Excel::import(new csvImport, 'any2cae.csv');
        
        $res = 1;
        
        
        //trata d importar cae
        try{
            //Storage::putFile('cae', new File($cae), 'public');
            Excel::import(new csvImport, 'any2cae.csv');
            
            }
            catch(Exception ){
                $res = 1;
                //mensaje("No hay nuevo CAE, intente nuevamente");

            } 

        return $res ;
         
    }

    public function getLastCae(){
        
        $cae= TestCae::all();
        $cae = TestCae::query()
        ->select(['cuit', 'cae', 'nrofact', 'vtocae', 'result', 'obscodigo',
            'obsdescrip', 'codbar'])
        ->get();

        $last= $cae->last();
        return ($last);
    }

    public function todosCaes(){

        $cae= TestCae::all();
        return ($cae);
    }

    public function contarCaes(){
        $cae= $this->todosCaes();
        //dd(count($cae));
        return(count($cae));
    }

    public function deleteUltCae(){

        $cae= TestCae::all();
        $ult= $cae->last(); 
        //dd($ult);
        $ult->delete();

    }

    public function getPenCae(){

        //$cae= TestCae::all();
        $cont= $this->contarCaes();
        //dd($cont);
        
        $pen= TestCae::FindorFail($cont-1); 
        //dd($pen);
        return ($pen);
    }

    public function comparoCaes(){

        //importo cae  
        //$res= $this->importarCaeCsv();
        $cant=  $this->contarCaes();
        //dd($cant);
                    
           
        if( $cant == 1){
            return 0;
            //dd('primer cae');
        }elseif($cant > 1){
            $penCae=  $this->getPenCae()->nrofact;
            $ultCae=  $this->getLastCae()->nrofact;
            //dd($ultCae, $penCae);
            if ($ultCae == $penCae){
                //$this->deleteUltCae();
                return 1;
            }
        }    
        

    }

    
}

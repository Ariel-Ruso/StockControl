<?php

namespace App\Imports;


use App\Models\TestCae;
use Maatwebsite\Excel\Concerns\ToModel;

class csvImport implements ToModel
{
    /* 
        RESULTADO DE LA TRANSACCION: “any2cae”

        1 cuit:	        numérico, entero    
        2 cae:		    alfabético          
        3 nrofact:	    alfabético      
        4 vtocae:	    alfabético          
        5 result:       alfabético                          
        6 obscodigo:	alfabético      
        7 obsdescrip:	alfabético      
        8 codbar:	    alfabético   
*/

    
    public function model(array $row)
    {
        return new TestCae([
            'cuit'      => $row[0],
            'cae'       => $row[1],
            'nrofact'   => $row[2],
            'vtocae'    => $row[3],
            'result'    => $row[4],
            'obscodigo' => $row[5],
            'obsdescrip'=> $row[6],
            'codbar'    => $row[7],
        ]);
        
    }
}

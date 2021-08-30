<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Filecsv extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'ptovta', 'tipocomp', 'concepto', 'fechacomp',
                'fechavto', 'fechadesde', 'fechahasta', 'cuit', 'tipodoc',
                'gravado', 'nogravado', 'exento', 'moneda', 'tipocambio', 'cantcomp'
        
    ];
    //public $timestamps = false;

    //eventos

    public function crearCsv(string $dnicliente, float $total, float $iva )
    {
        //fact B recibe tipo compr 6 ,dni, tipo doc 96
        $csv= new Filecsv();

        $ptovta= 3;
        $tipocomp= 6;
        $concepto= 1;
        $fechacomp= today()->format("Ymd");
        $fechavto= '';
        $fechadesde= '';
        $fechahasta= '';
        $cuit= $dnicliente;
        $tipodoc= 96;
        $subt= $total-$iva;
        $gravado= $subt;
        $nogravado= 0.00;
        $exento= 0.00;
        $moneda= 'PES';
        $tipocambio= 1.00;
        $cantcomp= 1;

        $csv->ptovta= $ptovta;
        $csv->tipocomp= $tipocomp;
        $csv->concepto= $concepto;
        $csv->fechacomp= $fechacomp;
        $csv->fechavto= $fechavto;
        $csv->fechadesde= $fechadesde;
        $csv->fechahasta= $fechahasta;
        $csv->cuit= $cuit;
        $csv->tipodoc= $tipodoc;
        $csv->gravado= $gravado;
        $csv->nogravado= $nogravado;
        $csv->exento= $exento;
        $csv->total= $total;
        $csv->moneda= $moneda;
        $csv->tipocambio= $tipocambio;
        $csv->cantcomp= $cantcomp;

        $csv-> save();
        
    }

    public function crearCsvA(string $cuitcliente, float $total, float $iva)
    {
        //fact a recibe tipo compr 1 ,cuit, tipo doc 80


        $csv= new Filecsv();

        $ptovta= 3;
        $tipocomp= 1;
        $concepto= 1;
        $fechacomp= today()->format("Ymd");
        $fechavto= '';
        $fechadesde= '';
        $fechahasta= '';
        $cuit= $cuitcliente;
        $tipodoc= 80;
        $subt= $total-$iva;
        $gravado= $subt;
        $nogravado= 0.00;
        $exento= 0.00;
        $moneda= 'PES';
        $tipocambio= 1.00;
        $cantcomp= 1;

        $csv->ptovta= $ptovta;
        $csv->tipocomp= $tipocomp;
        $csv->concepto= $concepto;
        $csv->fechacomp= $fechacomp;
        $csv->fechavto= $fechavto;
        $csv->fechadesde= $fechadesde;
        $csv->fechahasta= $fechahasta;
        $csv->cuit= $cuit;
        $csv->tipodoc= $tipodoc;
        $csv->gravado= $gravado;
        $csv->nogravado= $nogravado;
        $csv->exento= $exento;
        $csv->total= $total;
        $csv->moneda= $moneda;
        $csv->tipocambio= $tipocambio;
        $csv->cantcomp= $cantcomp;

        $csv-> save();
        
    }

    public function getMoneda(int $id)
    {
        $data= FileCsv::FindorFail($id); 
        $moneda= $data->moneda;
        return ($moneda);
    }

    public function escribirCabe($id){

        $lista = DB::select('select ptovta,tipocomp,concepto,fechacomp,fechavto,fechadesde,
        fechahasta,cuit,tipodoc,gravado,nogravado,exento,total,moneda,tipocambio,
        cantcomp, CONCAT(" ") from filecsvs where id = ?', [$id]);
    
        $fp = fopen('any2cabe.csv', 'w');
        foreach ($lista as $campos) {
                
            fputcsv($fp,(array) $campos) ;
            fwrite($fp,chr(10));
        }

        fwrite($fp,chr(10).chr(13));
        fclose($fp);
    
    }

}

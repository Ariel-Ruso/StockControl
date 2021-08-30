<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Qr extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
    ];
    /* 
    $table->integer('ver');
    $table->string('fecha');            
    $table->double('cuit', 11);
    $table->double('ptoVta', 5);
    $table->double('tipoCmp', 3); OBLIGATORIO – tipo de comprobante (según Tablas del sistema )
    $table->double('nroCmp', 8); 
    $table->decimal ('importe', 13, 2); 
    $table->string('moneda', 3);
    $table->decimal ('ctz', 13, 6); OBLIGATORIO – Cotización en pesos argentinos de la moneda utilizada (1 cuando la moneda sea pesos)
    $table->double('tipoDocRec', 2);
    $table->double('nroDocRec', 20);
    $table->string('tipoCodAut', 1); OBLIGATORIO – “A” para comprobante autorizado por CAEA, “E” para comprobante autorizado por CAE
    $table->double('codAut', 14);
 */
    public function crearQr(string $dnicliente, float $total, float $iva , string $nrofact,
        string $moneda, string $cuitEmi, string $fecha ){

        $ver= 1;
        //$fecha= today()->format("Y-m-d");
        $fecha= $fecha;
        $cuit= $cuitEmi;
        $ptoVta= 3;
        // 082	TIQUE FACTURA B
        $tipoCmp= '082';
        $nroCmp= $nrofact;
        $importe= $total;
        $moneda= $moneda;
        $ctz= 1;
        $tipoDocRec= 96;
        $nroDocRec= $dnicliente; 
        $tipoCodAut= 'E';
        //??
        $codAut= 70417054367476;

        $qr= new Qr();

        $qr->ver= $ver;
        $qr->fecha= $fecha;
        $qr->cuit= $cuit;
        $qr->ptoVta= $ptoVta;
        $qr->tipoCmp= $tipoCmp;
        $qr->nroCmp= $nroCmp;
        $qr->importe= $importe;
        $qr->moneda= $moneda;
        $qr->ctz= $ctz;
        $qr->tipoDocRec= $tipoDocRec;
        $qr->nroDocRec= $nroDocRec;
        $qr->tipoCodAut= $tipoCodAut;
        $qr->codAut= $codAut;

        $qr->save();
    }

    public function getLastQr(){
        
        $qr= Qr::all();
        
        $qr = Qr::query()
        ->select(['ver', 'fecha', 'cuit', 'ptoVta', 'tipoCmp', 'nroCmp', 'importe', 'moneda',
            'ctz', 'tipoDocRec', 'nroDocRec', 'tipoCodAut', 'codAut'])
        ->get();

        $last= $qr->last(); 
        
        //dd($last);

        $collection = collect($last);
        // convierto json
        //$jsoneado = json_encode($collection);
        $jsoneado= $collection->toJson();
        
                    
        return ($jsoneado);       
    }


}

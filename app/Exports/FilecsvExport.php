<?php

namespace App\Exports;

use App\Models\Filecsv;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class FilecsvExport implements FromQuery
{
    use Exportable;
    /* 
            $table->integer('ptovta');    3
            $table->integer('tipocomp');  6
            $table->integer('concepto');  1
            //$table->date('fechacomp');  hoy
            $table->string('fechacomp');  null
            $table->string('fechavto');   null
            $table->string('fechadesde'); null
            $table->string('fechahasta');
            $table->string('cuit');       30814126
            $table->integer('tipodoc');   96
            $table->float('gravado');     200.00
            $table->float('nogravado');   0.00
            $table->float('exento');      0.00
            $table->float('total');       242.00
            $table->string('moneda');     PES
            $table->float('tipocambio');  1.00
            $table->integer('cantcomp');  1
 */
    public function forId(int $id)
    {
      $this->id = $id;
      return $this;
    }

    public function query()
    {
      return Filecsv::query()->where('id', $this->id)->select([
             'ptovta', 
             'tipocomp', 
             'concepto',
             'fechacomp', 
             'fechavto', 
             'fechadesde', 
             'fechadesde', 
             'fechahasta', 
             'cuit', 
             'tipodoc', 
             'gravado',
             'nogravado', 
             'exento', 
             'total', 
             'moneda', 
             'tipocambio', 
             'cantcomp']);
    }
 
}

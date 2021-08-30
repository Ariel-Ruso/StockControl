<?php

namespace App\Exports;

use App\Models\FilecsvIva;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class FilecsvIvaExport implements FromQuery
{
    use Exportable;

    public function forId(int $id)
    {
      $this->id = $id;
      return $this;
    }
    
    public function query()
    {
      return FilecsvIva::query()
            ->where('id', $this->id)
            ->select(['codigo', 'gravado', 'impuesto']);
    }  


}

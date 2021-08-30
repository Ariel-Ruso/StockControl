<?php

namespace App\Imports;

use App\Models\Ferret;
use Maatwebsite\Excel\Concerns\ToModel;

class ferretImport implements ToModel
{
    
    public function model(array $row)
    {
        return new Ferret([
            'codigo'    => $row[0],
            'articulo'  => $row[1],
            'rubro'     => $row[2],
            'bulto'     => $row[3],
            'plista'    => $row[4],
            'ppublico'  => $row[5],
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function setEstado($id, $estado)
    {
        $pedi= Pedido::FindorFail($id);
        $pedi->estado= $estado;
        $pedi->save();

    }

    public function getEstado($id)
    {
        $pedi= Pedido::FindorFail($id);
        
        return ($pedi->estado);

    }

}

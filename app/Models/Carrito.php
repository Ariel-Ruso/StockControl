<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Cantidad', 'Precio', 'SubTotal', 'Total', 'Art_id'
    ];

    public function total(){
        $carrito= session()->get('carrito');
        $total= 0;
        foreach ($carrito as $item){
            $total += $item["SubTotal"];
        }
        return $total;
    }
}

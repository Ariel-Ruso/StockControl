<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clie= new Cliente();
        $clie->nombre= "Jorge";
        $clie->dni= "30658741";
        $clie->cuit= "20306587418";
        $clie->direccion= "Cattan city";
        $clie->telefono= "15887469";
        $clie->email= "aksdj@gmail";
        $clie->save();
        //
    }
}

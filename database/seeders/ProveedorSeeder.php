<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prove= new Proveedor();
        $prove->nombre= "Samsung";
        $prove->contacto= "Jorge";
        $prove->correo= "Jorge@micho";
        $prove->direccion= "Jachal 98345";
        $prove->save();
    }
}

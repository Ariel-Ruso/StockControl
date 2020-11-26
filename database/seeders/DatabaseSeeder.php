<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Rol;
use App\Models\Proveedor;
use App\Models\Articulo;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Articulo::factory(10)->create();
        $this->call(RolSeeder::class);
        //$user= User::factory()->times(6)->create();
        $proveedor= Proveedor::factory()->times(3)->create();
        $this->call(CategoriaSeeder::class);
        
        $articulo= Articulo::factory()->times(6)->create();

    }
}

<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Rol;
use App\Models\Proveedor;
use App\Models\Articulo;

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
        //Categoria::query()->delete;
        //Proveedor::query()->delete;
        //Rol::query()->delete;

        //Articulo::factory(10)->create();

        $this->call(CategoriaSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(ArticuloSeeder::class);

    }
}

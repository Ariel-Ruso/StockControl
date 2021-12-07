<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Respon;
use App\Models\Proveedor;
use App\Models\Articulo;
use App\Models\User;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        //$articulo= Articulo::factory()->times(7)->create();
        //$user= User::factory()->times(6)->create();
        //$user= User::factory()            ->times(1)->create();
               
        $proveedor= Proveedor::factory()            ->times(5)->create();        
        $this->call(CategoriaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(PropietarioSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ResponSeeder::class);
        Articulo::factory(10)->create();
    }
}

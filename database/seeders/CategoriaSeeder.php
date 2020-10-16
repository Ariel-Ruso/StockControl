<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $cate= new Categoria();
        $cate->nombre= "Colchones";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Pequeños Electrodomesticos";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Sonido";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Celulares";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Lavarropas";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Calefaccion";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Heladeras";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Led";
        $cate->save();


        $cate= new Categoria();
        $cate->nombre= "Rodados";
        $cate->save();

        $cate= new Categoria();
        $cate->nombre= "Mesas";
        $cate->save();
    
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Respon;

class ResponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $res= new Respon();
        $res->nombre= "Alexis";
        $res->save();
        $res= new Respon();
        $res->nombre= "Gaston";
        $res->save();
        $res= new Respon();
        $res->nombre= "Facundo";
        $res->save();
        $res= new Respon();
        $res->nombre= "Jose Luis";
        $res->save();

    }
}

<?php

namespace Database\Factories;

use App\Models\Articulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* 
         return [
                'nombre'=> $faker->sentence(5),
                'categorias_id'=>rand(4, 1),
                'proveedors_id'=>rand(1, 1),
                'cantidad'=>rand(2, 500),
                'precio'=> rand(3,5000),
                'created_at'=> now(),
            
        ]; */
    }
}

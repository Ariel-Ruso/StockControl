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
        
         return [
                'nombre'=> $this->faker->sentence(1),
                'descripcion'=> $this->faker->sentence(5),
                'marca'=> $this->faker->sentence(1),
                'modelo'=> $this->faker->sentence(1),
                'categorias_id'=>rand(10, 1),
                'proveedors_id'=>rand(4, 1),
                'cantidad'=>rand(2, 500),
                'precioCompra'=> rand(3,500),
                'precioVenta'=> rand(3,5000),
                'iva'=> rand(2,100),
                'codbar'=> rand(8,10000),
                'created_at'=> now(),
            
        ]; 
    }
}

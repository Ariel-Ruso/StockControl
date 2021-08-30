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
                'codigo' => rand(8,10000),
                'nombre'=> $this->faker->sentence(1),
                'descripcion'=> $this->faker->sentence(5),
                'marca'=> $this->faker->sentence(1),
                'modelo'=> $this->faker->sentence(1),
                'categorias_id'=>rand(10, 1),
                'proveedors_id'=>rand(3, 1),
                'cantidad'=>rand(2, 500),
                'precioCompra'=> rand(3,500),
                'precioVenta'=> rand(3,5000),
                'pVentaTarj' => rand(3,5000),
                'iva'=> rand(2,100),
                //'iva'=> 'precioVenta' + ('precioVenta' *0.21),
                'codbar'=> rand(8,1000000),
                //'codbar'=> $this->faker->Barcode,
                'created_at'=> now(),
            
        ];  
    }
}

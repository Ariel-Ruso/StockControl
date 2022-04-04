<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            //$clie= new Cliente();
            
            'nombre'=> $this->faker->sentence(1),
            
            'dni' => rand(8,10000),
            
            'cuit' => rand(11,10000),
            
            'direccion'=> $this->faker->address(3),
            
            'telefono' => $this->faker->phoneNumber(10),
            
            'email' => $this->faker->email(),
            'created_at'=> now(),
            ];
    }
}

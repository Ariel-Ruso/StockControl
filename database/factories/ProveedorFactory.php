<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->name,
            'contacto'=> $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'correo' => $this->faker->safeEmail,
            'direccion'=> $this->faker->address
        ];
    }
}

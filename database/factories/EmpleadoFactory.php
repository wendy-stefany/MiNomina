<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empleado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'             => $this->faker->randomNumber(9, true),
            'nombre'         => $this->faker->name(),
            'telefono'       => $this->faker->phoneNumber(),
            'departamento_id'=> $this->faker->numberBetween(4020,4022),
            'user_id'=> $this->faker->numberBetween(1, 10),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->email(),
            'fecha' => $this->faker->date('Y-m-d', 'now'),
            'sexo' => $this->faker->randomElement(['F', 'M']),
        ];
    }
}

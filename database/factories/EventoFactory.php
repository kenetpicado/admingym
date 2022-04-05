<?php

namespace Database\Factories;

use App\Models\Entrenador;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'tipo' => $this->faker->randomElement(['PAGO', 'INASISTENCIA']),
            'monto' => $this->faker->numerify('###'),
            'entrenador_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}

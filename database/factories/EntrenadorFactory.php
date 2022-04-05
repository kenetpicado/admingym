<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntrenadorFactory extends Factory
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
            'nombre' => $this->faker->name(),
            'telefono' => $this->faker->numerify('8#######'),
            'horario' => $this->faker->numerify('# am - # pm'),
        ];
    }
}

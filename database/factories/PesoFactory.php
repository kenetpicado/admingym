<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PesoFactory extends Factory
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
            'peso' => $this->faker->numerify('2##'),
            'cliente_id' => $this->faker->numberBetween(1, 15)
        ];
    }
}

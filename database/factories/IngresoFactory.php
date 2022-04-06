<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoFactory extends Factory
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
            'monto' => $this->faker->numerify('###'),
            'servicio' => $this->faker->randomElement(['PESAS', 'SPINNING', 'ZUMBA', 'TAEKWONDO']),
            'created_at' => $this->faker->dateTimeInInterval('-20 days', '+ 20 days', null),
        ];
    }
}

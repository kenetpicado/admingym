<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CajaFactory extends Factory
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
            'servicio' => $this->faker->randomElement(['PESAS', 'SPINNING', 'ZUMBA', 'TAEKWONDO']),
            'plan' => $this->faker->randomElement(['MENSUAL', 'QUINCENAL', 'SEMANAL']),
            'monto' => $this->faker->numerify('###'),
            'beca' => $this->faker->randomFloat(1, 0, 100),
            'nota' => $this->faker->text(20),
            'fecha_fin' => $this->faker->dateTimeInInterval('- 5 days', '+ 20 days', null),
            'cliente_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}

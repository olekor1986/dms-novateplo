<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaterMeterValue>
 */
class WaterMeterValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('2021-01-01', now())->format('Y-m'),
            'value' => strval(random_int(11111, 55555)),
            'after_check' => random_int(0, 1),
            'note' => $this->faker->word(),
            'water_meter_id' => random_int(1, 500),
        ];
    }
}

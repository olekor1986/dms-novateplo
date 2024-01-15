<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Source>
 */
class SourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        return [
        'address' => $this->faker->address(),
        'connected_power' => $this->faker->randomFloat(2, 0.5, 2),
        'gps' => strval($this->faker->randomFloat(6, 35.0, 35.013818)) . ',' .
            strval($this->faker->randomFloat(6, -88.297977, -88.0)),
        'source_type_id' => random_int(1, 4),
        'city_district_id' => random_int(1, 5),
        'user_id' => random_int(1, 9),
        ];
    }
}

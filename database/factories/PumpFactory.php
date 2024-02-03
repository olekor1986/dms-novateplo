<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pump>
 */
class PumpFactory extends Factory
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
            'title' => $this->faker->word(),
            'max_capacity' => $this->faker->randomFloat(1, 0.5, 10),
            'max_pressure' => $this->faker->randomFloat(0, 10, 50),
            'engine_power' => $this->faker->randomFloat(1, 2, 30),
            'engine_speed' => random_int(2500, 3000),
            'engine_title' => $this->faker->word(),
            'serial_number' => crc32($this->faker->word()),
            'index_number' => strval(random_int(1, 4)),
            'images' => '[{"0":["https://picsum.photos/400"]},{"1":["https://picsum.photos/400"]},{"2":["https://picsum.photos/400"]}]',
            'shaft_diam' => random_int(12, 50),
            'front_bearing_id' => random_int(1, 11),
            'rear_bearing_id' => random_int(1, 11),
            'mechanical_seal_id' => random_int(1, 6),
            'in_work' => boolval(random_int(0, 1)),
            'pump_type_id' => random_int(1, 10),
            'source_id' => random_int(1, 100)
        ];
    }
}

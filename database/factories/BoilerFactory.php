<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boiler>
 */
class BoilerFactory extends Factory
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
            'energy_carrier' => random_int(1, 2),
            'power' => $this->faker->randomFloat(2, 0.2, 2.5),
            'efficient' => $this->faker->randomFloat(2, 82, 96),
            'mount_year' => strval($this->faker->year()),
            'launch_year' => strval($this->faker->year()),
            'index_number' => strval(random_int(1, 5)),
            'serial_number' => strval(random_int(12456789, 99999999)),
            'reg_number' => strval(random_int(111, 999)),
            'check_date' => strval($this->faker->date()),
            'in_work' => boolval(random_int(0, 1)),
            'source_id' => random_int(1, 100),
            'boiler_fuel_id' => random_int(1, 4),
        ];
    }
}

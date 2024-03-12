<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Termwind\ValueObjects\capitalize;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaterMeter>
 */
class WaterMeterFactory extends Factory
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
            'title' => mb_strtoupper($this->faker->word()) . random_int(15, 50),
            'diameter' => random_int(15, 50),
            'serial_number' => crc32($this->faker->word()),
            'purpose' => random_int(1, 3),
            'check_date' => $this->faker->dateTimeBetween('2021-01-01', now())->format('Y-m'),
            'made_year' => $this->faker->dateTimeBetween('2015-01-01', now())->format('Y'),
            'condition' => random_int(1, 3),
            'note' => $this->faker->word(),
            'source_id' => random_int(1, 100),
        ];
    }
}

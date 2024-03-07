<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeatingPipeline>
 */
class HeatingPipelineFactory extends Factory
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
            'source_id' => random_int(1, 100),
            'pipe_start' => $this->faker->word(),
            'pipe_end' => $this->faker->word(),
            'direct_diam' => random_int(57, 108),
            'reverse_diam' => random_int(57,108),
            'length' => $this->faker->randomFloat(1, 5, 100),
            'purpose_type' => random_int(1, 3),
            'laying_type' => random_int(1, 2),
            'ins_type' => random_int(1, 2),
            'ins_cond' => random_int(1, 2),
            'ins_thick' => random_int(0, 50),
            'height' => $this->faker->randomFloat(1, 1, 6),
            'build_year' => strval($this->faker->year()),
            'note' => $this->faker->sentence(),
        ];
    }
}

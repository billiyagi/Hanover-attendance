<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'name' => $this->faker->name(),
            'range_start' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'range_end' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'attendance_id' => 1

        ];
    }
}

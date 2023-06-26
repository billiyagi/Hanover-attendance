<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'present_in' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'present_out' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'image' => 'https://picsum.photos/200/300',
            'user_id' => 1
        ];
    }
}

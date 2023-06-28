<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name'   => 'Hanover Attendance',
            'logo_print' => 'logo.png',
            'company_tagline' => 'The most easy attendance System',
            'company_address' => $this->faker->address,
        ];
    }
}

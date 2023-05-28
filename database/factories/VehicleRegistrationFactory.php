<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleRegistration>
 */
class VehicleRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '1',
            'name' => 'Audi',
            'number' => 'XXX-489',
            'distance' => '12',
            'latitude' => '0',
            'longitude' => '0',
        ];
    }
}

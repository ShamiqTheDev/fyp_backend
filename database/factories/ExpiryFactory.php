<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expiry>
 */
class ExpiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'vehicle_id' => '1',
            'part_id' => '1',
            'distance' => '0',
            'expiry' => '10',
            'notify_at' => '8',
            'note' => 'This is test record cerated by Database seeder developed by Shamiq.',
        ];
    }
}

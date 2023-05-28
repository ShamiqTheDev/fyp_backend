<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Part::factory(1)->create();
        \App\Models\VehicleRegistration::factory(1)->create();
        \App\Models\Expiry::factory(1)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()->create([
            "model" => "Revuelto",
            "brand" => "Lamborghini",
            "price" => 200000,
            "year" => 2024,
        ]);

        Car::factory()->create([
            "model" => "Roma",
            "brand" => "Ferrari",
            "price" => 200000,
            "year" => 2020,
        ]);

        Car::factory()->create([
            "model" => "CyberTruck",
            "brand" => "Testla",
            "price" => 100000,
            "year" => 2023,
        ]);
    }
}

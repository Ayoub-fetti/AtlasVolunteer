<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locations')->insert([
            ['place_name' => 'Casablanca', 'longitude' => -7.5898434, 'latitude' => 33.5731104],
            ['place_name' => 'Marrakech', 'longitude' => -8.008889, 'latitude' => 31.634165],
            ['place_name' => 'Rabat', 'longitude' => -6.83255, 'latitude' => 34.020882],
            ['place_name' => 'Fès', 'longitude' => -4.99979, 'latitude' => 34.03313],
            ['place_name' => 'Tanger', 'longitude' => -5.833954, 'latitude' => 35.759465],
            ['place_name' => 'Agadir', 'longitude' => -9.596114, 'latitude' => 30.427755],
            ['place_name' => 'Oujda', 'longitude' => -1.903063, 'latitude' => 34.680508],
            ['place_name' => 'Meknès', 'longitude' => -5.559068, 'latitude' => 33.895435],
            ['place_name' => 'Essaouira', 'longitude' => -9.767868, 'latitude' => 31.508492],
            ['place_name' => 'Tetouan', 'longitude' => -5.366925, 'latitude' => 35.571919],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locations')->insert([
            ['place_name' => 'Casablanca'],
            ['place_name' => 'Marrakech'],
            ['place_name' => 'Rabat'],
            ['place_name' => 'Fès'],
            ['place_name' => 'Tanger'],
            ['place_name' => 'Agadir'],
            ['place_name' => 'Oujda'],
            ['place_name' => 'Meknès'],
            ['place_name' => 'Essaouira'],
            ['place_name' => 'Tetouan'],
        ]);
    }
}

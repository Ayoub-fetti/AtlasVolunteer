<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('opportunities')->insert([
            ['user_id' => '4', 'title' => 'test test', 'description' => 'test test test','category' => '1', 'start_date' => '2025-12-08', 'location_id' => '2', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
            ['user_id' => '4','title' => 'testa testa', 'description' => 'testa testa testa','category' => '2', 'start_date' => '2025-12-08', 'location_id' => '3', 'required_volunteers' => '20','status' => 'open'],
        ]);
    }
}


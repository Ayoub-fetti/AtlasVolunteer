<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Education', 'slug' => 'education'],
            ['name' => 'Health', 'slug' => 'health'],
            ['name' => 'Environment', 'slug' => 'environment'],
            ['name' => 'Community', 'slug' => 'community'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

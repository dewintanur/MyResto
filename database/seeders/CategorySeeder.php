<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Food',
                'description' => 'All kinds of food items',
            ],
            [
                'category_name' => 'Beverages',
                'description' => 'All kinds of drinks and beverages',
            ],
            [
                'category_name' => 'Desserts',
                'description' => 'Sweet treats and desserts',
            ],
        ];

        \DB::table('categories')->insert($categories);
    }
}

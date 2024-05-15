<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed categories
        $categories = [
            [
                'name' => 'Electronics',
                'children' => [
                    ['name' => 'Phones'],
                    ['name' => 'Laptops'],
                    // Add more children categories as needed
                ]
            ],
            [
                'name' => 'Clothing',
                'children' => [
                    ['name' => 'Men'],
                    ['name' => 'Women'],
                    // Add more children categories as needed
                ]
            ],
            // Add more top-level categories as needed
        ];

        // Loop through each category and its children to seed data
        foreach ($categories as $categoryData) {
            $category = Categories::create(['name' => $categoryData['name']]);

            if (isset($categoryData['children'])) {
                foreach ($categoryData['children'] as $childData) {
                    $childCategory = Categories::create(['name' => $childData['name'], 'parent_id' => $category->id]);
                }
            }
        }
    }
}

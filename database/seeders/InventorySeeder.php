<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Raw Materials'],
            ['name' => 'Spare'],
            ['name' => 'Machines'],
        ];
        $materials = [
            ['name' => 'Material 1', 'opening_balance' => 100,],
            ['name' => 'Material 2', 'opening_balance' => 200,],
            ['name' => 'Material 3', 'opening_balance' => 150,],
            ['name' => 'Material 4', 'opening_balance' => 300,],
            ['name' => 'Material 5', 'opening_balance' => 250,],
        ];

        // foreach ($categories as $category) {
        //     Category::create($category);
        // }

            foreach ($materials as $material) {
                $material['category_id'] = Category::inRandomOrder()->first()->id;
                Material::create($material);
            }
    }

}

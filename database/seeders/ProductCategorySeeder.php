<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Specialty'
            ],
            [
                'name' => 'Entree'
            ],
            [
                'name' => 'Others'
            ],
            [
                'name' => 'Platter Fried Rice'
            ],
            [
                'name' => 'Chow Mein Fried Rice'
            ],
            [
                'name' => 'Rice Bowls'
            ],
            [
                'name' => 'Chow Mein Bowls'
            ],
            [
                'name' => 'Add-Ons'
            ],
        ];
    }
}

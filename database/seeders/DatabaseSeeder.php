<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use App\Models\Modifier;
use App\Models\ItemCategory;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $root = Role::create([
            'name' => 'root',
            'level' => 1,
        ]);

        Role::create([
            'name' => 'default_user',
            'level' => 10,
            'default' => true
        ]);

        $user = User::create([
            'name' => 'Jaycee Mariano',
            'mobile' => '9991781308',
            'mobile_verified_at' => now(),
            'role_id' => $root->id
        ]);

        $store = Store::create([
            'name' => 'Hao Bao Wonton Noodles',
            'created_by' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $modifier = Modifier::create([
            'name' => 'Add-Ons',
            'store_id' => $store->id,
            'created_by' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $modifierItems = [
            [
                'name' => 'Sweet & Sour Pork',
                'price' => 8500
            ],
            [
                'name' => 'Szechuan Pork',
                'price' => 8500
            ],
            [
                'name' => '4Pcs Wonton Dumplings',
                'price' => 8000
            ],
            [
                'name' => '6Pcs Shanghai Rolls',
                'price' => 8000
            ],
            [
                'name' => '1Pc Fried Chicken',
                'price' => 6500
            ],
            [
                'name' => 'Fried Egg',
                'price' => 2500
            ],
        ];

        foreach ($modifierItems as $modifierItem) {
            Item::create($modifierItem + [
                'store_id' => $store->id,
                'modifier_id' => $modifier->id,
                'created_by' => $user->id,
            ]);
        }

        $flavors = [
            [
                'name' => 'Classic'
            ],
            [
                'name' => 'Hao Bao Original'
            ],
            [
                'name' => 'Orange Chicken'
            ],
            [
                'name' => 'Honey Garlic'
            ],
            [
                'name' => 'Soy Garlic'
            ],
            [
                'name' => 'Szechuan'
            ],
        ];

        $items = [
            'Mami' => [

                [
                    'name' => 'Beef Wonton Mami',
                    'price' => 26000,
                ],
                [
                    'name' => 'Beef Mami',
                    'price' => 19000
                ],
                [
                    'name' => 'Wonton Mami',
                    'price' => 17500
                ],
                [
                    'name' => 'Wonton Soup',
                    'price' => 125000
                ],
                [
                    'name' => 'Extra Noodles',
                    'price' => 5000
                ],
            ],
            'Fried Chicken' => [
                [
                    'name' => '4Pcs Fried Chicken',
                    'price' => 26000,
                    'options' => $flavors,
                ],
                [
                    'name' => '6Pcs Fried Chicken',
                    'price' => 39000,
                    'options' => $flavors,
                ],
                [
                    'name' => '8Pcs Fried Chicken',
                    'price' => 52000,
                    'options' => $flavors,
                ],
            ],
            'Family Size Entree' => [
                [
                    'name' => 'Beef Brocolli',
                    'price' => 28500
                ],
                [
                    'name' => 'Swwet & Sour Pork',
                    'price' => 24500
                ],
                [
                    'name' => 'Szechuan Pork',
                    'price' => 24500
                ],
                [
                    'name' => 'Spring Rolls',
                    'price' => 14500
                ],
                [
                    'name' => 'Shanghai Rolls',
                    'price' => 19500
                ],
                [
                    'name' => 'Stir-Fried Bok Choy',
                    'price' => 19500
                ],
                [
                    'name' => 'Soy Garlic Spinach',
                    'price' => 12000
                ],
            ],
            'Fried Rice Platter' => [
                [
                    'name' => 'Shrimp Fried Rice - Platter',
                    'price' => 36000
                ],
                [
                    'name' => 'Yang Chow - Platter',
                    'price' => 31500
                ],
                [
                    'name' => 'Pork Chow Fan - Platter',
                    'price' => 26500
                ],
                [
                    'name' => 'Hao Bao Egg Fried Rice - Platter',
                    'price' => 24500
                ],
            ],
            'Rice Bowls - Pick Your Toppings!' => [
                [
                    'name' => 'Shrimp Egg Fried Rice - R.Bowl',
                    'price' => 12500,
                    'modifiers' => [$modifier],
                ],
                [
                    'name' => 'Yang Chow - R.Bowl',
                    'price' => 11000,
                    'modifiers' => [$modifier]
                ],
                [
                    'name' => 'Pork Chow Fan - R.Bowl',
                    'price' => 9500,
                    'modifiers' => [$modifier],
                ],
                [
                    'name' => 'Hao Bao Egg Fried Rice - R.Bowl',
                    'price' => 8500,
                    'modifiers' => [$modifier],
                ],
            ],
            'Chow Mein Bowls - Pick Your Toppings!' => [
                [
                    'name' => 'Shrimp Chow Mein - R.Bowl',
                    'price' => 13000,
                    'modifiers' => [$modifier],
                ],
                [
                    'name' => 'Beef Chow Mein - C.Bowl',
                    'price' => 11500,
                    'modifiers' => [$modifier],
                ],
                [
                    'name' => 'Pork Chow Mein - C.Bowl',
                    'price' => 10500,
                    'modifiers' => [$modifier],
                ],
                [
                    'name' => 'Vegetable Chow Mein - C.Bowl',
                    'price' => 10500,
                    'modifiers' => [$modifier],
                ],
            ],
            'Solo Add-Ons' => $modifierItems
        ];

        foreach ($items as $itemCategory => $_items) {

            $category = ItemCategory::firstOrCreate([
                'name' => $itemCategory,
                'store_id' => $store->id,
                'created_by' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($_items as $_item) {

                $_modifiers = [];

                if (isset($_item['modifiers'])) {

                    $_modifiers = $_item['modifiers'];

                    unset($_item['modifiers']);
                }

                $_variants = [];

                if (isset($_item['options'])) {

                    $_variants = $_item['options'];

                    unset($_item['options']);
                }

                $item = Item::create($_item + [
                    'category_id' => $category->id,
                    'store_id' => $store->id,
                    'created_by' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);


                if (count($_variants)) {

                    foreach ($_variants as $_variant) {
                        Item::create($_variant + [
                            'parent_id' => $item->id,
                            'category_id' => $category->id,
                            'store_id' => $store->id,
                            'created_by' => $user->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }

                if (count($_modifiers)) {

                    foreach ($_modifiers as $_modifier) {
                        $item->modifiers()->save($_modifier);
                    }
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
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
    }
}

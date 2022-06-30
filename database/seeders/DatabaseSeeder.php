<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            CategorySeeder::class,
            IngredientSeeder::class,
            ProductSeeder::class,
            RoleSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
        ]);
    }
}

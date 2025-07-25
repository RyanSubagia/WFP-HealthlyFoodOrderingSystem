<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            FoodSeeder::class,
            UserSeeder::class,
            PaymentSeeder::class,
            TransactionSeeder::class,
            TransactionItemSeeder::class,
            NutritionFactSeeder::class,
        ]);
    }
}

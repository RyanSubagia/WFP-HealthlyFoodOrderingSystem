<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionFactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nutrition_facts')->insert([
            // 1. Edamame Rebus
            [
                'food_id' => 1,
                'calories' => 120,
                'protein' => 11.00,
                'fat' => 5.00,
                'carbohydrates' => 10.00,
                'fiber' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2. Salad Buah Segar
            [
                'food_id' => 2,
                'calories' => 140,
                'protein' => 2.00,
                'fat' => 3.00,
                'carbohydrates' => 28.00,
                'fiber' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 3. Chuka Wakame Sushi
            [
                'food_id' => 3,
                'calories' => 220,
                'protein' => 12.00,
                'fat' => 9.00,
                'carbohydrates' => 27.00,
                'fiber' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 4. Kani Nigiri Sushi
            [
                'food_id' => 4,
                'calories' => 270,
                'protein' => 18.00,
                'fat' => 8.00,
                'carbohydrates' => 30.00,
                'fiber' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5. Nigiri Inari
            [
                'food_id' => 5,
                'calories' => 280,
                'protein' => 8.00,
                'fat' => 5.00,
                'carbohydrates' => 40.00,
                'fiber' => 6.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 6. Salmon Sushi Roll
            [
                'food_id' => 6,
                'calories' => 300,
                'protein' => 20.00,
                'fat' => 12.00,
                'carbohydrates' => 32.00,
                'fiber' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 7. Sushi Nigiri Salmon
            [
                'food_id' => 7,
                'calories' => 270,
                'protein' => 22.00,
                'fat' => 11.00,
                'carbohydrates' => 25.00,
                'fiber' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 8. Sushi Nigiri Tuna
            [
                'food_id' => 8,
                'calories' => 250,
                'protein' => 23.00,
                'fat' => 8.00,
                'carbohydrates' => 28.00,
                'fiber' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 9. Sushi Salmon Wrapped
            [
                'food_id' => 9,
                'calories' => 310,
                'protein' => 24.00,
                'fat' => 13.00,
                'carbohydrates' => 28.00,
                'fiber' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 10. Sushi Salmon
            [
                'food_id' => 10,
                'calories' => 280,
                'protein' => 22.00,
                'fat' => 10.00,
                'carbohydrates' => 26.00,
                'fiber' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 11. Tamago Sushi
            [
                'food_id' => 11,
                'calories' => 250,
                'protein' => 8.00,
                'fat' => 7.00,
                'carbohydrates' => 34.00,
                'fiber' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 12. Energy Ball Oat Cokelat
            [
                'food_id' => 12,
                'calories' => 180,
                'protein' => 4.00,
                'fat' => 8.00,
                'carbohydrates' => 22.00,
                'fiber' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 13. Chia Pudding Mangga
            [
                'food_id' => 13,
                'calories' => 220,
                'protein' => 6.00,
                'fat' => 7.00,
                'carbohydrates' => 30.00,
                'fiber' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 14. Greek Yogurt Parfait
            [
                'food_id' => 14,
                'calories' => 200,
                'protein' => 10.00,
                'fat' => 5.00,
                'carbohydrates' => 25.00,
                'fiber' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 15. Americano
            [
                'food_id' => 15,
                'calories' => 10,
                'protein' => 0.00,
                'fat' => 0.00,
                'carbohydrates' => 2.00,
                'fiber' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 16. Latte Almond Milk
            [
                'food_id' => 16,
                'calories' => 100,
                'protein' => 2.00,
                'fat' => 3.00,
                'carbohydrates' => 12.00,
                'fiber' => 1.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 17. Matcha Latte
            [
                'food_id' => 17,
                'calories' => 120,
                'protein' => 3.00,
                'fat' => 4.00,
                'carbohydrates' => 15.00,
                'fiber' => 2.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 18. Cokelat Panas Dark
            [
                'food_id' => 18,
                'calories' => 180,
                'protein' => 4.00,
                'fat' => 6.00,
                'carbohydrates' => 28.00,
                'fiber' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 19. Jus Detox Hijau
            [
                'food_id' => 19,
                'calories' => 90,
                'protein' => 2.00,
                'fat' => 1.00,
                'carbohydrates' => 20.00,
                'fiber' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 20. Jus Wortel Jeruk
            [
                'food_id' => 20,
                'calories' => 110,
                'protein' => 2.00,
                'fat' => 1.00,
                'carbohydrates' => 25.00,
                'fiber' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
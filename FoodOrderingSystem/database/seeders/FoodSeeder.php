<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('foods')->insert([
            // 1. Appetizer
            [
                'name' => 'Boiled Edamame',
                'description' => 'Boiled edamame with a sprinkle of sea salt, perfect as a healthy appetizer.',
                'price' => 15000,
                'category_id' => 1,
                'image' => 'Edamame.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fresh Fruit Salad',
                'description' => 'A mix of fresh fruits served with low-fat yogurt dressing.',
                'price' => 18000,
                'category_id' => 1,
                'image' => 'Salad Buah.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2. Main Course
            [
                'name' => 'Chuka Wakame Sushi',
                'description' => 'Sushi with Wakame seaweed, rich in minerals and fiber.',
                'price' => 35000,
                'category_id' => 2,
                'image' => 'ChukaWakameSushi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kani Nigiri Sushi',
                'description' => 'Nigiri sushi with crab meat, low in calories and high in protein.',
                'price' => 38000,
                'category_id' => 2,
                'image' => 'Kani Nigiri Sushi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inari Nigiri',
                'description' => 'Nigiri with sweet fried tofu, delicious and healthy.',
                'price' => 33000,
                'category_id' => 2,
                'image' => 'Nigiri Inari.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salmon Sushi Roll',
                'description' => 'Sushi roll with fresh salmon and vegetable filling, rich in healthy protein.',
                'price' => 42000,
                'category_id' => 2,
                'image' => 'Salmon Sushi Roll.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salmon Nigiri Sushi',
                'description' => 'Nigiri topped with fresh salmon slices, rich in omega-3 and low in calories.',
                'price' => 39000,
                'category_id' => 2,
                'image' => 'Sushi Nigiri Salmon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tuna Nigiri Sushi',
                'description' => 'Nigiri topped with fresh tuna, rich in protein and healthy fats.',
                'price' => 38000,
                'category_id' => 2,
                'image' => 'Sushi Nigiri Tuna.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salmon Wrapped Sushi',
                'description' => 'Sushi wrapped with fresh salmon and seaweed for a rich flavor.',
                'price' => 43000,
                'category_id' => 2,
                'image' => 'Sushi Salmon Wraped.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salmon Sushi',
                'description' => 'Sushi topped with fresh salmon slices, nutritious and healthy.',
                'price' => 39000,
                'category_id' => 2,
                'image' => 'Sushi Salmon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tamago Sushi',
                'description' => 'Sushi with sweet omelet and rice, a light and healthy choice.',
                'price' => 32000,
                'category_id' => 2,
                'image' => 'Tamago Sushi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 3. Snack
            [
                'name' => 'Chocolate Oat Energy Ball',
                'description' => 'A healthy snack made with oats, dates, and dark chocolate.',
                'price' => 12000,
                'category_id' => 3,
                'image' => 'Energy Balls.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 4. Dessert
            [
                'name' => 'Mango Chia Pudding',
                'description' => 'Chia pudding with natural mango sauce and honey.',
                'price' => 18000,
                'category_id' => 4,
                'image' => 'Chia Pudding Mangga.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Greek Yogurt Parfait',
                'description' => 'Greek yogurt with granola and fresh fruit toppings.',
                'price' => 20000,
                'category_id' => 4,
                'image' => 'Greek Yogurt Parfait.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 5. Coffee
            [
                'name' => 'Americano',
                'description' => 'Black coffee without sugar, ideal for true coffee lovers.',
                'price' => 18000,
                'category_id' => 5,
                'image' => 'Americano.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Almond Milk Latte',
                'description' => 'Healthy coffee latte with unsweetened almond milk.',
                'price' => 25000,
                'category_id' => 5,
                'image' => 'Almond Milk Latte.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 6. Non Coffee
            [
                'name' => 'Matcha Latte',
                'description' => 'Refreshing green matcha drink rich in antioxidants.',
                'price' => 24000,
                'category_id' => 6,
                'image' => 'Matcha Latte.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dark Hot Chocolate',
                'description' => 'Hot chocolate made with real dark chocolate and low-fat milk.',
                'price' => 23000,
                'category_id' => 6,
                'image' => 'Cokelat Panas.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 7. Healthy Juice
            [
                'name' => 'Green Detox Juice',
                'description' => 'Blend of spinach, green apple, and lemon for better digestion.',
                'price' => 22000,
                'category_id' => 7,
                'image' => 'Jus Detox Hijau.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carrot Orange Juice',
                'description' => 'Fresh carrot and orange juice, rich in vitamin C and beta-carotene.',
                'price' => 21000,
                'category_id' => 7,
                'image' => 'Jus Wortel Jeruk.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

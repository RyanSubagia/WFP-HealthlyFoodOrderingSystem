<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('foods')->insert([
            // 1. Appetizer
            [
                'name' => 'Edamame Rebus',
                'description' => 'Edamame rebus dengan sedikit garam laut, cocok untuk pembuka sehat.',
                'price' => 15000,
                'category_id' => 1,
                'image' => 'Edamame.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salad Buah Segar',
                'description' => 'Campuran buah segar dengan dressing yogurt rendah lemak.',
                'price' => 18000,
                'category_id' => 1,
                'image' => 'Salad Buah.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2. Main Course
            [
                'name' => 'Chuka Wakame Sushi',
                'description' => 'Sushi dengan rumput laut Wakame yang kaya akan mineral dan serat.',
                'price' => 35000,
                'category_id' => 2,
                'image' => 'ChukaWakameSushi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kani Nigiri Sushi',
                'description' => 'Nigiri sushi dengan daging kepiting yang rendah kalori dan penuh protein.',
                'price' => 38000,
                'category_id' => 2,
                'image' => 'Kani Nigiri Sushi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nigiri Inari',
                'description' => 'Nigiri dengan tahu goreng manis yang lezat dan menyehatkan.',
                'price' => 33000,
                'category_id' => 2,
                'image' => 'Nigiri Inari.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salmon Sushi Roll',
                'description' => 'Sushi roll dengan salmon segar dan isian sayuran, penuh dengan protein sehat.',
                'price' => 42000,
                'category_id' => 2,
                'image' => 'Salmon Sushi Roll.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sushi Nigiri Salmon',
                'description' => 'Nigiri dengan irisan salmon segar yang kaya omega-3 dan rendah kalori.',
                'price' => 39000,
                'category_id' => 2,
                'image' => 'Sushi Nigiri Salmon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sushi Nigiri Tuna',
                'description' => 'Nigiri dengan tuna segar yang kaya protein dan lemak sehat.',
                'price' => 38000,
                'category_id' => 2,
                'image' => 'Sushi Nigiri Tuna.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sushi Salmon Wrapped',
                'description' => 'Sushi dengan salmon segar yang dibalut dengan rumput laut untuk rasa yang lebih kaya.',
                'price' => 43000,
                'category_id' => 2,
                'image' => 'Sushi Salmon Wraped.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sushi Salmon',
                'description' => 'Sushi dengan irisan salmon segar yang sangat bergizi dan menyehatkan.',
                'price' => 39000,
                'category_id' => 2,
                'image' => 'Sushi Salmon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tamago Sushi',
                'description' => 'Sushi dengan omelet manis dan nasi, pilihan ringan yang menyehatkan.',
                'price' => 32000,
                'category_id' => 2,
                'image' => 'Tamago Sushi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 3. Snack
            [
                'name' => 'Energy Ball Oat Cokelat',
                'description' => 'Cemilan sehat berbahan dasar oat, kurma, dan dark chocolate.',
                'price' => 12000,
                'category_id' => 3,
                'image' => 'Energy Balls.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 4. Dessert
            [
                'name' => 'Chia Pudding Mangga',
                'description' => 'Puding chia dengan saus mangga alami dan madu.',
                'price' => 18000,
                'category_id' => 4,
                'image' => 'Chia Pudding Mangga.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Greek Yogurt Parfait',
                'description' => 'Yogurt dengan granola dan topping buah segar.',
                'price' => 20000,
                'category_id' => 4,
                'image' => 'Greek Yogurt Parfait.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 5. Coffee
            [
                'name' => 'Americano',
                'description' => 'Kopi hitam tanpa gula, cocok untuk penikmat kopi sejati.',
                'price' => 18000,
                'category_id' => 5,
                'image' => 'Americano.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Latte Almond Milk',
                'description' => 'Kopi susu sehat dengan almond milk tanpa gula tambahan.',
                'price' => 25000,
                'category_id' => 5,
                'image' => 'Almond Milk Latte.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 6. Non Coffee
            [
                'name' => 'Matcha Latte',
                'description' => 'Minuman matcha hijau yang menyegarkan dan kaya antioksidan.',
                'price' => 24000,
                'category_id' => 6,
                'image' => 'Matcha Latte.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cokelat Panas Dark',
                'description' => 'Cokelat panas dengan dark chocolate asli dan susu rendah lemak.',
                'price' => 23000,
                'category_id' => 6,
                'image' => 'Cokelat Panas.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 7. Healthy Juice
            [
                'name' => 'Jus Detox Hijau',
                'description' => 'Campuran bayam, apel hijau, dan lemon untuk pencernaan.',
                'price' => 22000,
                'category_id' => 7,
                'image' => 'Jus Detox Hijau.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jus Wortel Jeruk',
                'description' => 'Jus segar wortel dan jeruk, kaya vitamin C dan beta-karoten.',
                'price' => 21000,
                'category_id' => 7,
                'image' => 'Jus Wortel Jeruk.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
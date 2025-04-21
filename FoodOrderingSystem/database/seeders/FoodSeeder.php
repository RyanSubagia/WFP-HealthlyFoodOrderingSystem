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
                'nutrition_fact' => 'Kalori: 120 kkal
Protein: 11g
Lemak: 5g
Karbohidrat: 10g
Serat: 4g',
                'description' => 'Edamame rebus dengan sedikit garam laut, cocok untuk pembuka sehat.',
                'price' => 15000,
                'category_id' => 1,
                'image' => 'img/menu_sushi/Edamame.png',
            ],
            [
                'name' => 'Salad Buah Segar',
                'nutrition_fact' => 'Kalori: 140 kkal
Protein: 2g
Lemak: 3g
Karbohidrat: 28g
Serat: 5g',
                'description' => 'Campuran buah segar dengan dressing yogurt rendah lemak.',
                'price' => 18000,
                'category_id' => 1,
                'image' => 'img/menu_sushi/Salad Buah.png',
            ],

            // 2. Main Course
            [
                'name' => 'Chuka Wakame Sushi',
                'nutrition_fact' => 'Kalori: 220 kkal
        Protein: 12g
        Lemak: 9g
        Karbohidrat: 27g
        Serat: 4g',
                'description' => 'Sushi dengan rumput laut Wakame yang kaya akan mineral dan serat.',
                'price' => 35000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/ChukaWakameSushi.png',
            ],
            [
                'name' => 'Kani Nigiri Sushi',
                'nutrition_fact' => 'Kalori: 270 kkal
        Protein: 18g
        Lemak: 8g
        Karbohidrat: 30g
        Serat: 3g',
                'description' => 'Nigiri sushi dengan daging kepiting yang rendah kalori dan penuh protein.',
                'price' => 38000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Kani Nigiri Sushi.png',
            ],
            [
                'name' => 'Nigiri Inari',
                'nutrition_fact' => 'Kalori: 280 kkal
        Protein: 8g
        Lemak: 5g
        Karbohidrat: 40g
        Serat: 6g',
                'description' => 'Nigiri dengan tahu goreng manis yang lezat dan menyehatkan.',
                'price' => 33000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Nigiri Inari.png',
            ],
            [
                'name' => 'Salmon Sushi Roll',
                'nutrition_fact' => 'Kalori: 300 kkal
        Protein: 20g
        Lemak: 12g
        Karbohidrat: 32g
        Serat: 4g',
                'description' => 'Sushi roll dengan salmon segar dan isian sayuran, penuh dengan protein sehat.',
                'price' => 42000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Salmon Sushi Roll.png',
            ],
            [
                'name' => 'Sushi Nigiri Salmon',
                'nutrition_fact' => 'Kalori: 270 kkal
        Protein: 22g
        Lemak: 11g
        Karbohidrat: 25g
        Serat: 3g',
                'description' => 'Nigiri dengan irisan salmon segar yang kaya omega-3 dan rendah kalori.',
                'price' => 39000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Sushi Nigiri Salmon.png',
            ],
            [
                'name' => 'Sushi Nigiri Tuna',
                'nutrition_fact' => 'Kalori: 250 kkal
        Protein: 23g
        Lemak: 8g
        Karbohidrat: 28g
        Serat: 4g',
                'description' => 'Nigiri dengan tuna segar yang kaya protein dan lemak sehat.',
                'price' => 38000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Sushi Nigiri Tuna.png',
            ],
            [
                'name' => 'Sushi Salmon Wrapped',
                'nutrition_fact' => 'Kalori: 310 kkal
        Protein: 24g
        Lemak: 13g
        Karbohidrat: 28g
        Serat: 5g',
                'description' => 'Sushi dengan salmon segar yang dibalut dengan rumput laut untuk rasa yang lebih kaya.',
                'price' => 43000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Sushi Salmon Wraped.png',
            ],
            [
                'name' => 'Sushi Salmon',
                'nutrition_fact' => 'Kalori: 280 kkal
        Protein: 22g
        Lemak: 10g
        Karbohidrat: 26g
        Serat: 3g',
                'description' => 'Sushi dengan irisan salmon segar yang sangat bergizi dan menyehatkan.',
                'price' => 39000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Sushi Salmon.png',
            ],
            [
                'name' => 'Tamago Sushi',
                'nutrition_fact' => 'Kalori: 250 kkal
        Protein: 8g
        Lemak: 7g
        Karbohidrat: 34g
        Serat: 4g',
                'description' => 'Sushi dengan omelet manis dan nasi, pilihan ringan yang menyehatkan.',
                'price' => 32000,
                'category_id' => 2,
                'image' => 'img/menu_sushi/Tamago Sushi.png',
            ],

            // 3. Snack
            [
                'name' => 'Energy Ball Oat Cokelat',
                'nutrition_fact' => 'Kalori: 180 kkal
Protein: 4g
Lemak: 8g
Karbohidrat: 22g
Serat: 3g',
                'description' => 'Cemilan sehat berbahan dasar oat, kurma, dan dark chocolate.',
                'price' => 12000,
                'category_id' => 3,
                'image' => 'img/menu_sushi/Energy Balls.png',
            ],
            [
                'name' => 'Protein Bar Almond',
                'nutrition_fact' => 'Kalori: 210 kkal
Protein: 10g
Lemak: 9g
Karbohidrat: 18g
Serat: 4g',
                'description' => 'Bar tinggi protein dengan rasa kacang almond panggang.',
                'price' => 16000,
                'category_id' => 3,
                'image' => 'img/menu_sushi/Protein Bar.png',
            ],

            // 4. Dessert
            [
                'name' => 'Chia Pudding Mangga',
                'nutrition_fact' => 'Kalori: 220 kkal
Protein: 6g
Lemak: 7g
Karbohidrat: 30g
Serat: 5g',
                'description' => 'Puding chia dengan saus mangga alami dan madu.',
                'price' => 18000,
                'category_id' => 4,
                'image' => 'img/menu_sushi/Chia Pudding Mangga.png',
            ],
            [
                'name' => 'Greek Yogurt Parfait',
                'nutrition_fact' => 'Kalori: 200 kkal
Protein: 10g
Lemak: 5g
Karbohidrat: 25g
Serat: 3g',
                'description' => 'Yogurt dengan granola dan topping buah segar.',
                'price' => 20000,
                'category_id' => 4,
                'image' => 'img/menu_sushi/Greek Yogurt Parfait.png',
            ],

            // 5. Coffee
            [
                'name' => 'Americano',
                'nutrition_fact' => 'Kalori: 10 kkal
Protein: 0g
Lemak: 0g
Karbohidrat: 2g
Serat: 0g',
                'description' => 'Kopi hitam tanpa gula, cocok untuk penikmat kopi sejati.',
                'price' => 18000,
                'category_id' => 5,
                'image' => 'img/menu_sushi/Americano.png',
            ],
            [
                'name' => 'Latte Almond Milk',
                'nutrition_fact' => 'Kalori: 100 kkal
Protein: 2g
Lemak: 3g
Karbohidrat: 12g
Serat: 1g',
                'description' => 'Kopi susu sehat dengan almond milk tanpa gula tambahan.',
                'price' => 25000,
                'category_id' => 5,
                'image' => 'img/menu_sushi/Almond Milk Latte.png',
            ],

            // 6. Non Coffee
            [
                'name' => 'Matcha Latte',
                'nutrition_fact' => 'Kalori: 120 kkal
Protein: 3g
Lemak: 4g
Karbohidrat: 15g
Serat: 2g',
                'description' => 'Minuman matcha hijau yang menyegarkan dan kaya antioksidan.',
                'price' => 24000,
                'category_id' => 6,
                'image' => 'img/menu_sushi/Matche Latte.png',
            ],
            [
                'name' => 'Cokelat Panas Dark',
                'nutrition_fact' => 'Kalori: 180 kkal
Protein: 4g
Lemak: 6g
Karbohidrat: 28g
Serat: 3g',
                'description' => 'Cokelat panas dengan dark chocolate asli dan susu rendah lemak.',
                'price' => 23000,
                'category_id' => 6,
                'image' => 'img/menu_sushi/Cokelat Panas.png',
            ],

            // 7. Healthy Juice
            [
                'name' => 'Jus Detox Hijau',
                'nutrition_fact' => 'Kalori: 90 kkal
Protein: 2g
Lemak: 1g
Karbohidrat: 20g
Serat: 4g',
                'description' => 'Campuran bayam, apel hijau, dan lemon untuk pencernaan.',
                'price' => 22000,
                'category_id' => 7,
                'image' => 'img/menu_sushi/Jus Detox Hijau.png',
            ],
            [
                'name' => 'Jus Wortel Jeruk',
                'nutrition_fact' => 'Kalori: 110 kkal
Protein: 2g
Lemak: 1g
Karbohidrat: 25g
Serat: 3g',
                'description' => 'Jus segar wortel dan jeruk, kaya vitamin C dan beta-karoten.',
                'price' => 21000,
                'category_id' => 7,
                'image' => 'img/menu_sushi/Jus Wortel Jeruk.png',
            ],
        ]);
    }
}

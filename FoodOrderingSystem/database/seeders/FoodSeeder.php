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
            ],

            // 2. Main Course
            [
                'name' => 'Nasi Merah Ayam Panggang',
                'nutrition_fact' => 'Kalori: 450 kkal
Protein: 35g
Lemak: 15g
Karbohidrat: 50g
Serat: 6g',
                'description' => 'Paduan nasi merah dan ayam panggang kecap yang rendah lemak.',
                'price' => 35000,
                'category_id' => 2,
            ],
            [
                'name' => 'Sushi Salmon Avocado',
                'nutrition_fact' => 'Kalori: 320 kkal
Protein: 20g
Lemak: 12g
Karbohidrat: 30g
Serat: 4g',
                'description' => 'Sushi sehat dengan salmon segar dan alpukat.',
                'price' => 40000,
                'category_id' => 2,
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
            ],
        ]);
    }
}

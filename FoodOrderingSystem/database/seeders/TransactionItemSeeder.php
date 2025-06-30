<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaction_items')->insert([
            [
                'transaction_id' => 1,
                'food_id' => 8, // Sushi Nigiri Salmon
                'size' => 'M',
                'note' => 'Tanpa saus',
                'quantity' => 3,
                'price' => 39000,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'transaction_id' => 1,
                'food_id' => 4, // Kani Nigiri Sushi
                'size' => 'S',
                'note' => null,
                'quantity' => 1,
                'price' => 38000,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'transaction_id' => 2,
                'food_id' => 9, // Sushi Salmon Wrapped
                'size' => 'L',
                'note' => 'Lebih pedas',
                'quantity' => 2,
                'price' => 43000,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'transaction_id' => 2,
                'food_id' => 2, // Salad Buah Segar
                'size' => 'M',
                'note' => 'Tanpa dressing',
                'quantity' => 1,
                'price' => 18000,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'transaction_id' => 3,
                'food_id' => 11, // Energy Ball Oat Cokelat
                'size' => 'S',
                'note' => 'Tambah chia',
                'quantity' => 2,
                'price' => 12000,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'transaction_id' => 3,
                'food_id' => 12, // Chia Pudding Mangga
                'size' => 'L',
                'note' => null,
                'quantity' => 1,
                'price' => 18000,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'transaction_id' => 2,
                'food_id' => 13, // Greek Yogurt Parfait
                'size' => 'M',
                'note' => 'Kurang manis',
                'quantity' => 1,
                'price' => 20000,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'transaction_id' => 1,
                'food_id' => 14, // Americano
                'size' => 'L',
                'note' => 'Tanpa gula',
                'quantity' => 1,
                'price' => 18000,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'transaction_id' => 2,
                'food_id' => 15, // Latte Almond Milk
                'size' => 'M',
                'note' => 'Lebih foam',
                'quantity' => 1,
                'price' => 25000,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'transaction_id' => 3,
                'food_id' => 16, // Matcha Latte
                'size' => 'S',
                'note' => 'Extra matcha',
                'quantity' => 2,
                'price' => 24000,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
        ]);
    }
}

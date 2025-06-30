<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('transactions')->insert([
            [
                'payments_id' => 4, // Gopay
                'users_id' => 1,
                'total' => 54000,
                'tgl_Pemesanan' => now()->subDays(4),
                'no_meja' => 'D1',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'payments_id' => 5, // OVO
                'users_id' => 2,
                'total' => 39000,
                'tgl_Pemesanan' => now()->subDays(4),
                'no_meja' => '-',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'processing',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'payments_id' => 6, // DANA
                'users_id' => 3,
                'total' => 22000,
                'tgl_Pemesanan' => now()->subDays(1),
                'no_meja' => '-',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'completed',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'payments_id' => 1,
                'users_id' => 2,
                'total' => 18000,
                'tgl_Pemesanan' => now()->subDays(2),
                'no_meja' => 'C2',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'payments_id' => 2,
                'users_id' => 3,
                'total' => 65000,
                'tgl_Pemesanan' => now()->subDays(6),
                'no_meja' => 'E4',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'cancelled',
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
            [
                'payments_id' => 3,
                'users_id' => 1,
                'total' => 150000,
                'tgl_Pemesanan' => now()->subDays(7),
                'no_meja' => '-',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'completed',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
            [
                'payments_id' => 4,
                'users_id' => 1,
                'total' => 45000,
                'tgl_Pemesanan' => now()->subDays(8),
                'no_meja' => 'B1',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'processing',
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(8),
            ],
            [
                'payments_id' => 5,
                'users_id' => 2,
                'total' => 31000,
                'tgl_Pemesanan' => now()->subDays(3),
                'no_meja' => '-',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'completed',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'payments_id' => 6,
                'users_id' => 3,
                'total' => 20000,
                'tgl_Pemesanan' => now()->subDays(1),
                'no_meja' => 'F2',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'pending',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'payments_id' => 1,
                'users_id' => 1,
                'total' => 120000,
                'tgl_Pemesanan' => now()->subDays(9),
                'no_meja' => '-',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'completed',
                'created_at' => now()->subDays(9),
                'updated_at' => now()->subDays(9),
            ],
        ]);
    }
}

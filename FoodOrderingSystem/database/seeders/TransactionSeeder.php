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
                'payments_id' => 1, // Bank Mandiri Debit
                'users_id' => 1, // John Doe
                'total' => 250000,
                'tgl_Pemesanan' => Carbon::now()->subDays(5),
                'no_meja' => 'A1',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
            ],
            [
                'payments_id' => 2, // Bank BCA Debit
                'users_id' => 2, // Jane Smith
                'total' => 150000,
                'tgl_Pemesanan' => Carbon::now()->subDays(3),
                'no_meja' => 'B2',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'pending',
            ],
            [
                'payments_id' => 3, // Bank BRI Debit
                'users_id' => 3, // Michael Johnson
                'total' => 320000,
                'tgl_Pemesanan' => Carbon::now()->subDays(2),
                'no_meja' => 'C3',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'processing',
            ],
        ]);
    }
}

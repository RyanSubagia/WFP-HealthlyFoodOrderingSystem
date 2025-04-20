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
        DB::table('transaksi')->insert([
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
            [
                'payments_id' => 4, // Bank BTN Debit
                'users_id' => 4, // Emily Davis
                'total' => 210000,
                'tgl_Pemesanan' => Carbon::now()->subDays(1),
                'no_meja' => 'D4',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'cancelled',
            ],
            [
                'payments_id' => 5, // Bank CIMB Niaga Debit
                'users_id' => 5, // Robert Brown
                'total' => 180000,
                'tgl_Pemesanan' => Carbon::now()->subDays(7),
                'no_meja' => 'E5',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
            ],
            [
                'payments_id' => 6, // Bank Danamon Debit
                'users_id' => 6, // Sophia Wilson
                'total' => 400000,
                'tgl_Pemesanan' => Carbon::now()->subDays(4),
                'no_meja' => 'F6',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'pending',
            ],
            [
                'payments_id' => 7, // Bank BNI Debit
                'users_id' => 7, // James Moore
                'total' => 275000,
                'tgl_Pemesanan' => Carbon::now()->subDays(6),
                'no_meja' => 'G7',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
            ],
            [
                'payments_id' => 8, // Bank Permata Debit
                'users_id' => 8, // Olivia Taylor
                'total' => 130000,
                'tgl_Pemesanan' => Carbon::now()->subDays(8),
                'no_meja' => 'H8',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'processing',
            ],
            [
                'payments_id' => 9, // Bank Maybank Debit
                'users_id' => 9, // William Anderson
                'total' => 220000,
                'tgl_Pemesanan' => Carbon::now()->subDays(10),
                'no_meja' => 'I9',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
            ],
            [
                'payments_id' => 10, // Bank HSBC Debit
                'users_id' => 10, // Isabella Thomas
                'total' => 300000,
                'tgl_Pemesanan' => Carbon::now()->subDays(9),
                'no_meja' => 'J10',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'pending',
            ],
            // 7 lebih data
            [
                'payments_id' => 11, // Gopay
                'users_id' => 11, // Liam Martinez
                'total' => 175000,
                'tgl_Pemesanan' => Carbon::now()->subDays(5),
                'no_meja' => 'K11',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
            ],
            [
                'payments_id' => 12, // OVO
                'users_id' => 12, // Ava Garcia
                'total' => 150000,
                'tgl_Pemesanan' => Carbon::now()->subDays(4),
                'no_meja' => 'L12',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'pending',
            ],
            [
                'payments_id' => 13, // DANA
                'users_id' => 13, // Ethan Rodriguez
                'total' => 320000,
                'tgl_Pemesanan' => Carbon::now()->subDays(3),
                'no_meja' => 'M13',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'processing',
            ],
            [
                'payments_id' => 14, // LinkAja
                'users_id' => 14, // Mia Hernandez
                'total' => 250000,
                'tgl_Pemesanan' => Carbon::now()->subDays(2),
                'no_meja' => 'N14',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'cancelled',
            ],
            [
                'payments_id' => 15, // ShopeePay
                'users_id' => 15, // Lucas Wilson
                'total' => 200000,
                'tgl_Pemesanan' => Carbon::now()->subDays(1),
                'no_meja' => 'O15',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'completed',
            ],
            [
                'payments_id' => 16, // PayLater by Kredivo
                'users_id' => 16, // Amelia Lee
                'total' => 170000,
                'tgl_Pemesanan' => Carbon::now()->subDays(7),
                'no_meja' => 'P16',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'pending',
            ],
            [
                'payments_id' => 17, // Apple Pay
                'users_id' => 17, // Jack Clark
                'total' => 280000,
                'tgl_Pemesanan' => Carbon::now()->subDays(6),
                'no_meja' => 'Q17',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'processing',
            ],
            [
                'payments_id' => 18, // Google Pay
                'users_id' => 18, // Charlotte Allen
                'total' => 150000,
                'tgl_Pemesanan' => Carbon::now()->subDays(5),
                'no_meja' => 'R18',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'completed',
            ],
            [
                'payments_id' => 19, // Alipay
                'users_id' => 19, // Benjamin Young
                'total' => 300000,
                'tgl_Pemesanan' => Carbon::now()->subDays(4),
                'no_meja' => 'S19',
                'metode_Pemesanan' => 'Dine-In',
                'status' => 'pending',
            ],
            [
                'payments_id' => 20, // PayPal
                'users_id' => 20, // Harper King
                'total' => 230000,
                'tgl_Pemesanan' => Carbon::now()->subDays(3),
                'no_meja' => 'T20',
                'metode_Pemesanan' => 'Take-Away',
                'status' => 'completed',
            ]
        ]);
    }
}

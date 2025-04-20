<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('payments')->insert([
            // Debit Banks
            ['nama' => 'Bank Mandiri Debit'],
            ['nama' => 'Bank BCA Debit'],
            ['nama' => 'Bank BRI Debit'],
            ['nama' => 'Bank BTN Debit'],
            ['nama' => 'Bank CIMB Niaga Debit'],
            ['nama' => 'Bank Danamon Debit'],
            ['nama' => 'Bank Negara Indonesia (BNI) Debit'],
            ['nama' => 'Bank Permata Debit'],
            ['nama' => 'Bank Maybank Indonesia Debit'],
            ['nama' => 'Bank HSBC Indonesia Debit'],

            // E-Wallets
            ['nama' => 'Gopay'],
            ['nama' => 'OVO'],
            ['nama' => 'DANA'],
            ['nama' => 'LinkAja'],
            ['nama' => 'ShopeePay'],
            ['nama' => 'PayLater by Kredivo'],
            ['nama' => 'Apple Pay'],
            ['nama' => 'Google Pay'],
            ['nama' => 'Alipay'],
            ['nama' => 'PayPal'],]  );
    }
}

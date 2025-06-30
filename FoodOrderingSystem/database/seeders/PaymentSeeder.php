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

            ['nama' => 'Gopay'],
            ['nama' => 'OVO'],
            ['nama' => 'DANA'], ]);
    }
}
